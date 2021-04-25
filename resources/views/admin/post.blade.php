<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts list') }}                       
        </h2>
        <button class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">
            <svg class="group-hover:text-light-blue-600 text-light-blue-500 mr-2" width="12" height="20" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>      
            {{ __('Add') }}     
        </button>   
    </div>
    </x-slot>   

    <div class="py-12">     
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">     
                            <thead class="bg-gray-50">          
                                <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Imagen
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Resumen
                                </th>      
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cuerpo del texto
                                </th>        --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estatus
                                </th>   
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuario
                                </th>        
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoria
                                </th>   
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha creación
                                </th>         
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                                </tr>   
                            </thead>        
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{ $post->id }}         
                                    </div>              
                                </td>       
                                <td class="px-6 py-4">  
                                    {{ $post->name }}                  
                                </td>       
                                <td class="px-6 py-4">  
                                    <img src="{{ asset('storage/'.$post->image->url) }}">              
                                </td>   
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                   <p class="overflow-hidden truncate w-5">
                                       {{ $post->extract }}    
                                   </p>
                                </td>     
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <p class="overflow-hidden truncate w-5">    
                                        {{ $post->body }}           
                                    </p>            
                                </td>     --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($post->status == 1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Activo
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">    
                                            Inactivo
                                        </span>
                                    @endif     
                                </td>  
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $post->user->name }}        
                                </td>    
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $post->category->name }}         
                                </td>    
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $post->created_at }}    
                                </td>               
                                <td class="px-6 py-4 whitespace-nowrap"> 
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-current rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</button>   
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-current rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Eliminar</button>
                                </td>           
                                </tr>                                      
                            @endforeach                            
                            </tbody>                                
                            </table>                        
                        </div>
                        </div>
                    </div>
                </div>              
                <div class="flex flex-col py-4">        
                    {{ $posts->links() }}                       
                </div>              
            </div>
        </div>       
    </div>      
</x-app-layout>
