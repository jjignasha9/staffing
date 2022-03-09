@extends('layouts.master')

@section('content')

<div class="h-screen mt-10">
   <div class="grid grid-cols-12">
        <div class="col-span-9">
            <div class="flex flex-col">
                 <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <h1 class="font-semibold mx-2">Pending Timesheets</h1>    
                 </div>
                 <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                       <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                          <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                 <tr>  
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Client</th>     
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Temp</th>
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Weekending date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Total hours</th>
                                 </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                   @foreach($timesheets as $timesheet)
                                       <tr class="cursor-pointer hover:bg-gray-100" onclick="window.location.replace('{{ route('timesheets.edit', $timesheet->id) }}')">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm font-medium text-gray-900">{{ $timesheet->client->name }}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900">{{ $timesheet->employee->name }}</div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900">{{ Carbon\carbon::parse($timesheet->day_weekend)->format('m/d/y') }}</div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $timesheet->workdays->sum('total_hours') }} hrs</td>
                                        </tr>
                                    @endforeach
                              </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
            </div>
            <div class="flex flex-col mt-5">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                 </svg>
                  <h1 class="font-semibold mx-2">Approved Timesheets</h1>    
               </div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                           <table class="min-w-full divide-y divide-gray-200">
                               <thead class="bg-gray-50">
                                  <tr>
                                    
                                  </tr>
                               </thead>
                               <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($timesheetsapp as $timesheet)
                                       <tr>  
                                            <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900">{{ Carbon\carbon::parse($timesheet->day_weekend)->format('m/d/y') }}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                   <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $timesheet->workdays->count('id') }}
                                            </td>

                                            <td class="py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex items-center">
                                                    {{ $timesheet->workdays->sum('total_hours') }} hrs 
                                                    <a href="{{ route('timesheets.approvetimesheet', $timesheet->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                        </svg> 
                                                    </a> 
                                                </div> 
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
        <div class="col-span-3">   
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-7 pl-4">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white p-3">
                        <div class="flex justify-between items-center">
                            <h1 class="text-left text-md font-medium text-black-500 tracking-wider">Invited users</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div><hr>

                        <div class="py-2">test@ave.com</div><hr>
                        <div class="py-2">test@ave.com</div><hr>
                        <div class="py-2">test@ave.com</div><hr>
                        <div class="py-2">test@ave.com</div>
                    </div>
                </div>
           </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4 pl-4">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white p-3">
                        <div class="flex mb-4">
                            <h1 class="text-left text-md font-medium text-black-500 tracking-wider">Next holiday</h1>
                        </div>

                       <div>Vaterans day - 04/25/2022</div>
                    </div>
                </div>
           </div>
           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4 pl-4">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white p-3">
                        <div class="flex justify-between items-center mb-2">
                            <h1 class="text-left text-md font-medium text-black-500 tracking-wider">Client settings</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex items-center py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" name="search" placeholder="search" class="px-2 outline-none">
                        </div><hr>
                        <div class="flex justify-between items-center py-2">
                           <span>Elon Musk</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div><hr>
                         <div class="flex justify-between items-center py-2">
                           <span>Temp Button Internal(Sick)</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
           </div>
        </div> 
   </div>   
</div>

@endsection