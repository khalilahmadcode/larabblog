<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Post; 
use DB; 

class PostsController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

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
            'body' => 'required', 
            'cover_image'=>'image|nullable|max:1999'
        ]);

        // Handle fild upload 
        if($request->hasFile('cover_image')){
            // get file with ext 
            $fileNameWithExtention = $request->file('cover_image')->getClientOriginalName();

            // file name only 
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME); 

            // Get file ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            
            // File Name to store 
            $fileNameToStore = $fileName .'_'. time() .'.'. $extension; 

            //upload/move the image. 
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore); 
        } else {
            $fileNameToStore = 'no-image.jpg'; 
        }
 
        $post = new Post; 
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();  

        // $data = new Post([
        //     'title' => $request->get('title'), 
        //     'body' => $request->get('body'), 
        //     'user_id' => auth()->user()->id
        // ]);
       // $data->save(); 

        return redirect('dashboard')->with('success', 'Date posted successfully.');
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
        // $post = Post::find($id);
        $post = Post::findOrFail($id); 
        if(auth()->user()->id !== $post->user_id) {
            return redirect('posts')->with('error', 'Unauthorized');
        }
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
            'body' => 'required', 
            'cover_image'=>'image|nullable|max:1999'
        ]);
       
        // Handle fild upload 
        $fileNameToStore = "";
        if($request->hasFile('cover_image')){
            // get file with ext 
            $fileNameWithExtention = $request->file('cover_image')->getClientOriginalName();

            // file name only 
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME); 

            // Get file ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            
            // File Name to store 
            $fileNameToStore = $fileName .'_'. time() .'.'. $extension; 

            //upload/move the image. 
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore); 
        }

        //'user_id'=>auth()->user()-id
        $form_data = array(
            'title' => $request->title, 
            'body' => $request->body
        ); 


        // if updated image 
        if($request->hasFile('cover_image')) {
            $form_data['cover_image'] =$fileNameToStore;
        }
        

        Post::whereId($id)->update($form_data); 
        return redirect('/dashboard')->with('success', 'The post is successfully updated.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Post::find($id);
        $post = Post::findOrFail($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('posts')->with('error', 'Unauthorized'); 
        }

        // Do not delte if the image is no-image 
        if($post->cover_image != 'no-image.png') {
            Storage::delete('public/cover_image/'.$post->cover_image); 
        }   

        $post->delete(); 
        return redirect('/dashboard')->with('success', 'Date is succefully deleted.');
    }
}
