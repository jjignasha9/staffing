@extends('layouts.master')

@section('content')
<div class="grid grid-cols-12 mt-5">
	<div class="col-span-2 text-gray-500 font-semibold">
		<div class="text-sm mt-3">
			<a href="{{ route('payrolls') }}">
				RUN PAYROLL
			</a>
		</div>
		<div class="mt-5 text-sm">
			<a href="{{ route('payrolls.paid-payroll') }}"class="active {{ (request()->segment(2) == 'paidpayroll') ? 'active' : '' }}">
				PAID PAYROLL
			</a>
		</div>
	</div>

	<div class="col-span-10">
		<div class="text-gray-500 ml-5 text-sm font-semibold">
			<div class="grid grid-cols-12">
				<div class="col-span-3">PAID DATE RANGE</div>
				<div class="col-span-3">USERS</div>
				<div class="col-span-3">TOTAL AMOUNT</div>
				<div class="col-span-3">PAID DATE</div>
			</div>
		</div>

		@foreach($payrolls as $day_weekend => $payroll)
		<div class="bg-white mt-5 p-5 rounded-lg hover:bg-teal-50 cursor-pointer payrollbox clickpayroll" day_weekend="{{ $day_weekend }}">
			<div class="grid grid-cols-12">
				<div class="col-span-3">
					<div class="flex items-center" >
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
						<span class="px-2">{{ Carbon\carbon::parse($day_weekend)->format('m/d/Y') }}</span>	
					</div>
				</div>

				<div class="col-span-3">
					<div class="flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
						</svg>
						<span>{{ $payroll->count('timesheet_id') }}</span>
				    </div>
				</div>

				<div class="col-span-3 font-semibold text-sm">
					$ {{ $payroll->sum('total_amount') }}	   
				</div>

				<div class="col-span-3">
				  {{ Carbon\carbon::now()->format('m/d/Y') }}
			   </div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="showmodel hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
		<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
			<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

			<div class="inline-block align-bottom bg-white rounded-lg text-left text-sm overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-2/3">
				<div class="bg-cover py-5 rounded-lg shadow-2xl bg-center" style="background-image:url('https://cdn.wallpapersafari.com/13/73/AQ4CSR.jpg');">
					
						<input type="hidden" name="day_weekend" value="{{ isset($day_weekend) ? $day_weekend : '' }}">

						<div class="pr-6 flex justify-end">
							<button type="button" class="closemodel">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>

						<div class="bg-white mx-12 mt-3 p-3 rounded-xl font-bold text-gray-600 text-center">
							<div class="flex px-10">
								<div class="w-1/2 justify-start">
									<div class="text-left">Employee Name</div>
								</div>
								<div class="w-1/2">
									<div class="flex items-center justify-between">
										<div class="w-1/4 text-left">Shifts</div>
					            		<div class="w-1/4 text-right">Rates</div>
					            		<div class="w-1/4 text-right">Hours</div>
					            		<div class="w-1/4 text-right">Amount</div>	
				            		</div>
								</div>
		            		</div>
						</div>

						<div class="text-gray-600" id='details'></div>

					</form>
				</div>
			</div>
		</div>
	</div> 
</div>
@endsection

<style type="text/css">
	.active {
		color: teal;
	}
</style>
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.payrollbox').click(function() {
			$('.showmodel').show();
		});

		$('.closemodel').click(function() {
			$('.showmodel').hide();
		});

		$('.clickpayroll').click(function(){
			var day_weekend = $(this).attr('day_weekend');
			var url = "/payrolls/show/" + day_weekend; 
			
			$.ajax({
                method:"GET",
                url: url,
               
            }).done(function(data) {

            	let html = '';

            	Object.keys(data).forEach(key => {

            		let item_row = data[key];

            		html += '<div class="bg-white mx-12 mt-3 p-3 rounded-xl">';
	            		html += '<div class="flex px-10">';
	            			html += '<div class="w-1/2 justify-start">';
	            				html += '<div class="text-left">'+ key +'</div>';
	        				html += '</div>';
	            		
							html += '<div class="w-1/2">';

								let total_hours = 0;
								let total_amount = 0;

								$(item_row).each(item_key => {
									html += '<div class="flex items-center justify-between">';
										html += '<div class="w-1/4 text-left">'+ item_row[item_key]['shift_name'] +'</div>';
					            		html += '<div class="w-1/4 text-right">'+ item_row[item_key]['pay_rate'] +'</div>';
					            		html += '<div class="w-1/4 text-right">'+ item_row[item_key]['hours'] +'</div>';
					            		html += '<div class="w-1/4 text-right">'+ item_row[item_key]['total_amount'] +'</div>	';
				            		html += '</div>';

				            		total_hours+= parseFloat(item_row[item_key]['hours']);
				            		total_amount+= parseFloat(item_row[item_key]['total_amount']);
				            	});

				            	html += '<div class="flex items-center justify-between mt-5 border-t">';
									html += '<div class="w-1/4 text-left"></div>';
				            		html += '<div class="w-1/4 text-right"></div>';
				            		html += '<div class="w-1/4 text-right font-bold">'+ total_hours +' hrs</div>';
				            		html += '<div class="w-1/4 text-right font-bold">$ '+ total_amount +'</div>	';
			            		html += '</div>';
			            		
							html += '</div>';
		        		html += '</div>';
	        		html += '</div>';

				  //console.log(key); 
				  //console.log(data[key]);
				});

            	
            	
	            $('#details').html(html);
	               
            }); 
		});
		
	});


</script>
@endpush

 