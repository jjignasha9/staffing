@extends('layouts.master')

@section('content')
<div class="pt-10">
	<div class="mt-5">
        <a href="{{ route('employees.index') }}" class="bg-blue-400 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-700">Back</a> 
    	</div>
    	<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    	@csrf  
	  <div class="mt-5 font-bold">
	    	<label>Name</label><br>
	    	<input type="text" name="name" placeholder="Name" value="{{ $employee->name }}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
	    	@error('name')
	    	   <div class="text-red-700 mb-1 p-3">{{ $message }}</div>
	    	@enderror
	    </div>

	    <div class="mt-5 font-bold">
	    	<label>Email</label><br>
	    	<input type="text" name="email" placeholder="email" value="{{ $employee->email }}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
	    	@error('email')
	    	   <div class="text-red-700 mb-1 p-3">{{ $message }}</div>
	    	@enderror
	    </div>

        <div class="mt-5 font-bold">
	    	<label>Address</label><br>
	    	<input type="text" name="address" placeholder="address" value="{{ $employee->address }}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
	    	@error('address')
	    	   <div class="text-red-700 mb-1 p-3">{{ $message }}</div>
	    	@enderror
	    </div>

        <div class="mt-5 font-bold">
	    	<label>Password</label><br>
	    	<input type="password" name="password" placeholder="password" value="{{ $employee->password }}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
	    	@error('password')
	    	   <div class="text-red-700 mb-1 p-3">{{ $message }}</div>
	    	@enderror
	    </div>
  
	    <div class="mt-5">
           <button class="bg-blue-400 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-700">Update</button> 
         </div>
    </form>
</div>
@endsection