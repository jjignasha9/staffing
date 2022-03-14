@extends('layouts.master')

@section('content')

<div class="max-w-7xl mx-auto  h-screen mt-3">
    <div class="bg-stone-200">
        <div class="relative">
            <div class=" align-middle inline-block min-w-full">
                <div class="flex justify-between items-center mt-4">
                    <div class="w-1/5 rounded-lg bg-white p-3 border border-gray-300">
                       Client Name: {{ $timesheet->client->name }}
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

                                <tr class="p-3 add-workday cursor-pointer" readonly="readonly"  date="{{ $day['date'] }}" day="{{ $day['name'] }}" id="{{ $day['workday'] ? $day['workday']['id'] : '' }}">
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
        <div class="flex items-center justify-center gap-2">
            @if(Auth::user()->user_role->name == 'supervisor')
                @if($timesheet->status_id == '2')
                    <div class="flex justify-center">
                         <a href="{{ route('timesheets.update', $timesheet->id) }}" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-full my-3 text-white px-4">Approve</a>
                   </div>
                   <div class="flex justify-center">
                        <a href="{{ route('timesheets.reject', $timesheet->id) }}" class="bg-red-500 hover:bg-red-600 p-2 rounded-full my-3 text-white px-4" id="reject_timesheet">Reject</a>
                    </div>  
                @else
                    <div class="flex justify-center">
                         <a href="{{ route('timesheets.update', $timesheet->id) }}" class="invisible bg-blue-500 hover:bg-blue-600 p-2 rounded-full my-3 text-white px-4">Approve</a>
                   </div>
                @endif

            @endif

        </div>
        
</div>



<div class="fixed z-10 inset-0 overflow-y-auto workday hidden invisible" aria-labelledby="modal-title" role="dialog" aria-modal="true" >
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>


        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-96">


            <div class="px-10 py-5 bg-white rounded-lg shadow-2xl">
                <form action="{{ route('workdays.store') }}" method="POST" id="workday_form">
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
                            <center><h1 class="mb-5 text-xl font-semibold text-gray-600">
                               
                                 <span id="workday_heading_date"></span>   
                                 - {{ $timesheet->client->name }}</h1></center>

                            <div class="flex my-3">
                                <label>In time</label>
                                <select name="in_time" class="w-48 ml-10 p-1 border border-gray-400 outline-none rounded-lg calc-total-hours" id="update_in_time">
                                    <option value="">Select</option>
                                    <option value="00:00:00">00:00</option>
                                    <option value="00:30:00">00:30</option>
                                    <option value="01:00:00">01:00</option>
                                    <option value="01:30:00">01:30</option>
                                    <option value="02:00:00">02:00</option>
                                    <option value="02:30:00">02:30</option>
                                    <option value="03:00:00">03:00</option>
                                    <option value="03:30:00">03:30</option>
                                    <option value="04:00:00">04:00</option>
                                    <option value="04:30:00">04:30</option>
                                    <option value="05:00:00">05:00</option>
                                    <option value="05:30:00">05:30</option>
                                    <option value="06:00:00">06:00</option>
                                    <option value="06:30:00">06:30</option>
                                    <option value="07:00:00">07:00</option>
                                    <option value="07:30:00">07:30</option>
                                    <option value="08:00:00">08:00</option>
                                    <option value="08:30:00">08:30</option>
                                    <option value="09:00:00">09:00</option>
                                    <option value="09:30:00">09:30</option>
                                    <option value="10:00:00">10:00</option>
                                    <option value="10:30:00">10:30</option>
                                    <option value="11:00:00">11:00</option>
                                    <option value="11:30:00">11:30</option>
                                    <option value="12:00:00">12:00</option>
                                    <option value="12:30:00">12:30</option>
                                    <option value="13:00:00">13:00</option>
                                    <option value="13:30:00">13:30</option>
                                    <option value="14:00:00">14:00</option>
                                    <option value="14:30:00">14:30</option>
                                    <option value="15:00:00">15:00</option>
                                    <option value="15:30:00">15:30</option>
                                    <option value="16:00:00">16:00</option>
                                    <option value="16:30:00">16:30</option>
                                    <option value="17:00:00">17:00</option>
                                    <option value="17:30:00">17:30</option>
                                    <option value="18:00:00">18:00</option>
                                    <option value="18:30:00">18:30</option>
                                    <option value="19:00:00">19:00</option>
                                    <option value="19:30:00">19:30</option>
                                    <option value="20:00:00">20:00</option>
                                    <option value="20:30:00">20:30</option>
                                    <option value="21:00:00">21:00</option>
                                    <option value="21:30:00">21:30</option>
                                    <option value="22:00:00">22:00</option>
                                    <option value="22:30:00">22:30</option>
                                    <option value="23:00:00">23:00</option>
                                    <option value="23:30:00">23:30</option>
                                </select>
                            </div>

                            <div class="flex my-3">
                                <label>Out time</label>
                                <select name="out_time" class="w-48 ml-7 p-1 border border-gray-400 outline-none rounded-lg calc-total-hours" id="update_out_time">
                                     <option value="">Select</option>
                                    <option value="00:00:00">00:00</option>
                                    <option value="00:30:00">00:30</option>
                                    <option value="01:00:00">01:00</option>
                                    <option value="01:30:00">01:30</option>
                                    <option value="02:00:00">02:00</option>
                                    <option value="02:30:00">02:30</option>
                                    <option value="03:00:00">03:00</option>
                                    <option value="03:30:00">03:30</option>
                                    <option value="04:00:00">04:00</option>
                                    <option value="04:30:00">04:30</option>
                                    <option value="05:00:00">05:00</option>
                                    <option value="05:30:00">05:30</option>
                                    <option value="06:00:00">06:00</option>
                                    <option value="06:30:00">06:30</option>
                                    <option value="07:00:00">07:00</option>
                                    <option value="07:30:00">07:30</option>
                                    <option value="08:00:00">08:00</option>
                                    <option value="08:30:00">08:30</option>
                                    <option value="09:00:00">09:00</option>
                                    <option value="09:30:00">09:30</option>
                                    <option value="10:00:00">10:00</option>
                                    <option value="10:30:00">10:30</option>
                                    <option value="11:00:00">11:00</option>
                                    <option value="11:30:00">11:30</option>
                                    <option value="12:00:00">12:00</option>
                                    <option value="12:30:00">12:30</option>
                                    <option value="13:00:00">13:00</option>
                                    <option value="13:30:00">13:30</option>
                                    <option value="14:00:00">14:00</option>
                                    <option value="14:30:00">14:30</option>
                                    <option value="15:00:00">15:00</option>
                                    <option value="15:30:00">15:30</option>
                                    <option value="16:00:00">16:00</option>
                                    <option value="16:30:00">16:30</option>
                                    <option value="17:00:00">17:00</option>
                                    <option value="17:30:00">17:30</option>
                                    <option value="18:00:00">18:00</option>
                                    <option value="18:30:00">18:30</option>
                                    <option value="19:00:00">19:00</option>
                                    <option value="19:30:00">19:30</option>
                                    <option value="20:00:00">20:00</option>
                                    <option value="20:30:00">20:30</option>
                                    <option value="21:00:00">21:00</option>
                                    <option value="21:30:00">21:30</option>
                                    <option value="22:00:00">22:00</option>
                                    <option value="22:30:00">22:30</option>
                                    <option value="23:00:00">23:00</option>
                                    <option value="23:30:00">23:30</option>
                                </select>
                            </div>

                            <div class="flex my-3">
                                <label>Break time</label>
                                <select name="break" class="w-48 ml-4 p-1 border border-gray-400 outline-none rounded-lg calc-total-hours" id="update_break" >
                                     <option value="">Select</option>
                                    <option value="0">00:00</option>
                                    <option value="0.5">00:30</option>
                                    <option value="1">01:00</option>
                                    <option value="1.5">01:30</option>
                                    <option value="2">02:00</option>
                                    <option value="2.5">02:30</option>
                                    <option value="3">03:00</option>
                                </select>              
                            </div>

                            <div class="flex my-3">
                                <label>Shift</label>
                                <select name="shift_id" class="w-48 ml-14 p-1 border border-gray-400 outline-none rounded-lg" id="update_shift">
                                    <option value="">Select</option>

                                    @foreach($shifts as $shift)
                                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                    @endforeach
                                    
                                </select>              
                            </div>

                            <div class="flex justify-between">
                                <div class="font-bold">Total</div>
                                <div class="font-bold" id="total_hours"></div>
                            </div>

                            <div>
                                <textarea type="text" name="comment" placeholder="you can comment here" class="bg-gray-100 outline-none font-semibold mt-5 w-full px-3 py-1 border border-gray-400 rounded-lg" id="comment"></textarea>
                            </div>

                            <div class="flex justify-center"> 
                                <button type="submit" class="mt-5 bg-blue-700 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-500">Save</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">


$(document).ready(function() {

    $('.add-workday').click(function() {
        
        var date = $(this).attr('date');
        var day = $(this).attr('day');
        var id = $(this).attr('id');
        var url = "/workdays/show/" + id;
        $('#workday_heading_date').text(day + ' ' + date);
        if (id) {
            $.ajax({
                method:"GET",
                url: url,
            }).done(function(data) {
                $('#comment').val(data.comment);
                $('#update_shift').val(data.shift_id);
                $('#update_in_time').val(data.in_time);
                $('#update_out_time').val(data.out_time);
                $('#update_break').val(data.break);
                $('#total_hours').text(data.total_hours + ' hrs');
            }); 

            $('#workday_form').attr('action', '/workdays/update/' + id);

        } else {
            $('#comment').val('');
            $('#update_shift').val('');
            $('#update_in_time').val('01:00:00');
            $('#update_out_time').val('');
            $('#update_break').val('');

            $('#workday_form').attr('action', "{{ route('workdays.store') }}");
        }

        $('.workday-date').val(date);

        $('.workday').show();
    });

    $('.emailbox').click(function() {
        $('.show_email').show();
    });

    $('.close-workday').click(function() {
        $('.workday').hide();
    });

    $('.close-mail').click(function() {
        $('.show_email').hide();
    });

    $('.calc-total-hours').change(function(){

        var in_time = $('#update_in_time').val();
        var out_time = $('#update_out_time').val();
        var break_time = $('#update_break').val();

        var total_hours = moment(out_time, "HH:mm:ss").diff(moment(in_time, "HH:mm:ss"), 'minutes');
        total_hours = total_hours / 60;
        total_hours = parseFloat(total_hours) - parseFloat(break_time);

        $('#total_hours').text(total_hours + ' hrs');
    });

    $('#disabled').click(function(){
        $("#disabled").prop('disabled', true);

        $("#disabled").attr('disabled','disabled');
    }); 

   
});


</script>

@endpush
