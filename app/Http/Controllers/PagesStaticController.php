<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class PagesStaticController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function page1(){
        return view('Commentaire.page1',[
            'titre'=>'La page 1'
        ]);
    }

    public function page2(){
        return view('Commentaire.page2',[
            'titre'=>'La page 2'
        ]);
    }

    public function about(){
        return view('pages.about');
    }
}
