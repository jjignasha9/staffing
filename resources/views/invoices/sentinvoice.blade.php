@extends('layouts.master')

@section('content')

<div class="h-screen mt-6">
    
 <div class="grid grid-cols-12">
	 <div class="col-span-2 text-gray-500 font-semibold">
		<div class="text-sm mt-5">
				<a href="{{ route('invoices') }}">
					RUN INVOICES
				</a>
			</div>
			<div class="text-sm mt-5">
				<a href="{{ route('invoices.draft-invoice') }}">
					DRAFT INVOICES
					
				</a>
			</div>
			<div class="text-sm mt-5">
				<a href="{{ route('invoices.sent-invoice') }}" class="{{ (request()->segment(2) == 'sent-invoice') ? 'active' : '' }}">
					SENT INVOICES
				</a>
			</div>
	    </div>      

	    <div class="col-span-10">
		<div class="flex justify-between items-center">
			<div class="flex">
				@foreach($day_weekends as $day_weekend)
				<div class="bg-white rounded-full py-1 px-4 text-sm mx-2 {{ $day_weekend == $active_day_weekend ? 'bg-teal-700 text-white' : '' }}">
					<span class="text-sm">{{ Carbon\carbon::parse($day_weekend)->format('m/d/Y') }}</span>
				</div>
				@endforeach
			</div>
		</div>    

		<div class="bg-white mt-5 rounded-full px-5 py-1.5">
			<div class="grid grid-cols-12">
				<div class="text-sm text-slate-500 col-span-5">CLIENT</div>
				<div class="text-sm text-slate-500 col-span-3">BILL DATE</div>
				<div class="text-sm text-slate-500 col-span-2">AMOUNT</div>
				<div class="text-sm text-slate-500 col-span-2">STATUS</div>
			</div>
		</div>  
        <?php 
			$total_amount = 0;
		?>
        @foreach($sentdata_invoices as $sentdata_invoice)
		<div class="bg-white rounded-lg mt-3 p-5">
			<div class="grid grid-cols-12">
				<div class="text-sm text-slate-500 col-span-5">
					<div class="text-black font-semibold">{{ $sentdata_invoice->client_name }}</div>
					<div class="text-sm">{{ $sentdata_invoice->id }}</div>
					<div class="text-sm">{{ $sentdata_invoice->employee_name }}</div>
				</div>

				<div class="text-sm text-slate-500 col-span-3">
					<span>{{ Carbon\carbon::parse($sentdata_invoice->bill_date)->format('m/d/Y') }}</span>
				</div>
				<div class="text-sm text-slate-500 col-span-2">
					<span>$ {{ $amount = $sentdata_invoice->total_amount }}</span>
				</div>

				<div class="text-sm text-slate-400 col-span-2 hover:text-teal-600">
					<button class="flex border border-teal-600 w-32 rounded-full font-bold p-2">
						<div><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg></div>
						<div class="ml-2">{{ $sentdata_invoice->status_name }}</div>
						</button>
				</div>
			</div>
		</div>

		<?php

			$total_amount = $total_amount + $amount;
	    ?>

		@endforeach

		<div class="bg-white rounded-lg mt-3 p-5 text-center">
			<div class="flex grid grid-cols-12 items-center">
				<div class="text-sm text-slate-500 col-span-4">
					<div class="text-2xl text-black font-semibold">{{ count($sentdata_invoices) }}</div>
					<div>INVOICES</div>
				</div>

				<div class="text-sm text-slate-500 col-span-4">
					<div class="text-2xl text-black font-semibold">$ {{ $total_amount }}</div>
					<div>TOTAL</div>
				</div>

				<div class="text-sm text-slate-500 col-span-4">
					<button class="bg-teal-600 p-2 text-white rounded-full w-48 ml-10 hover:bg-teal-700">Resend invoices</button>
				</div>
			</div>
		</div>
	    </div>

   </div> 

</div>

@endsection


@push('scripts')
<style type="text/css">
	.active {
		color: teal;
	}
</style>
@endpush