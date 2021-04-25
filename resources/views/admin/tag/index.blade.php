<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags list') }}                       
        </h2>
        <a type="button" href="{{route('tags.create')}}" class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">    
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>        
            {{ __('Add') }}                 
        </a>        
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
                                    Fecha creación
                                </th>                       
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                                </tr>   
                            </thead>        
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tags as $tag)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{ $loop->iteration }} 
                                    </div>  
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $tag->name }}                
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $tag->created_at }}    
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
            </div>
        </div>      
    </div>      
</x-app-layout>
