<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Article;
use Illuminate\Http\Request;

class EditorProposalController extends Controller
{
    /**
     * Affiche les propositions disponibles pour l'éditeur.
     */
    public function index()
    {
        // Récupère toutes les propositions dans responsible_proposals
        $proposals = Article::where('status', 'proposed')->get();

        // Retourne la vue avec les données des propositions
        return view('Editor.index', compact('proposals'));
    }
    public function showSuggested()
    {
        $proposals = Article::where('status', 'proposed')->get();
        return view('Editor.createIssue', compact('proposals'));
    }

    public function createIssue(Request $request){
        $title=$request->title;
        $description=$request->description;
        $statut=$request->status;
        $proposalid=$request->input('articlesid',[]);
        $numero=Numero::create([
            'title'=>$title,
            'description'=>$description,
            'status'=>$statut,
            'publication_date'=>now()->toDateString(),
        ]);
        $numeroId=$numero->id;
        foreach($proposalid as $id){
            Article::find($id)->update(['status'=>'published','numeros_id'=>$numeroId]);
            }
        return redirect()->back()->with('success', 'Numéro Ajoutés avec succès !');
    } 

}