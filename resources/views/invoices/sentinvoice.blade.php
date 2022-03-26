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
				<div class="bg-white p-1 rounded-full w-32 text-center mr-10 shadow">
					<span class="text-sm">3/6/2022(1)</span>
				</div>
				<div class=" p-1 rounded-full w-28 text-center">
					<span class="text-sm">3/6/2022(2)</span>
				</div>
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

		<div class="bg-white rounded-lg mt-3 p-5">
			<div class="grid grid-cols-12">
				<div class="text-sm text-slate-500 col-span-5">
					<div class="text-black font-semibold">Kuhic-Jaskolski</div>
					<div class="text-sm">#9222</div>
					<div class="text-sm">Alivia Yundt</div>
				</div>

				<div class="text-sm text-slate-500 col-span-2">
					<span>$ 480</span>
				</div>

				<div class="text-sm text-slate-400 col-span-2 hover:text-teal-600">
					<button class="flex border border-teal-600 w-32 rounded-full font-bold p-2">
						<div><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg></div>
						<div class="ml-2">Send</div>
						</button>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-lg mt-3 p-5 text-center">
			<div class="flex grid grid-cols-12 items-center">
				<div class="text-sm text-slate-500 col-span-4">
					<div class="text-2xl text-black font-semibold">1</div>
					<div>INVOIVES</div>
				</div>

				<div class="text-sm text-slate-500 col-span-4">
					<div class="text-2xl text-black font-semibold">$ 480.00</div>
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