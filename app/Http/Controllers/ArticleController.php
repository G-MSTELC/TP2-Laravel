<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use PDF;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
    
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Validation des données

        // Création d'une nouvelle instance d'article
        $article = new Article();
        $article->title_en = $request->input('title_en');
        $article->content_en = $request->input('content_en');
        $article->title_fr = $request->input('title_fr');
        $article->content_fr = $request->input('content_fr');

        // Assigner l'ID de l'étudiant actuellement connecté
        $article->etudiant_id = Auth::user()->id;

        // Sauvegarder l'article
        $article->save();

        // Redirection et message de succès
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function show($id)
    {
        $article = Article::find($id);

        // Vérifiez si l'article existe
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article not found.');
        }

        // Vérifiez si l'utilisateur est autorisé à voir cet article
        if (Auth::check() && (Auth::user()->id === $article->etudiant_id)) {
            return view('articles.show', ['article' => $article]);
        } else {
            return redirect()->route('articles.index')->with('error', 'You are not authorized to view this article.');
        }
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title_fr' => 'required',
            'content_fr' => 'required',
            'title_en' => 'required',
            'content_en' => 'required',
        ]);
    
        // Mettre à jour les attributs de l'article avec les nouvelles valeurs
        $article->title_fr = $validatedData['title_fr'];
        $article->content_fr = $validatedData['content_fr'];
        $article->title_en = $validatedData['title_en'];
        $article->content_en = $validatedData['content_en'];
        $article->save();
    
        // Rediriger vers la page d'affichage de l'article mis à jour
        return redirect()->route('articles.show', $article->id)->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        // Supprimer l'article de la base de données
        $article->delete();

        // Rediriger vers la liste des articles
        return redirect()->route('articles.index');
    }

    public function showPdf(Article $article)
    {
        $pdf = PDF::loadView('articles.pdf', ['article' => $article]);
        return $pdf->stream('article.pdf');
    }
}
