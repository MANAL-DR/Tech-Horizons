<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\Note;
use App\Models\User;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    function articleShow($id){
        $article= Article::with('commentaires.user')->findOrFail($id);
        return view('article',compact('article'));
     }
    
    public function articleall()
    {
        $articles = Article::all()->where('status','approved');
        return view('allarticles', compact('articles'));
    }

    public function rating(Request $request){
        $user = Auth::user();
        $rating=$request->input('rate');
        $article_id=$request->article_id;
        $article= Article::findOrFail($article_id);
        
        $existingNote = Note::where('user_id', $user->id)
            ->where('article_id', $article_id)
            ->first();

        if ($existingNote) {
            $existingNote->update(['rating' => $request->rate]);
        } else {
            
            Note::create([
                'user_id' => $user->id,
                'article_id' => $article_id,
                'rating' => $rating,
            ]);
        }
        return redirect()->route('articleShow', $article_id)
            ->with('rating_success', 'Merci pour votre notation !');
     }

     public function addComment(Request $request){
        $id=$request->article_id;
        $comment=$request->input('comment');
        $user=Auth::user();
        if($user){
            Commentaire::create([
                'user_id'=>$user->id,
                'article_id'=>$id,
                'content'=>$comment,

            ]);
            return redirect()->route('articleShow',$id);
        }
        else {

            return back()->with('Register','Become a subscriber to Comment');
        }
     }
                              // Responsable Theme //
     // 1 *Afficher les articles du thème du responsable connecté*
    public function index()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié

        // Vérifier si l'utilisateur est un responsable de thème
        if (!$user || $user->role !== 'theme_manager') {
            return redirect('/')->with('error', 'Accès refusé.');
        }

        // Récupérer le thème associé au responsable
        $theme = $user->managedTheme;
        if (!$theme) {
            return redirect('/')->with('error', 'Aucun thème assigné.');
        }

        // Récupérer les articles liés au thème
        $articles = $theme->articles()->where('status','approved')->get();

        return view('articles.index', compact('theme', 'articles'));
    }

    // 2 *Afficher le formulaire pour ajouter un article*
    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'theme_manager') {
            return redirect('/')->with('error', 'Accès refusé.');
        }
        $theme = $user->managedTheme;
        if (!$theme) {
            return redirect('/')->with('error', 'Aucun thème assigné.');
        }

        return view('articles.create', compact('theme'));
    }

    // 3 *Ajouter un article*
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        if (!$user || $user->role !== 'theme_manager') {
            return redirect('/')->with('error', 'Accès refusé.');
        }

        $theme = $user->managedTheme;
        if (!$theme) {
            return redirect('/')->with('error', 'Aucun thème assigné.');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => 'pending', 
            'theme_id' => $theme->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('responsible.articles')->with('success', 'Article ajouté avec succès.');
    }

    // 4 *Supprimer un article*
    public function destroy($id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'theme_manager') {
            return redirect('/')->with('error', 'Accès refusé.');
        }

        $article = Article::findOrFail($id);
        if ($article->theme_id !== $user->managedTheme->id) {
            return redirect()->route('responsible.articles')->with('error', 'Vous ne pouvez pas supprimer cet article.');
        }

        $article->delete();
        return redirect()->route('responsible.articles')->with('success', 'Article supprimé avec succès.');
    }
                               //  Subscriber //

    public function subscriberCreate()
        {
            $themes = Theme::all();
            $articles= $articles = Article::where('user_id',Auth::id())->get();
            return view('articles.subscriberCreate' , compact('themes','articles'));
        }
   
    public function edit($id) 
    {

        $article = Article::find($id);
        $themes = Theme::all();
        return view('articles.edit', compact('article','themes'));
    }

    public function subscriberDestroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('article.create')->with('status','article supprimer');
       
    }

    public function update(Request $request,$id)
    {
        $article = Article::find($id);
        $article->title=$request->title;
        $article->content=$request->content;
        $article->theme_id=$request->theme_id;
        $article->save();
        return redirect()->route('article.create')->with('status','article  updated successfully !');
    }
    
    public function subscriberStore(Request $request)
    {
       var_dump($request->all());
       Article::create([
        'title' => $request->title,
        'content' => $request->content,
        'theme_id' => $request->theme_id,
        'user_id' => Auth::id()
       ]);
       return back();
    }

}