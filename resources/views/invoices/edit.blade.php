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
		    		</div>
		    		<div class="bg-white p-1 rounded-full w-28 text-center">
		    			<span class="text-sm">3/6/2022(2)</span>
		    		</div>
	    		</div>
	    		<div class="p-1 rounded-full text-center">
	    			<button class="p-1 border-2 border-black rounded-full text-sm hover:text-white hover:bg-black w-32">OTHER W/D</button>
	    		</div>
	    	</div>

	    	<div class="bg-white rounded-lg mt-3 p-5">
	    		<div class="grid grid-cols-12">
	    			<div class="col-span-6 flex items-center gap-7">
	    				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
						</svg>
						<div class="text-black font-semibold mx-5 text-xl">Kuhic-Jaskolski</div>	
	    			</div>
					<div class="col-span-6">BIDEN SHIFT</div>
				</div>
  
	    		<div class="grid grid-cols-12">
	    			<div class="flex col-span-6 ml-14">
		    		
		    			<div class="text-slate-500">
		    				
		    				<div class="flex items-center mx-5 mt-4 gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
								<span class="text-teal-600">Timesheet</span>
								<span>(pending)</span>
							</div>
							<div class="mx-12">A waiting for apporval sagar</div>
							<div class="text-sm text-gray-500 mx-12 mt-1">Fri 3/04 1:30 AM</div>
		    			</div>
	    			</div>
	    			<div class="col-span-6 mt-4">
	    				<div class="grid grid-cols-12">
	    					<div class="text-slate-500 col-span-4">	
		    				<div>hourly<sup>1st</sup></div>
		    			</div>

		    			<div class="text-slate-500 col-span-2">
		    				<span>$ 56</span>
		    			</div>

		    			<div class="text-slate-500 col-span-3">
		    				<span>32 Hrs</span>
		    				<div class="font-bold text-black text-lg mt-5">32 Hrs</div>
		    			</div>

		    			<div class="text-slate-500 col-span-3">
		    				<span>$ 1,792.00</span>
		    				<div class="font-bold text-black text-lg mt-5">$ 1,792.00</div>
		    			</div>
	    				</div>
		    			
	    			</div>
	    			
	    		</div>
	 
	    	</div>

	    	<div class="bg-white p-6 rounded-xl mt-3">	
            	<div class="grid grid-cols-12">
            		<div class="col-span-4 text-center">
            			<div class="text-3xl font-lg">1</div>
            			<div class="text-md mt-2">INVOICES</div>
            		</div>
            		<div class="col-span-4 text-center">
            			<div class="text-3xl font-lg">32 hrs</div> 
            			<div class="text-md mt-2">TOTAL HRS</div>
            		</div>
            		<div class="col-span-4 px-5 text-center">
            			<div class="text-3xl font-lg">$ 1,792.00</div> 
            			<div class="text-md mt-2">TOTAL AMOUNT</div>
            		</div>
            	</div>

            	<div class="flex justify-center mt-12">
	            	<button class="text-center bg-teal-600 hover:bg-teal-700 rounded-full text-white px-12 py-2 text-lg">
			         	Preview invoice
			         </button>
		         </div>

         </div>

        
	    </div>

   </div>   


</div>

@endsection