<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Statistic;
use App\Models\Subscription;


class ThemeController extends Controller
{
    public function allThemes()
    {
        $themes = Theme::all();
        return view('themes.all', compact('themes'));
    }
    public function ShowallThemes()
    {
        $themes = Theme::all();
        return view('themes.theme', compact('themes'));
    }

    public function subscribe($id)
    {
      $theme = Theme::find($id);
      Subscription::create([
        'user_id' => Auth::id(),
        'theme_id' => $id,
       ]);
       return redirect('/themes');
    }
    public function unsubscribetheme($id)
    {
        $theme = Theme::find($id);
        Subscription::where('user_id', Auth::id())
        ->where('theme_id', $theme->id)
        ->delete();
       return redirect('/themes');
    }

    public function SubscribedThemes()
    {
        $Themes = Theme::all();
        $themes = Auth::user()->subscribedThemes; // Get themes subscribed by the user
        return view('themes.subscribedto', compact('themes'));
    }
    public function allArticlesTheme(){
        $themes= Theme::all();
        return view('themes.articlesTheme',compact('themes'));
    }

    

    // Afficher les abonnés du thème du responsable simulé
    public function showSubscribers()
    {
        $user=Auth::user(); 
        if (!$user) {
            return abort(403, "Aucun responsable trouvé.");
        }

        $theme = $user->managedTheme;
        if (!$theme) {
            return abort(403, "Cet utilisateur n'est pas responsable d'un thème.");
        }

        $subscribers = $theme->subscribers; 
        return view('themes.subscribers', compact('theme', 'subscribers'));
    }

    // Désabonner un utilisateur du thème du responsable simulé
    public function unsubscribe($user_id)
    {
        $user=Auth::user(); 
        if (!$user) {
            return abort(403, "Aucun responsable trouvé.");
        }

        $theme = $user->managedTheme;
        if (!$theme) {
            return abort(403, "Cet utilisateur n'est pas responsable d'un thème.");
        }

        if (!$theme->subscribers()->where('user_id', $user_id)->exists()) {
            return back()->with('error', 'Cet utilisateur n\'est pas abonné à votre thème.');
        }

        $theme->subscribers()->detach($user_id);
        return back()->with('success', 'Utilisateur désabonné avec succès.');
    }

    // Mettre à jour les statistiques du thème du responsable simulé
    public function updateStatistics($theme_id)
{
    $user=Auth::user();
    if (!$user) {
        return abort(403, "Aucun responsable trouvé.");
    }

    $theme = $user->managedTheme;
    if (!$theme) {
        return abort(403, "Cet utilisateur n'est pas responsable d'un thème.");
    }

    $statistics = Statistic::updateOrCreate(
        ['theme_id' => $theme->id],
        [
            'total_articles' => $theme->articles()->count(),
            'proposals_pending' => $theme->articles()->where('status', 'pending')->count(),
            'proposals_approved' => $theme->articles()->where('status', 'approved')->count(),
            'proposals_rejected' => $theme->articles()->where('status', 'rejetected')->count(),
            'total_subscribers' => $theme->subscribers()->count(),
        ]
    );

    //  Retourner les statistiques au lieu d'un redirect
    return $statistics;
}


    // Afficher les statistiques du thème du responsable simulé
    public function showStatistics()
    {
        $user=Auth::user();
        if (!$user) {
            return abort(403, "Aucun responsable trouvé.");
        }

        $theme = $user->managedTheme;
        if (!$theme) {
            return abort(403, "Cet utilisateur n'est pas responsable d'un thème.");
        }

        $statistics = $this->updateStatistics($theme->id);

        return view('responsible.stats', compact('theme', 'statistics'));
    }

    public function ManagerArticles(){
        $user=Auth::user();
        $theme = $user->managedTheme;

        return view('articles.managerarticles',compact('theme'));
    }
    
}