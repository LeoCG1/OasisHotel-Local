<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**Leonardo Costa
     * Si el usuario está autentificado redirecciona a reserva, si no vuelve a login.
     */
    public function index()
    {
        if (Auth::check()) {
	        return redirect()->route('reservation.create');
	    }
        return view('login');
    }

    /**Leonardo Costa
     * Si el usuario esta autentificado redirecciona a home, si no al registro.
     */
    public function showRegister()
    {
        if (Auth::check()) {
	        return redirect()->route('/');
	    }
        return view('register');
    }
    /**Leonardo Costa
     * Valida y guarda al usuario en la base de datos, redireccionando a Home con mensaje de validación.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect("/")->with('success', 'Usuario registrado correctamente.');

    }
    /**Leonardo Costa
     * Función para loguear al usuario, valida las credenciales, inserta el usuario y el id en 
     * dos session para usar en otras funciones y lo redirecciona a reservas.
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            return back()->with('error', 'Credenciales inválidas.');
        }

        $user = Auth::user();
        $request->session()->put('key', $user->id );
        $request->session()->put('usuario', $user );
        $token = $user->createToken('AuthToken')->accessToken;
        return redirect()->route('reservation.create', ['user' => $user, 'access_token' => $token])->with('success', 'Usuario logeado correctamente.');

    }
    /**Leonardo Costa
     * Función que desloguea al usuario redireccionandolo al Home.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Usuario deslogueado correctamente.');

    }
    /**Leonardo Costa
     * Redirecciona a google.
     */
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    /**Leonardo Costa
     * Función de autentificación con google.
     * Valida si existe el usuario con google. Si existe, guarda guarda el usuario y el id en 2 session y loguea.
     * Si no existe, crea al usuario y finalmente loguea.
     */
    public function handleGoogleCallback(Request $request){
        $user = Socialite::driver('google')->user();
    
        $userExiste = User::where('google_id', $user->id)->first();
        if($userExiste){
            $request->session()->put('key', $userExiste->id );
            $request->session()->put('usuario', $userExiste );
            auth()->login($userExiste, true);
        }else{
            $nuevoUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'google_id' => $user->id
            ]);
            $request->session()->put('key', $nuevoUser->id );
            $request->session()->put('usuario', $nuevoUser);
            auth()->login($nuevoUser, true);
        }
        return redirect()->back();
    }

}
