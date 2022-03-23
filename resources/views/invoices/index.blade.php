@extends('layouts.master')

@section('content')

<div class="h-screen mt-6">
    <div class="grid grid-cols-12">
        <div class="col-span-2">
        	<div class="text-gray-500 hover:text-slate-900 hover:font-semibold text-sm mt-2">
            	<a href="">RUN INVOICES</a>
        	</div>

	        <div class="text-gray-500 hover:text-slate-900 hover:font-semibold text-sm mt-7">
	        	<a href="">DRAFT INVOICES</a>
	        </div>

	        <div class="text-gray-500 hover:text-slate-900 hover:font-semibold text-sm mt-7">
	        	<a href="">SENT INVOICES</a>
	        </div>
	    </div>    

	    <div class="col-span-10">
	    
	    	<div class="flex justify-between items-center">
	    		<div class="flex">
		    		<div class="p-1 rounded-full w-auto text-center mr-10">
		    			<span class="text-sm">NO INVOICED TIMESHEETS</span>		
		    				@foreach($day_weekends as $day_weekend)
							<a href="{{ route('invoices',$day_weekend) }}" class="bg-white rounded-full py-1 px-4 text-sm mx-2 {{ $day_weekend == $active_day_weekend ? 'bg-blue-700 text-white' : '' }}">
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
	    	@foreach($timesheets as $workdays)
	    	<div class="bg-white rounded-lg mt-3 p-5">
	    		
	    		
    			<div class="flex items-center gap-7">
    				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
					  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
					</svg>
					<div class="text-black font-semibold mx-5 text-xl">{{ $workdays[0]->client_name }}</div>	
    			</div>	
				
  
	    		<div class="grid grid-cols-12">
	    			<div class="flex col-span-6 ml-14">
		    		
		    			<div class="text-slate-500">
		    				
		    				<div class="flex items-center mx-5 mt-4 gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
								<span class="text-blue-500">Timesheet</span>
								<span>(pending)</span>
							</div>
							<div class="mx-12">A waiting for apporval sagar</div>
							<div class="text-sm text-gray-500 mx-12 mt-1">Fri 3/04 1:30 AM</div>
		    			</div>
	    			</div>

	    			<div class="col-span-6 mt-4">
	    				
	    				<div class="grid grid-cols-12">
	    					@foreach($workdays as $workday)
	    					<div class="text-slate-500 col-span-4">	
		    				     <div>{{ $workday->shift_name }}</div>
		    			    </div>

			    			<div class="text-slate-500 col-span-2">
			    				<span>$ {{ $workday->bill_rate }}</span>
			    			</div>

			    			<div class="text-slate-500 col-span-3">
			    				<span>{{ $workday->total_hours }} hrs</span>
			    			</div>

			    			<div class="text-slate-500 col-span-3">
			    				<span>$ {{ $workday->total_amount }}</span>	
		    				</div>
	    				    @endforeach
	    				   
                    	</div>
                    	<div class="grid grid-cols-8 mt-5">
                    	    <div class="text-sm font-bold col-start-5 col-span-2 ml-10">{{ $total = $workdays->sum('total_hours') }} hrs</div>
                    	    <div class="text-sm font-bold col-start-7 col-span-2 ml-8">$ {{ $amount = $workdays->sum('total_amount') }}</div>
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
            			<div class="text-3xl font-lg">{{ count($timesheets) }}</div>
            			<div class="text-md mt-2">INVOICES</div>
            		</div>
            		<div class="col-span-4 text-center">
            			<div class="text-3xl font-lg">{{ $total_hours }}</div> 
            			<div class="text-md mt-2">TOTAL HRS</div>
            		</div>
            		<div class="col-span-4 px-5 text-center">
            			<div class="text-3xl font-lg">$ {{ $total_amount }}</div> 
            			<div class="text-md mt-2">TOTAL</div>
            		</div>
            	</div>

            	<div class="flex justify-center mt-12">
	            	<button class="text-center bg-blue-600 hover:bg-blue-700 rounded-full text-white px-12 py-2 text-lg">
			         	Preview invoice
			         </button>
		         </div>

            </div>

        
	    </div>

   </div>    


</div>

@endsection