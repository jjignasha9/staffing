@extends('layouts.master')

@section('content')
<div class="h-screen mt-5">
	<div class="grid grid-cols-12">
		<div class="col-span-2">
			<div class="text-gray-500 hover:text-slate-900 hover:font-semibold text-sm mt-3">
				<a href="{{ route('payrolls') }}">
					RUN PAYROLL
				</a>
			</div>
			<div class="text-gray-500 hover:text-slate-900 hover:font-semibold mt-5 text-sm">
				<a href="{{ route('payrolls.create') }}">
					PAID PAYROLL
				</a>
			</div>
		</div>
		<div class="col-span-10 px-3">
			<div class="flex items-center justify-between">
				<div class="flex items-center">
					<span class="text-slate-900 text-sm mr-5">UNPAID TIMESHEETS</span>
					@foreach($day_weekends as $day_weekend)
					<a href="{{ route('payrolls',$day_weekend) }}" class="bg-white rounded-full py-1 px-4 text-sm mx-2 {{ $day_weekend == $active_day_weekend ? 'bg-blue-700 text-white' : '' }}">
							{{ Carbon\carbon::parse($day_weekend)->format('m/d') }}	
					</a>
					@endforeach

				</div>
			</div>
			<?php 
				$total_hours = 0;
				$total_amount = 0;
			?>
			<div class="bg-white mt-3 rounded-xl p-3 grid grid-cols-12 font-bold">
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
						<div class="text-sm">TOTAL</div>
					</div>
				</div>
				<div class="flex items-center justify-between">
					<div class="flex items-center mt-10">
						<div class="ml-28">
							<span class="m-3">Pay day</span>
							<div class="bg-slate-100 rounded-full py-1 px-5 text-sm w-40 mt-2">{{ Carbon\carbon::now()->format('m/d') }}</div>
						</div>
					</div>
					<div class="mr-24 mt-14">
						<button class="bg-blue-700 text-white py-1 px-4 rounded-full">Preview payroll</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

