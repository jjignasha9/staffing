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

				<div class="text-blue-500 font-semibold text-xl cursor-pointer">
					<svg class="h-8 w-8 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
					</svg>
				</div>
			</div>

		</div>
		<div class="grid grid-cols-12 px-7 py-3">

			<div class="col-span-3">
				<div class="px-3">
					<button type="submit" class="text-white mb-5 bg-teal-600 rounded-full px-16 text-sm mx-5 py-1 hover:bg-teal-700">Resend invoice</button>	
					<hr class="border-2 rounded-full">
					<div class="py-5 flex items-center">
						<span class="font-semibold text-sm">Status</span>

						<select class="px-5 py-1 rounded-full w-full py-1 ml-6">
							<option>sent</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<hr class="border-2 rounded-full">

					<div class="mt-5 text-sm">
						<div class="flex justify-between my-2">
							<div class="font-semibold">Total</div>
							<div class="text-gray-500">$ 480.00</div>
						</div>
						<div class="flex justify-between my-2">
							<div class="font-semibold">Created at</div>
							<div class="text-gray-500">3/2/2022</div>
						</div>
						<div class="flex justify-between my-2">
							<div class="font-semibold">Sent at</div>
							<div class="text-gray-500">3/2/2022</div>
						</div>
						<div class="flex justify-between my-2">
							<div class="font-semibold">Last updated at</div>
							<div class="text-gray-500">15 hours ago</div>
						</div>

					</div>
					<hr>
					<div class="flex items-center gap-2 mt-5">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
						<div class="text-gray-500">Integrated Quickbooks</div>
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
					<span>Invoice #</span><span class="text-slate-400">2292</span>
				</div>

				<div class="grid grid-cols-12 mt-5 text-sm">
					<div class="col-span-6 pr-6">
						<span class="font-semibold"> Bill from</span>
						<div class="mt-3">
							<span class="font-semibold">Avenue A Staffing, Inc.</span>
						</div>
						<div class="mt-2 text-gray-600">
							<span>30 3rd Street, floor 1</span><br>
							<span>Troy, NY 12180 US</span><br>
							<span>(212) 796-6930</span><br>
							<span>Mario@AvenueAstaffing.com</span><br>
							<span>www.AvenueAstaffing.com</span>
						</div>
						<div class="text-gray-500 font-semibold mt-7">
							<span class="ml-3">Bill date</span>
							<div class="bg-white rounded-full w-full px-3 py-2 my-2">
								3/6/2022
							</div>
						</div>
						<div class="text-gray-500 font-semibold mt-9">
							Terms<br>
							<span>Net 30</span>
						</div>
					</div>

					<div class="col-span-6">
						<div class="text-gray-500 font-semibold">
							<span class="ml-3">Bill to</span>
							<div class="bg-white rounded-full w-full px-3 py-2 my-2">
								ray80@example.org
							</div>
							<div>
								<span class="ml-3">Address</span>
								<textarea type="text" name="Address" placeholder="you can comment here" class="outline-none font-semibold mt-2 w-full px-3 py-1 border border-gray-400 rounded-lg" id="comment"></textarea>
							</div>
							<div class="mt-8">
								<span class="ml-3">Due date</span>
								<div class="bg-white rounded-full w-full px-3 py-2 my-2">
									4/5/2022
								</div>
							</div>
							<div class="mt-8">
								<span class="ml-3">Weekending date</span>
								<div class="bg-white rounded-full w-full px-3 py-2 my-2">
									3/6/2022
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<table class="min-w-full divide-y divide-gray-200 shadow-md mt-6">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">EMPLOYEE</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">QTY</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RATE</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TOTAL</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">

							<tr>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm font-medium text-gray-900">Alivia Yundt</div>
									<div class="text-sm font-medium text-gray-900">1 Shift</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">24</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">$ 20.00</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">$ 480.00</div>
								</td>
							</tr>
						</tbody>
					</table>

				</div>

				<div class="grid grid-cols-12 mb-12">
					<div class="col-span-6 pt-7">
						<div>
							<span class="ml-3 text-gray-500 text-sm font-semibold">Remittence</span>
							<textarea type="text" name="Remittence" placeholder="Remittence" class="outline-none font-semibold mt-2 w-full px-3 py-1 border border-gray-400 rounded-lg" id="comment"></textarea>
						</div>
					</div>
					<div class="col-span-6">
						<div class="flex justify-between pt-14 ml-3 font-semibold">
							<div class="text-sm">
								Total
							</div>
							<div>
								$ 480
							</div>
						</div>
					</div>
					
				</div>

			</div>

		</div>
	</div>
</div>

@endsection