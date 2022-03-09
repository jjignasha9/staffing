@extends('layouts.master')

@section('content')

<div class="h-screen mt-10">
	<div class="flex flex-col">
                 <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <h1 class="font-semibold mx-2">Approved Timesheets</h1>       
                 </div>
                 <div class="flex items-center mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h1 class="text-md text-gray-900 my-2 mx-2">Week Ending {{ Carbon\carbon::parse($weekend)->format('Y-m-d') }}</h1>
                </div> 
                 
                 <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                       <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                          <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                 <tr>  
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Client</th>     
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Temp</th>
                                   <!--  <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Weekending date</th> -->
                                    <th scope="col" class="px-6 py-3 text-left text-md font-medium text-gray-500 tracking-wider">Total hours</th>
                                 </tr>
                               </thead>
                               <tbody class="bg-white divide-y divide-gray-200">                           	  
                                    @foreach($timesheets as $timesheet)	
                                    
                                      	@foreach($timesheet->workdays as $hours)      	
                                    	<tr>                                       		
                                    	    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex items-center">
                                                {{ $timesheet->client->name }}                                     
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $timesheet->employee->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $hours->total_hours }}
                                           </td>
                                         </tr>
                                        @endforeach     
                                  @endforeach
                               </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
            </div>
</div>
@endsection