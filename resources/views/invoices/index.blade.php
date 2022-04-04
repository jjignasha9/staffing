@extends('layouts.master')

@section('content')

<div class="h-screen mt-6">
    <div class="grid grid-cols-12">
        <div class="col-span-2 text-gray-500 font-semibold">
        	<div class="text-sm mt-5">
				<a href="{{ route('invoices') }}" class="active {{ (request()->segment(2) == 'invoices') ? 'active' : '' }}">
					RUN INVOICES
				</a>
			</div>
			<div class="text-sm mt-5">
				<a href="{{ route('invoices.draft-invoice') }}">
					DRAFT INVOICES
				</a>
			</div>
			<div class="text-sm mt-5">
				<a href="{{ route('invoices.sent-invoice') }}">
					SENT INVOICES
				</a>
			</div>
	    </div>    

	    <div class="col-span-10">
	    
	    	<div class="flex justify-between items-center">
	    		<div class="flex">
		    		<div class="p-1 rounded-full w-auto text-center mr-10">
		    			<span class="text-sm">NO INVOICED TIMESHEETS</span>		
		    				@foreach($day_weekends as $day_weekend)
							<a href="{{ route('invoices',$day_weekend) }}" class="bg-white rounded-full py-1 px-4 text-sm mx-2 {{ $day_weekend == $active_day_weekend ? 'bg-teal-700 text-white' : '' }}">
									{{ Carbon\carbon::parse($day_weekend)->format('m/d/Y') }}	
							</a>
					        @endforeach
					    </span>
		    		</div>
	    		</div>
	    	</div>
	    	<?php 
				  $total_hours = 0;
				  $total_amount = 0;
			?>
			<div class="bg-white mt-3 p-3 rounded-xl grid grid-cols-12 font-bold text-gray-600">
				<div class="col-span-6 ml-16">Client Name</div>
				<div class="col-span-6">
					<div class="grid grid-cols-12">
						<div class="col-span-4">Shifts</div>
						<div class="col-span-2">Rates</div>
						<div class="col-span-3">Hours</div>
						<div class="col-span-3">Amount</div>
					</div>
				</div>
			</div>

	    	@foreach($timesheets as $workdays)
	    	<div class="bg-white rounded-lg mt-3 p-5">	    
	    		<div class="grid grid-cols-12">
	    			<div class="col-span-6">
						<div class="flex items-center gap-10">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
							</svg>

							<div class="text-sm font-bold">
								{{ $workdays[0]->client_name }}
							</div>
						</div>
					</div>

	    			<div class="col-span-6 text-sm">
	    				
	    				<div class="grid grid-cols-12">
	    					@foreach($workdays as $workday)
	    					<div class="col-span-4">	
		    				     <div>{{ $workday->shift_name }}</div>
		    			    </div>

			    			<div class="col-span-2">
			    				<span>$ {{ $workday->bill_rate }}</span>
			    			</div>

			    			<div class="col-span-3">
			    				<span>{{ $workday->total_hours }} hrs</span>
			    			</div>

			    			<div class="col-span-3">
			    				<span>$ {{ $workday->total_amount }}</span>	
		    				</div>
	    				    @endforeach
	    				   
                    	</div>
                    	<div class="grid grid-cols-8 mt-5">
                    	    <div class="text-sm font-bold col-start-5 col-span-2">{{ $total = $workdays->sum('total_hours') }} hrs</div>
                    	    <div class="text-sm font-bold col-start-7 col-span-2">$ {{ $amount = $workdays->sum('total_amount') }}</div>
                    	</div>
                    </div>		
	    		</div>
	    	</div>
	    	<?php 
			
			 $total_hours = $total_hours + $total;
			 $total_amount = $total_amount + $amount;
			 
			 ?>  
	    	@endforeach


	    	<div class="bg-white p-6 rounded-xl mt-3">	
            	<div class="grid grid-cols-12">
            		<div class="col-span-4 text-center">
            			<div class="text-lg font-semibold">{{ count($timesheets) }}</div>
            			<div class="text-sm">INVOICES</div>
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

            	<div class="flex justify-center mt-12">
	            	<button class="invoicebox text-center bg-teal-600 hover:bg-teal-700 rounded-full text-white px-12 py-2 text-lg">
			         	Preview invoice
			         </button>
		         </div>

            </div>
	    </div>

	    <div class="show_invoice hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
			<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

				<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-96">
					<div class="py-5 bg-white rounded-lg shadow-2xl">
						<form action="{{ route('invoices.store') }}" method="POST">
							@csrf
							<input type="hidden" name="day_weekend" value="{{ $active_day_weekend }}">
						
						<div class="pr-6 flex justify-end">
							<button type="button" class="close_invoice">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
						<center>
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"  stroke-width="2">
	                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
	                            </svg>  
							</div>
						</center>
						<div class="grid grid-cols-12 mt-7">
							<div class="col-span-4 text-center">
								<div class="text-lg font-semibold">{{ count($timesheets) }}</div>
								<div class="text-sm">INVOICES</div>
							</div>
							<div class="col-span-4 text-center">
								<div class="text-lg font-semibold">{{ $total_hours }}</div> 
								<div class="text-sm">TOTAL HOURS</div>
							</div>
							<div class="col-span-4 text-center">
								<div class="text-lg font-semibold">$ {{ $total_amount }}</div> 
								<div class="text-sm">TOTAL AMOUNT</div>
							</div>
						</div>
						<div class="mt-7 text-center">
							<span class="text-xl text-slate-900 font-semibold">Are you sure</span><br>
							<span>you want to create invoice?</span>
						</div>
						<div class="flex items-center mt-7 justify-center">
							<button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full outline-none">Create</button>
							<button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-4 rounded-full outline-none mx-3 close_invoice">Cancel</button>
						</div>		
						</form>		    
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
		$('.invoicebox').click(function() {
			$('.show_invoice').show();
		});

		$('.close_invoice').click(function() {
			$('.show_invoice').hide();
		});
	});

</script>
@endpush
<style type="text/css">
	.active {
		color: teal;
	}
</style>