<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use DB; 

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts =  Post::all();
        //return $post = Post::where('title', 'Post tow')->get();

        /** use DB; as above  */
        //$posts = DB::select('SELECT * FROM posts'); 

        // $posts = Post::orderBy('title', 'desc')->get();
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('posts.index')->with('posts', $posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required', 
            'body' => 'required'
        ]);

        //print_r($request); 

        //return 123; 

        $data = new Post([
            'title' => $request->get('title'), 
            'body' => $request->get('body')
        ]);

        $data->save(); 
        return redirect()->route('posts.create')->with('success', 'Date posted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); 
        return view('posts.edit')->with('post', $post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'body' => 'required'
        ]);

        $form_data = array(
            'title' => $request->title, 
            'body' => $request->body
        ); 

        Post::whereId($id)->update($form_data); 
        return redirect('/posts')->with('success', 'The post is successfully updated.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete(); 
        return redirect('/posts')->with('success', 'Date is succefully deleted.');
    }
}
