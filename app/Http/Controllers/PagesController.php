<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // $ php artisan make:controller PagesController 
    
    public function index() {
        $title = "Welcome to LaraBlog!"; 
        //return  view('pages.index', compact('title')); 
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = "About Us Page"; 
        return view('pages.about')->with('title', $title); 
    }

    public function services(){
        $data = array(
            'title' => 'Our Services',
            'services' => [
                'Programming', 'Web development', 'Hosting'
            ]
        ); 
        return view('pages.services')->with($data); 
    }

    public function contactus() {
        return view('pages.contactus'); 
    } 
}
