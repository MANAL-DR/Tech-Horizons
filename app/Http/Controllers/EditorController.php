<?php

namespace App\Http\Controllers;

use App\Models\Numero;
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
}
