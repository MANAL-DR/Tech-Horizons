<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use Illuminate\Http\Request;

class NumeroController extends Controller
{
    public function publicNum()
    {
      $publicNum = Numero::where('status', 'public')->get();
      return view('homeh', compact('publicNum'));    
    }

    public function allNum()
    {
      $Numeros = Numero::all();
      return view('allnumeros', compact('Numeros'));    
    }

    public function publicShow($id)
    {
      $Numero = Numero::findOrFail($id);
      return view('publicArticles', compact('Numero'));    
    }
    public function allShow($id)
    {
      $Numero = Numero::findOrFail($id);
      return view('publicAndprivate', compact('Numero'));    
    }

    
   
}
