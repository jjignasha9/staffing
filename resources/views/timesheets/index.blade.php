@extends('layouts.master')

@section('content')

<div class="flex justify-center item-center mt-5">
  <div class="px-4 py-2 mt-5 bg-white rounded-lg shadow-2xl">
    <form action="" method="">

      <div>
        <div class="flex justify-end">
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </a>
        </div>

        <div>
          <center><h1 class="mb-5 text-xl font-semibold text-gray-600">Tue 03/01 - Elon Musk</h1></center>

          <form>
            <div class="flex my-3">
              <label>Start time</label>
              <select name="starttime" class="w-48 ml-5 p-1 border border-gray-400 outline-none rounded-lg">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
              </select>
            </div>

            <div class="flex my-3">
              <label>End time</label>
              <select name="endtime" class="w-48 ml-7 p-1 border border-gray-400 outline-none rounded-lg">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
              </select>
            </div>

            <div class="flex my-3">
              <label>Break time</label>
              <select name="breaktime" class="w-48 ml-4 p-1 border border-gray-400 outline-none rounded-lg">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
              </select>              
            </div>

            <div class="flex justify-between">
              <div class="font-bold">Total</div>
              <div class="font-bold">8 hrs</div>
            </div>

            <div>
              <textarea type="text" placeholder="you can comment here" class="bg-gray-100 outline-none font-semibold mt-5 w-full px-3 py-1 border border-gray-400 rounded-lg"></textarea>
            </div>
            
            <div class="flex justify-center"> 
              <button class="mt-5 bg-blue-700 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-500">Create</button>
            </div>

          </form>
        </div>

      </div>

    </form>
  </div>

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
                                   <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm font-medium text-gray-900">Temp Button Internal(Sick)</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">Sample temp</div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">3/6/22</div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0 hrs</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm font-medium text-gray-900">Elon Musk</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">Sample temp</div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">3/6/22</div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16 hrs</td>
                                </tr>
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
                                   <tr>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">3/6/22</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16 hrs</td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">3/6/22</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16 hrs</td>
                                    </tr>
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