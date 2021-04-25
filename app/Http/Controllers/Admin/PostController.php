<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);                                 
        return view('admin.post.index', compact('posts'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','desc')->get();      
        $tags = Tag::orderBy('name','desc')->get();        
        return view('admin.post.create', ['categories' => $categories, 'tags' => $tags]);   
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                     
        $post = Post::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'category_id'   => $request->category_id,
            'user_id'       => Auth::user()->id,
            'extract'       => $request->extract,   
            'body'          => $request->body,            
        ]); 
        if($request->file('image')){    
            $url = Storage::put('posts', $request->file('image'));
            $post->image()->create([
                'url' => $url
            ]);
        }   
        if($request->tags){
            $post->tags()->attach($request->tags);

        }               
        if($post){                            
            return redirect('publicaciones')->with('status', 'Se registro exitosamente la publicación!');
        }else{                          
            return redirect('publicaciones/crear')->with('status', 'Error al registrar la publicación!');            
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
