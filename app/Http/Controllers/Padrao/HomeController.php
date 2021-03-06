<?php

namespace App\Http\Controllers\Padrao;

use App\Categorias;
use App\Http\Controllers\Controller;
use App\Portfolios;
use App\Trabalhos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        if($user === null){
            return view('pages\padrao\welcome');
        }

        $categorias = Categorias::orderBy("nome")->get();

        if($request->categoria_search !== null && $request->categoria_search !== ""){

            $portfolios = Portfolios::select("id")->where("categorias_id",$request->categoria_search)->get();

        } else if($request->user_search !== null){

            $user_search = User::select("id")->where("nome","LIKE","%".$request->user_search."%")->get();
            $portfolios = Portfolios::select("id")->whereIn("users_id",$user_search)->get();

        } else {

            $portfolios = Portfolios::select("id")->get();
        
        }
        
        $trabalhos = Trabalhos::whereIn("portfolio_id",$portfolios)->where("status",1)->get();

        return view('pages\padrao\home', compact('categorias', "trabalhos", "user"));
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}