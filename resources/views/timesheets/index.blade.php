@extends('layouts.master')

@section('content')

<div class="h-screen mt-10">

    <div class="flex items-center justify-end mb-5">
        <a href="{{ route('timesheets.create') }}" class="bg-blue-400 py-2 px-8 text-white font-semibold font-medium rounded-full hover:bg-blue-600">Add</a>
    </div>
</div>

@endsection