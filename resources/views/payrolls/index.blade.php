@extends('layouts.master')

@section('content')
<div class="h-screen mt-5">
	<div class="grid grid-cols-12">
		<div class="col-span-2">
			<div class="text-sm mt-3">
				<a href="{{ route('payrolls') }}">
					RUN PAYROLL
				</a>
			</div>
			<div class="mt-5 text-sm">
				<a href="{{ route('payrolls.paidpayroll') }}" class="paid">
					PAID PAYROLL
				</a>
			</div>
		</div>
		<div class="col-span-10">
			<div class="flex items-center justify-between">
				<div class="flex items-center">
					<span class="text-slate-900 text-sm mr-5">UNPAID TIMESHEETS</span>
					@foreach($day_weekends as $day_weekend)

					<a href="{{ route('payrolls',$day_weekend) }}" class="bg-white rounded-full py-1 px-4 text-sm mx-2 {{ $day_weekend == $active_day_weekend ? 'bg-blue-700 text-white' : '' }}">
							{{ Carbon\carbon::parse($day_weekend)->format('m/d/Y') }}	

					</a>
					@endforeach

				</div>
			</div>

			<div class="bg-white mt-5 rounded-xl p-5">
			<?php 
				$total_hours = 0;
				$total_amount = 0;
			?>
			<div class="bg-white mt-3 rounded-xl p-3 grid grid-cols-12 font-bold text-gray-600">
				<div class="col-span-6 ml-16">Employee Name</div>
				<div class="col-span-6">
					<div class="grid grid-cols-12">
						<div class="col-span-4">Shifts</div>
						<div class="col-span-3">Rates</div>
						<div class="col-span-2">Hours</div>
						<div class="col-span-3 text-center">Amount</div>
					</div>
				</div>
					
			</div>	
			@foreach($timesheets as $workdays)
			<div class="bg-white mt-3 rounded-xl p-5">
				<div class="items-center">
					<div class="grid grid-cols-12">
						
						<div class="col-span-6">
							<div class="flex items-center gap-10">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
								</svg>

								<div class="text-sm font-bold">
									{{ $workdays[0]->employee_name }}
								</div>
							</div>
						</div>

						
						<div class="col-span-6">
							@foreach($workdays as $workday)
							<div class="grid grid-cols-12 tracking-wide text-sm">
								<div class="col-span-4">{{ $workday->shift_name }}</div>
								<div class="col-span-3">$ {{ $workday->pay_rate }}</div>	
								<div class="col-span-2">{{ $workday->total_hours }} hrs</div>
								<div class="col-span-3 text-center">$ {{ $workday->total_amount }}</div>
							</div>
							@endforeach

							<div class="grid grid-cols-8 mt-5">
                    	 		<div class="text-sm font-bold col-start-5 col-span-2 ml-10">{{ $total = $workdays->sum('total_hours') }} hrs</div>
                    	 		<div class="text-sm font-bold col-start-7 col-span-2 ml-8">$ {{ $amount = $workdays->sum('total_amount') }}</div>
                    	 	</div>

						</div>

					</div>
				</div>
			</div>
			<?php 
			
			 $total_hours = $total_hours + $total;
			 $total_amount = $total_amount + $amount;
			 
			 ?>  
			@endforeach
	       </div>
			<div class="bg-white p-6 rounded-xl mt-10">	
				<div class="grid grid-cols-12">
					<div class="col-span-4 text-center">
						<div class="text-lg font-semibold">{{ count($timesheets) }}</div>
						<div class="text-sm">EMPLOYEES</div>
					</div>
					<div class="col-span-4 text-center">
						<div class="text-lg font-semibold">{{ $total_hours }}</div> 
						<div class="text-sm">TOTAL HOURS</div>
					</div>
					<div class="col-span-4 px-5 text-center">
						<div class="text-lg font-semibold">$ {{ $total_amount }}</div> 
						<div class="text-sm">TOTAL AMOUNT</div>
					</div>
				</div>
				<div class="flex items-center justify-between">
					<div class="flex items-center mt-10">
						<div class="ml-28">
							<span class="m-3">Pay day</span>
							<div class="bg-teal-50 rounded-full py-1 px-5 text-sm w-40 mt-2">{{ Carbon\carbon::now()->format('m/d') }}</div>
						</div>
					</div>
					<div class="mr-24 mt-14">
						<button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full">Preview payroll</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="show_payroll hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
	    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
	        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
	        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

	        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-96">
	            <div class="px-10 py-5 bg-white rounded-lg shadow-2xl">
	            	<form action="{{ route('payrolls',$active_day_weekend) }}" method="POST">
                      @csrf
                      <input type="hidden" name="day_weekend" value="{{ $active_day_weekend }}">
                    </form>
	                <div class="flex justify-end">
	                    <button type="button" class="close-payroll">
	                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
	                        </svg>
	                    </button>
	                </div>
	                <center>
	                    <div>
	                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>   
	                    </div>
	                </center>
		            <div class="grid grid-cols-12 mt-7">
						<div class="col-span-4 text-center">
							<div class="text-lg font-semibold">{{ count($timesheets) }}</div>
							<div class="text-sm">EMPLOYEES</div>
						</div>
						<div class="col-span-4 text-center">
							<div class="text-lg font-semibold">{{ $total_hours }}</div> 
							<div class="text-sm">TOTAL HOURS</div>
						</div>
						<div class="col-span-4 px-5 text-center">
							<div class="text-lg font-semibold">$ {{ $total_amount }}</div> 
							<div class="text-sm">TOTAL</div>
						</div>
				    </div>
				    <div class="mt-7 text-center">
				    	<span class="text-xl text-slate-900 font-semibold">Are you sure</span><br>
				        <span>you want to create payroll?</span>
				    </div>
				    <div class="flex items-center mt-7 justify-center">
				    	<button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full outline-none">Create</button>
				    	<button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full outline-none mx-3 close-payroll">Cancel</button>
				    </div>				    
	            </div>
	        </div>
	    </div>
    </div> 
</div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

$(document).ready(function() {
	$('.payrollbox').click(function() {
        $('.show_payroll').show();
    });

    $('.close-payroll').click(function() {
        $('.show_payroll').hide();
    });
});

</script>

@endpush