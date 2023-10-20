<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class PartageController extends Controller
{
    public function create()
    {
        return view('partage.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_fr' => 'required',
            'file' => 'required|file|mimes:pdf,zip,doc',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('files', $filename);

            $newFile = new File();
            $newFile->title_en = $validatedData['title_en'];
            $newFile->title_fr = $validatedData['title_fr'];
            $newFile->path = $path;
            $newFile->user_id = Auth::user()->id;
            $newFile->save();

            return redirect()->route('partage.create')->with('success', 'Fichier partagé avec succès.');
        }

        return back()->withInput()->with('error', 'Une erreur s\'est produite lors du téléchargement du fichier.');
    }

    public function index()
    {
        $files = File::with('user')->paginate(10);

        return view('partage.index', ['files' => $files]);
    }
}
