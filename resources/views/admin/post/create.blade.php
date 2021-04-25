<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add post') }}                            
        </h2>   
        <a href="{{ route('categories') }}" class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>      
            &nbsp;  
            {{ __('Back') }}        
        </a>        
    </div>          
    </x-slot>   
    
  <div class="py-12"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
                          @csrf   
                          <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6"> 
                              <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">        
                                <div>       
                                  <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                  <input type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>                   
                                <div>   
                                  <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                                  <select id="category_id" name="category_id" autocomplete="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id}}">{{ $category->name}}</option>
                                    @endforeach
                                  </select> 
                                </div>    
                                <div>
                                  <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                                  <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 block w-full">   
                                </div> 
                                <div>
                                  <label class="block text-sm font-medium text-gray-700">Etiquetas</label> 
                                  @foreach ($tags as $tag)
                                    <label class="inline-flex items-center">  
                                      <input type="checkbox" id="{{ $tag->name }}" class="form-checkbox" name="tags[]" value="{{ $tag->id}}"> 
                                      <span class="ml-2">{{ $tag->name }}</span>      
                                    </label>                                           
                                  @endforeach 
                                </div>              
                            </div>      
                            <div class="grid grid-cols-1 gap-4 my-4">        
                              <div>
                                  <label for="extract" class="block text-sm font-medium text-gray-700">Extracto</label>
                                  <textarea rows="3" name="extract" id="extract" autocomplete="extract" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                              </div>      
                            </div>           
                            
                            <div class="grid grid-cols-1 gap-4 my-4">        
                              <div>
                                  <label for="body" class="block text-sm font-medium text-gray-700">Cuerpo del texto</label>
                                  <textarea rows="3" name="body" id="body" autocomplete="body" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                              </div>      
                            </div>      
                            

                            <div class="px-4 py-3 bg-white text-right sm:px-6"> 
                              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Save') }}    
                              </button>
                            </div>      
                          </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>      
    </div>                    
    
    
</x-app-layout>

