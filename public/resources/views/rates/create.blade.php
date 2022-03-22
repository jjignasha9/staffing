
@extends('layouts.master')

@section('content')
<div class="p-10 mt-5 bg-white rounded-lg">
	<form action="{{ route('rates.store') }}" method="POST">
    	@csrf

 
	    <div class="font-bold">
	    	<label class="ml-5 text-gray-600">Client Name</label>
	    	<select name="client_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 rounded-full pl-5">
	    		@foreach ($clients as $client)
                <option  value="{{ $client->id }}" >{{ $client->name }}</option>
                @endforeach
	    	</select>
	    	@error('client_id')
	    	   <div class="text-red-700 ml-5 mb-1 font-medium">{{ $message }}</div>
	    	@enderror
	    </div>

	    <div class="mt-5 font-bold">
	    	<label class="ml-5 text-gray-600">Employee Name</label>
	    	<select name="employee_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 rounded-full pl-5">
	    		@foreach ($employees as $employee)
                <option  value="{{ $employee->id }}" >{{ $employee->name }}</option>
                @endforeach
	    	</select>
	    	@error('employee_id')
	    	   <div class="text-red-700 ml-5 mb-1 font-medium">{{ $message }}</div>
	    	@enderror
	    </div>

	    <div class="mt-5 font-bold">
	    	<label class="ml-5 text-gray-600">Shift Name</label>
	    	<select name="shift_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 rounded-full pl-5">
	    		@foreach ($shifts as $shift)
                <option  value="{{ $shift->id }}" >{{ $shift->name }}</option>
                @endforeach
	    	</select>
	    	@error('shift_id')
	    	   <div class="text-red-700 ml-5 mb-1 font-medium">{{ $message }}</div>
	    	@enderror
	    </div>

	    <div class="mt-5 font-bold">
	    	<label class="ml-5 text-gray-600">Pay Rate</label>
	    	<input type="text" name="payrate" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 rounded-full pl-5">
	    	@error('payrate')
	    	   <div class="text-red-700 ml-5 mb-1 font-medium">{{ $message }}</div>
	    	@enderror
	    </div>

	    
	    <div class="mt-5 font-bold">
	    	<label class="ml-5 text-gray-600">Bill Rate</label>
	    	<input type="text" name="billrate" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 rounded-full pl-5">
	    	@error('billrate')
	    	   <div class="text-red-700 ml-5 mb-1 font-medium">{{ $message }}</div>
	    	@enderror
	    </div>

	    <div class="mt-10 ml-2">
    	    <a href="{{ route('rates') }}" class="bg-white border-2 border-black py-2 px-8 text-black font-semibold font-medium rounded-full hover:bg-black hover:text-white mr-5">Cancel</a> 
    
           	<button class="bg-blue-400 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-700">Submit</button>
        </div>
    </form>
  </div>
@endsection
