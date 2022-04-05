@extends('layouts.master')

@push('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.css" rel="stylesheet" />
	<style type="text/css">
		.fc-event {
		  	background: #0d9488;
		}
	</style>
@endpush

@section('content')

<div class="mt-5 pb-10">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<div id="calendar" class="bg-white p-10 rounded-lg"></div>
   	
	    <div class="show_booking hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
			<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

				<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-1/3">
					<div class="py-5 bg-white rounded-lg shadow-2xl">

						<input type="hidden" name="hours" value="" id="pass_hours">	
						<input type="hidden" name="booking_id" value="" id="booking_id">	
						<div class="flex justify-between items-center mx-5">
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
								</svg>
							</div>

							<div class="text-2xl text-center font-semibold text-teal-700 font-serif tracking-wide">
								BOOKING
							</div>
							<div class="pr-6">
								<button type="button" class="close_booking outline-none">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
									</svg>
								</button>
							</div>
						</div>
						<hr class="mt-5">
				
						<div class="flex items-center mx-5 grid grid-cols-12">
							<div class="mt-5 col-span-6 mr-5">
								<label class="p-2 text-gray-600 text-sm">Employee Name</label>
								<select name="employee_id" class="w-full border border-teal-600 rounded-full p-1 pl-3 outline-current" id="employee_id">
									<option class="text-left" value="">Select</option>
									@foreach($employees as $employee)
										<option class="text-left" value="{{ $employee->id }}">{{ $employee->name }}</option>
									@endforeach
								</select>
								<p id="error_employee" class="text-red-900"></p>
							</div>
							<div class="mt-5 col-span-6">
								<label class="p-2 text-gray-600 text-sm">Client Name</label>
								<select name="client_id" class="w-full border border-teal-600 rounded-full p-1 pl-3 outline-current" id="client_id">
									<option class="text-left" value="">Select</option>
									@foreach($clients as $client)
										<option class="text-left" value="{{ $client->id }}">{{ $client->name }}</option>
									@endforeach
								</select>
								<p id="error_client" class="text-red-900"></p>
							</div>
						</div>
							
						<div class="mt-3 mx-5 grid grid-cols-12">
							<div class="col-span-6 mr-5">
								<label class="p-2 text-gray-600 text-sm">Start Time</label>
								<input type="text" name="start" class="w-full border border-teal-600 rounded-full p-1 pl-3 outline-none" id="start">
							</div>

							<div class="col-span-6">
								<label class="p-2 text-gray-600 text-sm">End Time</label>
								<input type="text" name="end" class="w-full border border-teal-600 rounded-full p-1 pl-3 outline-none" id="end">
							</div>
						</div>

						<div class="mt-3 mx-5">
							<label class="p-2 text-gray-600 text-sm">Total hours</label>
							<input type="text" name="hours" class="w-full border border-teal-600 rounded-full p-1 pl-3 outline-none" id="hours" readonly="readonly">
						</div>
						<hr class="mt-5">
						<div class="flex items-center justify-center gap-2">
							<div class="flex items-center mt-7 justify-center">
								<button type="button" class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full outline-none" id="save" >Save</button>
							</div>		

							<div class="flex items-center mt-7 justify-center">
								<button type="button" id="" token="{{ csrf_token() }}" route="/bookings/destroy/" class="bg-red-600 hover:bg-red-700 text-white py-1 px-4 rounded-full outline-none delete">Delete</button>
							</div>		
						</div>
							    
					</div>
				</div>
			</div>
		</div> 

</div>

@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<script type="text/javascript">
$(document).ready(function() {
	var booking = @json($events);

	$('#calendar').fullCalendar({
		editable:true,
		updatable:true,
		selectable:true,
		selectHelper:true,
	  	defaultView: 'agendaWeek',
	
	    select: function(start, end, jsEvent, view) {

	    	$(".show_booking").dialog('open');

	    	var start = moment(start).format('YYYY-MM-DD HH:mm:ss');
	    	var start_time = moment(start).format('HH:mm:ss');
	    	var end = moment(end).format('YYYY-MM-DD HH:mm:ss');
	    	var end_time = moment(end).format('HH:mm:ss');
	    	var total_hours = moment(end_time, "HH:mm:ss").diff(moment(start_time, "HH:mm:ss"), 'minutes');
	        $('#start').val(start);
	        $('#end').val(end);
	        $('#hours').val(total_hours/60);

	        
	    },

	    header:{
	    	left: 'prev,next today',
	    	center:'title',
	    	right:'month,agendaWeek,agendaDay',
	    },

	     eventClick: function(calEvent, jsEvent, view) {
	  
		       $('.show_booking').dialog('open');
		       	var id = calEvent.id;
		        var url = "/bookings/show/" + id;  
		        $.ajax({
	               type:'GET',
	               url: url,
	               }).done(function(data) {
	                $('#employee_id').val(data[0].employee_id);
	                $('#client_id').val(data[0].client_id);
	                $('#start').val(data[0].start);
	                $('#end').val(data[0].end);
	                $('#hours').val(data[0].hours);
            	});

				var id = calEvent.id;
				
				$('.delete').attr('id', id);

				$('#booking_id').val(id);

		    },	

		    eventDrop: function(event){
		    	console.log(event);
		    	var id = event.id;
		    	var start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
		    	var end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');

		    	if(end == 'Invalid date'){
		    		end = start;
		    	}
		   
		    	$.ajax({
		    		url:"{{ route('bookings.edit', '') }}" + '/' + id,
		    		type:"GET",
		    		dataType:'json',
		    		data:{ start, end },
		    		success:function(response)
		    		{
		    			console.log(response)
		    		},
		    		error:function(error)
		    		{
		    			console.log(error)
		    		},
		    	});
		    },
	    events:booking



	});

	$('#save').click(function(){
		var id = $('#booking_id').val();
		var url = id ? "/bookings/update/" + id : "bookings/store"; 

		var employee_id = $('#employee_id').val();
		var client_id = $('#client_id').val();
		var start = $('#start').val();
		var end = $('#end').val();
		var hours = $('#hours').val();

    	$.ajax({
           	type: 'POST',
           	url: url,
           	data: { employee_id:employee_id, client_id:client_id, start:start, end:end, hours:hours },
		   	success:function(response) {	
			    location.reload();
    		},
    		error:function(error) {
    			var client_error = error.responseJSON.errors.client_id ? error.responseJSON.errors.client_id[0] : '';
    			var employee_error = error.responseJSON.errors.employee_id ? error.responseJSON.errors.employee_id[0] : '';
    			
    			$('#error_employee').text(employee_error);
    			$('#error_client').text(client_error);
    		},
    	});
	 });
	

	$(".show_booking").dialog({
	    autoOpen: false,
	    modal: true,
	}); 

	$(".close_booking").click(function(){
		$(".show_booking").dialog('close');
	});

});
</script>
	
@endpush