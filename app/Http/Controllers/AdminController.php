<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = DB::table('admin')->get();
        $total_admins = DB::table('admin')->count();
        $users = User::all();
        return view('/paginas/admin/index')->with(compact('admins', 'total_admins', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id'
        ]);
        $user = User::all()->where('id', $request->input('user_id'))->first();
        $admin = Admin::create([
            'nombre' => $user->name,
            'user_id' => $request->input('user_id')
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin asignado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Administrador eliminado correctamente.');
    }
}
