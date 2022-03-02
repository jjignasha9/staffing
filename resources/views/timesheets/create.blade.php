@extends('layouts.master')

@section('content')

<div class="max-w-7xl mx-auto  h-screen mt-3">
    <div class="bg-stone-200">
        <div class="relative">
            <div class=" align-middle inline-block min-w-full">
                <div class="flex justify-between items-center mt-4">
                    <div class="w-1/5 rounded-lg bg-white p-3 border border-gray-300">
                       Client Name: {{ Auth::user()->client_by_employee->client->name }}
                    </div>
                    <div class="flex border border-gray-300 rounded-lg shadow-sm">
                        <nav class="inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                            
                            <button type="button" class="bg-white cursor-pointer change-week text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white {{ $temp_weekend < -1 ? 'bg-blue-500 text-white' : '' }}" week="minus">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <button type="button" aria-current="page" class="bg-white cursor-pointer change-week text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white {{ $temp_weekend == -1 ? 'bg-blue-500 text-white' : '' }}" week="previous">
                                Last week
                            </button>

                            <button type="button" class="bg-white cursor-pointer change-week text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white {{ $temp_weekend == 0 ? 'bg-blue-500 text-white' : '' }}" week="current"> 
                                This week 
                            </button>

                            <button type="button" class="bg-white cursor-pointer change-week text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white {{ $temp_weekend == 1 ? 'bg-blue-500 text-white' : '' }}" week="next"> 
                                Next week 
                            </button>

                            <button type="button" class="bg-white cursor-pointer change-week text-gray-500 relative inline-flex items-center px-4 py-3 border text-md font-medium hover:bg-blue-500 hover:text-white {{ $temp_weekend > 1 ? 'bg-blue-500 text-white' : '' }}" week="plus">
                                <span class="sr-only">Next</span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>

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
        Week Ending {{ $weekend }}</div>   
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

                                @foreach($weekdays as $day)

                                <tr class="p-3 add-workday cursor-pointer hover:bg-gray-100" date="{{ $day['date'] }}">
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-md font-medium text-gray-900 tracking-wider">{{ $day['name'] . ' ' . $day['date'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">{{ $day['workday'] ? Carbon\carbon::parse($day['workday']['in_time'])->format('H:i A') : '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">{{ $day['workday'] ? Carbon\carbon::parse($day['workday']['out_time'])->format('H:i A') : '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" text-md text-gray-900 text-left tracking-wider">{{ $day['workday'] && $day['workday']['break'] > 0 ? $day['workday']['break'] : '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        {{ $day['workday'] && $day['workday']['total_hours'] > 0 ? $day['workday']['total_hours'] : '' }}
                                    </td>
                                </tr>
                                
                                @endforeach



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


<div class="fixed z-10 inset-0 overflow-y-auto workday hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>


        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-96">


            <div class="px-10 py-5 bg-white rounded-lg shadow-2xl">
                <form action="{{ route('workdays.store') }}" method="POST">
                    @csrf


                    <input type="hidden" name="day_weekend" value="{{ $weekend }}">
                    <input type="hidden" name="date" class="workday-date">

                    <div>
                        <div class="flex justify-end">
                            <button type="button" class="close-workday">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <center><h1 class="mb-5 text-xl font-semibold text-gray-600">Tue 03/01 - Elon Musk</h1></center>

                            <div class="flex my-3">
                                <label>In time</label>
                                <select name="in_time" class="w-48 ml-5 p-1 border border-gray-400 outline-none rounded-lg">
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
                                <label>Out time</label>
                                <select name="out_time" class="w-48 ml-7 p-1 border border-gray-400 outline-none rounded-lg">
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
                                <select name="break" class="w-48 ml-4 p-1 border border-gray-400 outline-none rounded-lg">
                                    <option value="0">00:00</option>
                                    <option value="0.50">00:30</option>
                                    <option value="01">01:00</option>
                                    <option value="01.50">01:30</option>
                                    <option value="02">02:00</option>
                                    <option value="02.50">02:30</option>
                                    <option value="03">03:00</option>
                                </select>              
                            </div>

                            <div class="flex my-3">
                                <label>Shift</label>
                                <select name="shift_id" class="w-48 ml-4 p-1 border border-gray-400 outline-none rounded-lg">
                                    <option>Select</option>

                                    @foreach($shifts as $shift)
                                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                    @endforeach
                                    
                                </select>              
                            </div>

                            <div class="flex justify-between">
                                <div class="font-bold">Total</div>
                                <div class="font-bold">8 hrs</div>
                            </div>

                            <div class="flex justify-between mt-5">
                                <label>Supervisor</label>
                                <select name="supervisor_id" class="w-48 ml-4 p-1 border border-gray-400 outline-none rounded-lg">
                                    <option>Select</option>

                                    @foreach(Auth::user()->client_by_employee->client->supervisors as $row)
                                        <option value="{{ $row->supervisor->id }}">{{ $row->supervisor->name }}</option>
                                    @endforeach
                                </select>              
                            </div> 

                            <div>
                                <textarea type="text" name="comment" placeholder="you can comment here" class="bg-gray-100 outline-none font-semibold mt-5 w-full px-3 py-1 border border-gray-400 rounded-lg"></textarea>
                            </div>

                            <div class="flex justify-center"> 
                                <button type="submit" class="mt-5 bg-blue-700 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-500">Create</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>



        </div>
    </div>
</div>



@endsection


@push('scripts')

<script type="text/javascript">
$(document).ready(function() {

    var active_week = "{{ $temp_weekend }}";

    $('.add-workday').click(function() {
        
        var date = $(this).attr('date');

        $('.workday-date').val(date);

        $('.workday').show();
    });

    $('.close-workday').click(function() {
        $('.workday').hide();
    });

    $('.change-week').click(function() {

        let week = $(this).attr('week');

        console.log(active_week);
        console.log(week);
        

        let url = "{{ route('timesheets.create') }}"

        if (week == 'next') {

            var counter = parseInt(active_week) + 1;


            window.location.href = url + '/' + counter;

        }


        if (week == 'previous') {

            var counter = parseInt(active_week) - 1;

            window.location.href = url + '/' + counter;

        }


        if (week == 'minus') {

            active_week = parseInt(active_week) - 1; 

            console.log(active_week);

            window.location.href = url + '/' + active_week;
            
        }


        if (week == 'plus') {

            active_week = parseInt(active_week) + 1; 

            console.log(active_week);

            window.location.href = url + '/' + active_week;
            
        }


        if (week == 'current') {

            window.location.href = url;
            
        }
        console.log(week);




    });

});
</script>

@endpush
