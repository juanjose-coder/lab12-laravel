<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Lista las notas. El enlace "Eliminar" solo se muestra
     * si el usuario tiene el permiso destroy_notes (@can en la vista).
     */
    public function index()
    {
        $notes = Note::all();

        return view('notes.index', compact('notes'));
    }

    /**
     * Elimina una nota. La ruta está protegida con el middleware
     * "permission:destroy_notes" (ver routes/web.php).
     */
    public function destroy($id)
    {
        Note::findOrFail($id)->delete();

        return redirect()->back();
    }
}
