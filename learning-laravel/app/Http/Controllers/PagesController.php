<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function about(){
    	$name = 'Tymo de Kock';
        $people = ['Seb', 'Gobius', 'Lou', 'Pol', 'and more'];
    	return view('pages.about', compact('name', 'people'));
    }
    public function contact(){

        return view('pages.contact');
    }
}
