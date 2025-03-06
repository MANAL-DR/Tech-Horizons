<?php

namespace App\Http\Controllers;

use App\Models\ArticleProposal;
use App\Models\ResponsibleProposal;
use App\Models\Theme;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleProposalController extends Controller
{
    //  Lister les propositions du thème du responsable
    public function index()
    {
        $user=Auth::user();

        if (!$user->managedTheme) {
            return redirect('/')->with('error', 'Vous n’êtes pas responsable d’un thème.');
        }

        $theme = $user->managedTheme;
        $proposals = $theme->articles()
        ->whereIn('status', ['pending', 'approved','proposed','published'])->get(); 

        return view('proposals.index', compact('theme', 'proposals'));
    }

    //  Approuver une proposition
    public function approve($id)
    {
        $user=Auth::user();
        $proposal=Article::find($id);

        // Vérifier si la proposition appartient au thème du responsable
        if ($proposal->theme_id !== $user->managedTheme->id) {
            return back()->with('error', 'Vous ne pouvez approuver que les propositions de votre thème.');
        }

        if ($proposal->status === 'approved') {
            return back()->with('error', 'Cette proposition est déjà approuvée.');
        }

        
        // Mettre à jour le statut de la proposition
        $proposal->update(['status' => 'approved']);

        return back()->with('success', 'Proposition approuvée et ajoutée aux articles.');
    }

    //  Rejeter une proposition
    public function reject($id)
    {
        $user=Auth::user();
        $proposal = Article::find($id);

        // Vérifier si la proposition appartient au thème du responsable
        if ($proposal->theme_id !== $user->managedTheme->id) {
            return back()->with('error', 'Vous ne pouvez rejeter que les propositions de votre thème.');
        }

        if ($proposal->status === 'rejected') {
            return back()->with('error', 'Cette proposition est déjà refusée.');
        }

        // Mettre à jour le statut
        $proposal->update(['status' => 'rejected']);

        return back()->with('success', 'Proposition rejetée.');
    }

    //  Proposer une proposition à l'éditeur
    public function propose($id)
    {
        $user=Auth::user();
        $proposal = Article::findOrFail($id);

        // Vérifier si la proposition appartient au thème du responsable
        if ($proposal->theme_id !== $user->managedTheme->id) {
            return back()->with('error', 'Vous ne pouvez proposer que les articles de votre thème.');
        }

        if ($proposal->status !== 'approved') {
            return back()->with('error', 'Seules les propositions approuvées peuvent être proposées à l’éditeur.');
        }

        // Mettre à jour le statut dans la table article
        $proposal->update(['status' => 'proposed']);

        return back()->with('success', 'Proposition envoyée à l’éditeur.');
    }

}  
