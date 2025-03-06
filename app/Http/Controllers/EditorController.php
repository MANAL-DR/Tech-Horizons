<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Article;
use App\Models\Theme;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;

class EditorController extends Controller
{
    function displaySubscribers(){
        $subscribers=User::all()->where('role','subscriber');
        return view('Editor.subscribers',compact('subscribers'));

    }
    function displayManagers(){
        $managers=User::all()->where('role','theme_manager');
        return view('Editor.managers',compact('managers'));
    }

    public function deleteUser(Request $request){
        $id=$request->id;
        Subscription::where('user_id', $id)->delete();
        User::findOrFail($id)->delete();

        return back();
    }
    public function updateUser(Request $request){
        $role=$request->role;
        $id=$request->id;
        User::findOrFail($id)->update(['role'=>$role]);
        return back();
    }


    public function showNumeros(){
        $numerospublics=Numero::all()->where('status','public');
        $numerosprivates=Numero::all()->where('status','private');

        return view('Editor.numeros',compact('numerospublics','numerosprivates'));
    }

    public function changeStatus(Request $request){
        $action=$request->action;
        $numid=$request->numid;
        Numero::find($numid)->update(['status'=>$action]);
        return back();
    }

    public function statistics(){
        // Number of approved or published articles
        $approvedAndPublishedArticlesCount = Article::whereIn('status', ['approved', 'published'])
        ->count();

        // Number of private issues
        $privateIssuesCount = Numero::where('status', 'private')->count();

        // Number of public issues
        $publicIssuesCount = Numero::where('status', 'public')->count();

        // Number of pending articles
        $pendingArticlesCount = Article::where('status', 'pending')->count();

        // Number of themes
        $themesCount = Theme::count();
        $usersCount= User::whereIn('role',['theme_manager','subscriber'])->count();

        // Number of theme managers
        $managersCount = User::where('role', 'theme_manager')->count();

        // Number of subscribers
        $subscribersCount = User::where('role', 'subscriber')->count();

        // Pass data to the view
        return view('Editor.stats', compact(
            'approvedAndPublishedArticlesCount',
            'privateIssuesCount',
            'publicIssuesCount',
            'pendingArticlesCount',
            'themesCount',
            'managersCount',
            'subscribersCount',
            'usersCount',
        ));
    }
}

