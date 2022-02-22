@extends('layouts.master')

@section('content')

<div class="h-screen py-10">

    <div class="flex items-center justify-end mb-5">
        <a href="{{ route('employees.create') }}" class="bg-blue-400 py-2 px-8 text-white font-semibold font-medium rounded-full">Add Employee</a>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                   <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">

                
                @foreach($employees as $employee)
                
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $employee->name }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $employee->email }}</div>
                    <div class="text-sm text-gray-500"></div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $employee->address }}</div>
                    <div class="text-sm text-gray-500"></div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->user_role->name }}</td>
  
                 <td class="p-5 flex justify-center">
                    <a class="bg-blue-600 px-3 mr-2 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded" href="{{ route('employees.edit',$employee->id) }}">EDIT</a>

                    <form action="{{ route('employees.destroy',$employee->id) }}" method="post">


                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 px-3 py-2 border border-red-500 text-white hover:bg-red-500 rounded">DELETE</button>
                    </form>

                </td>
                </tr>

                @endforeach

                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
