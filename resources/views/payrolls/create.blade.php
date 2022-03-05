@extends('layouts.master')

@section('content')

<div class="h-screen mt-5">

	<div class="grid grid-cols-12">

		<div class="col-span-2">
			hi
		</div>

		<div class="col-span-10">
			<div class="text-gray-500 ml-5 text-sm font-semibold">
				<div class="grid grid-cols-12">
					<div class="col-span-3">PAID DATE RANGE</div>
					<div class="col-span-2">USERS</div>
					<div class="col-span-3">STATUS</div>
					<div class="col-span-2">PAID DATE</div>
					<div class="col-span-2">CREATED DATE</div>
				</div>
			</div>

			<div class="bg-white mt-5 p-5 rounded-lg">
				<div class="grid grid-cols-12">
					<div class="col-span-3">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<span class="px-2">2/28/2022 - 3/06/2022</span>	
						</div>
					</div>

					<div class="col-span-2">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
							</svg>
							<span>1</span>
					    </div>
					</div>

					<div class="col-span-3 font-semibold text-sm">
						<div class="bg-gray-200 w-28 py-1 px-2 flex gap-2 rounded-full"><span class="text-gray-500">draft</span> | <span class="text-green-500">check</span></div>
					</div>

					<div class="col-span-2">
					  3/3/2022
				   </div>

					<div class="col-span-2">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<h1 class="px-2">3/3/2022 23:45</h1>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-white mt-5 p-5 rounded-lg">
				<div class="grid grid-cols-12">
					<div class="col-span-3">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<span class="px-2">1/17/2022 - 1/23/2022</span>	
						</div>
					</div>

					<div class="col-span-2">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
							</svg>
							<span>3</span>
					    </div>
					</div>

					<div class="col-span-3 font-semibold text-sm">
						<div class="bg-gray-200 w-32 py-1 px-2 flex gap-2 rounded-full"><span class="text-gray-500">pending</span> | <span class="text-green-500">check</span></div>
					</div>

					<div class="col-span-2">
					  2/3/2022
				   </div>

					<div class="col-span-2">
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<h1 class="px-2">1/28/2022 22:50</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

		@endsection