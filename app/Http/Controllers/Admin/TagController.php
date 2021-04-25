<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags = Tag::orderBy('id','desc')->get();                   
        return view('admin.tag.index', compact('tags'));            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]); 
        if($result){                            
            return redirect('etiquetas')->with('success', 'Se registro exitosamente la etiqueta!');
        }else{                          
            return redirect('etiquetas/crear')->with('error', 'Error al registrar la etiqueta!');            
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
        $tags = Tag::findOrFail($id);           
        return view('admin.tag.edit', compact('tags'));
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
        try {
            $tags = Tag::findOrFail($id);    
            $tags->update($request->all());       
            return redirect('etiquetas')->with('success', 'Se actualizo exitosamente la etiqueta!');       
        } catch (Throwable $e) {                    
            return redirect('etiquetas')->with('error', 'Error al actualizar la etiqueta!'.$e);            
        }   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);            
        $result = $tag->delete();      
        if($result){                            
            return redirect('etiquetas')->with('success', 'Se elimino exitosamente la etiqueta!');
        }else{                          
            return redirect('etiquetas')->with('error', 'Error al eliminar la etiqueta!');            
        }   
    }
}
