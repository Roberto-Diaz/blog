<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $categories = Category::orderBy('id','desc')->get();                
        return view('admin.category.index', compact('categories'));      
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]); 
        if($result){                            
            return redirect('categorias')->with('success', 'Se registro exitosamente la categoria!');
        }else{                          
            return redirect('categorias/crear')->with('error', 'Error al registrar la categoria!');            
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
        $category = Category::findOrFail($id);      
        return view('admin.category.edit', compact('category'));
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
            $category = Category::findOrFail($id);    
            $category->update($request->all());             
            return redirect('categorias')->with('success', 'Se actualizo exitosamente la categoria!');       
        } catch (Throwable $e) {                    
            return redirect('categorias')->with('error', 'Error al actualizar la categoria!'.$e);            
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
        $category = Category::findOrFail($id);  
        $result = $category->delete();      
        if($result){                            
            return redirect('categorias')->with('success', 'Se elimino exitosamente la categoria!');
        }else{                          
            return redirect('categorias')->with('error', 'Error al eliminar la categoria!');            
        }  
    }
}
