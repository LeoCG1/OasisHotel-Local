<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\User;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comments::all();
        $total_comments = Comments::all()->count();
        return view('/paginas/comments/index', compact('comments', 'total_comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:50',
            'contenido' => 'required|string|max:9999',
        ]);

        $comments = Comments::create([
            'titulo' => $request->input('titulo'),
            'contenido' => $request->input('contenido'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('comments.index')->with('success', 'Comentario creado correctamente.');

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
    public function edit(Comments $comment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comment)
    {
        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:50',
            'contenido' => 'required|string|max:9999',
        ]);

        $comment->update([
            'titulo' => $request->input('contenido'),
            'contenido' => $request->input('contenido'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('comments.index')->with('success', 'Comentario actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comentario eliminado correctamente.');
    }
}
