@extends('layouts.master')

@section('content')

<div class="max-w-7xl mx-auto  h-screen mt-3">
    <div class="bg-stone-200">
        <div class="relative">
            <div class=" align-middle inline-block min-w-full">
                <div class="flex justify-between items-center mt-4">
                    <div class="border border-gray-300 w-1/5 rounded-lg">
                        <select class="w-full p-3 rounded-lg shadow-sm" name="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                    </div>
                    <div class="flex border border-gray-300 rounded-lg shadow-sm">
                        <nav class="inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="bg-white text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white">

                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="#" aria-current="page" class="bg-white text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white">Last week</a>

                            <a href="#" class="bg-white text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white"> This week </a>

                            <a href="#" class="bg-white text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white"> Next week </a>

                            <a href="#" class="bg-white text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white">
                                <span class="sr-only">Next</span>

                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>   


        </div>
    </div>
    <div class="flex justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <div class="text-center text-md">
        Week Ending</div>   
    </div>    
    <div class="max-w-7xl mx-full h-screen mt-3">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-4">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-4">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-4 text-left text-lg text-black-800 tracking-wider"></th>
                                    <th scope="col" class="px-4 py-4 text-left text-lg font-medium text-black-800  tracking-wider">In</th>
                                    <th scope="col" class="px-4 py-4 text-left text-lg font-medium text-black-800  tracking-wider">Out</th>
                                    <th scope="col" class="px-4 py-4 text-left text-lg font-medium text-black-800  tracking-wider">Break</th>
                                    <th scope="col" class="px-4 py-4 text-left text-lg font-medium text-black-800  tracking-wider">Total</th>    
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 items-start">
                                <tr class="p-3">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">Mon</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-md text-gray-900 tracking-wider">9:30 Am</div>
                                    </td>
                                </tr>
                                <tr class="p-3">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">Mon</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-md text-gray-900 tracking-wider">9:30 Am</div>
                                    </td>
                                </tr>
                                <tr class="p-3">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">Mon</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-md text-gray-900 tracking-wider">9:30 Am</div>
                                    </td>
                                </tr>
                                <tr class="p-3">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">Mon</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-md text-gray-900 tracking-wider">9:30 Am</div>
                                    </td>
                                </tr>
                                <tr class="p-3">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">Mon</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-md text-gray-900 text-left tracking-wider">9:30 Am</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-md text-gray-900 tracking-wider">9:30 Am</div>
                                    </td>
                                </tr>





                                <!-- More people... -->
                            </tbody>
                            <tfoot class="bg-gray-50 w-full">
                                <tr class="w-full">
                        
                                    <th scope="col" class="py-4  text-left px-3 text-lg font-medium text-black-800  tracking-wider">Total hours</th>    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="hover:bg-blue-500 p-2 rounded-full my-3 border-2 border-black hover:text-white px-4 ">+ expenses</button>
       </div>

       <div class="flex justify-center">
            <button class="bg-blue-500 hover:bg-blue-600 p-2 rounded-full my-3 text-white px-4 ">Resubmit</button>
       </div>
    </div>


</div>
@endsection
