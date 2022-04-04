@extends('layouts.master')

@section('content')

<div class="h-screen mt-6">

	<div class="bg-zinc-50 h-auto shadow-md rounded-lg">
		<div class="py-5 px-10">
			<div class="flex justify-between items-center">
				<div class="text-teal-600 font-semibold text-xl flex justify-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
					</svg>
					Invoices
				</div>

				<a href="{{ route('invoices.show-pdf', $invoice->id) }}" target="_blank" class="text-blue-500 font-semibold text-xl cursor-pointer"> <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round"
					stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/> </svg>
				</a>
				@foreach($invoice_detail as $invoice)
				<div class="grid grid-cols-12 px-7 py-3">

					<div class="col-span-3">
						<div class="px-3">
							<button type="submit" class="text-white mb-5 bg-teal-600 rounded-full px-16 text-sm mx-5 py-1 hover:bg-teal-700">Resend invoice</button>	
							<hr class="border-2 rounded-full">
							<div class="flex justify-between my-5">
								<span class="font-semibold">Status</span>
								<div class="text-gray-500">{{ $invoice->status_name }}</div>
							</div>
							<hr class="border-2 rounded-full">

							<div class="mt-5 text-sm">
								<div class="flex justify-between my-2">
									<div class="font-semibold">Total</div>
									<div class="text-gray-500">$ {{ $invoice->total_amount }}</div>
								</div>
								<div class="flex justify-between my-2">
									<div class="font-semibold">Created at</div>
									<div class="text-gray-500">{{ Carbon\carbon::parse($invoice->day_weekend)->format('m/d/Y') }}</div>
								</div>
								<div class="flex justify-between my-2">
									<div class="font-semibold">Sent at</div>
									<div class="text-gray-500"></div>
								</div>
								<div class="flex justify-between my-2">
									<div class="font-semibold">Last updated at</div>
									<div class="text-gray-500"></div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-span-9 bg-stone-100 px-6">
						<div class="flex justify-center">
							<button class="bg-white rounded-full -m-5 p-4 shadow-md">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
								</svg>
							</button>
						</div>
						<div class="text-center mt-7 font-semibold text-lg">
							<span>Invoice #</span><span class="text-slate-400">{{ $invoice->id }}</span>
						</div>

						<div class="grid grid-cols-12 mt-5 text-sm">
							<div class="col-span-6 pr-6">
								<span class="font-semibold">Bill from</span>
								<div class="mt-3">
									<span class="font-semibold">timesheet</span>
								</div>
								<div class="mt-2 text-gray-600">
									<span>30 3rd Street, floor 1</span><br>
									<span>Troy, NY 12180 US</span><br>
									<span>(212) 796-6930</span>
								</div>
								<div class="text-gray-500 font-semibold mt-7">
									<span class="ml-3">Bill date</span>
									<div class="bg-white rounded-full w-full px-3 py-2 my-2">
										{{ Carbon\carbon::parse($invoice->bill_date)->format('m/d/Y') }}
									</div>
								</div>
								<div class="text-gray-500 font-semibold mt-9">
									Terms<br>
									<span>{{ $invoice->term_name }}</span>
								</div>
							</div>

							<div class="col-span-6">
								<div class="text-gray-500 font-semibold">
									<span class="ml-3">Bill to</span>
									<div class="bg-white rounded-full w-full px-3 py-2 my-2">
										{{ $invoice->client_email}}
									</div>
									<div>
										<span class="ml-3">Address</span>
										<textarea type="text" name="Address" placeholder="you can comment here" class="outline-none font-semibold mt-2 w-full px-3 py-1 border border-gray-400 rounded-lg" id="comment">{{ $invoice->client_address}}</textarea>
									</div>
									<div class="mt-8">
										<span class="ml-3">Due date</span>
										<div class="bg-white rounded-full w-full px-3 py-2 my-2">
											{{ Carbon\carbon::parse($invoice->due_date)->format('m/d/Y') }}
										</div>
									</div>
									<div class="mt-8">
										<span class="ml-3">Weekending date</span>
										<div class="bg-white rounded-full w-full px-3 py-2 my-2">
											{{ Carbon\carbon::parse($invoice->day_weekend)->format('m/d/Y') }}
										</div>
									</div>
								</div>
							</div>
						</div>


						@foreach($invoice_items as $employee_name => $invoice_data)
						<div class="bg-white mt-3 py-3 rounded-xl text-center">
							<div class="flex px-10 font-bold">
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
							<div class="flex px-10 mt-5">
								<div class="w-1/2 justify-start">
									<div class="text-left">{{ $employee_name }}</div>
								</div>
								<div class="w-1/2">
									@foreach($invoice_data as $invoice_item)
									<div class="flex items-center justify-between">
										<div class="w-1/4 text-left">{{ $invoice_item->shift_name }}</div>
										<div class="w-1/4 text-right">{{ $invoice_item->bill_rate }}</div>
										<div class="w-1/4 text-right">{{ $invoice_item->hours }}</div>
										<div class="w-1/4 text-right">{{ $invoice_item->amount }}</div>	
									</div>
									@endforeach
								</div>
							</div>

						</div>
						@endforeach


						<div class="mb-12">
							<div class="pt-14 ml-3 font-bold flex items-center">
								<div class="text-sm mr-28 ">
									Total
								</div>
								<div>
									$ {{ $invoice->total_amount }}

								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach	
			</div>

		</div>
	</div>
</div>
	

@endsection