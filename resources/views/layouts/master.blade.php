<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <title>Dashboard</title>
</head>

<body class="bg-stone-200">
    <!-- header section -->
    <div class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4">
                <button class="md:hidden menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 border border-gray-500 rounded mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex justify-between">

                    <div class="md:flex"  id="sidebar">
                        <a href="" class="flex font-medium hover:text-blue-600 md:mr-8 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>      
                            <span>Booking</span>
                        </a>

                        <a href="" class="flex font-medium hover:text-blue-600 md:mr-8 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>  
                            <span>Timesheet</span>
                        </a>

                        <a href="" class="flex font-medium hover:text-blue-600 md:mr-8 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Payroll</span>
                        </a>

                        <a href="" class="flex font-medium hover:text-blue-600 md:mr-8 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Invoice</span>
                        </a>
                    </div>
                    <div class="flex gap-6">

                        <button id="settings" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>

                        <button id="user" data-dropdown-toggle="dropdown" data-dropdown-placement="left" type="button" class="text-sm text-center items-center block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> 
                        </button>



                        <!-- Dropdown menu -->
                        <div id="settings_box" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 absolute mt-10 -ml-32 z-10">
                            <ul class="py-1" aria-labelledby="dropdownLeftButton">
                              <li>
                                <a href="{{ route('employees') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Employees</a>
                              </li>
                              <li>
                                <a href="{{ route('clients') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Clients</a>
                              </li>
                              <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Shfts</a>
                              </li>
                            </ul>
                        </div>
                        

                        <!-- Dropdown menu -->
                        <div id="user_box" class="hidden w-44 text-base list-none bg-white rounded divide-gray-100 shadow dark:bg-gray-700 absolute mt-10 -ml-24 z-10">
                            <ul class="py-1" aria-labelledby="dropdownLeftButton">
                              <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white capitalize"> {{ Auth::user()->name }}</a>
                              </li>
                              <li>
                                <a class="p-4 text-sm block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- header section -->


    <!-- content -->
    <div class="bg-stone-200">
        <div class="relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 h-screen">

                <div class="flex mt-5 items-center gap-2">
                    <span>
                        <a href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </a>
                    </span> 

                    @if(Request::segment(1) && Request::segment(1) != 'home') 

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <span class="text-gray-600 font-semibold">
                            <a href="{{ route(Request::segment(1)) }}" class="capitalize">
                                {{ Request::segment(1) }}
                            </a>
                        </span>

                    @endif

                    @if(Request::segment(2)) 

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>

                        <span class="text-gray-600 font-semibold">
                            @if (Request::segment(2) == 'create')
                                Add 
                            @elseif (Request::segment(2) == 'edit')
                                Update
                            @endif
                        </span>

                    @endif

                </div>
                
                
                @yield('content')

            </div>
        </div>
    </div>
    <!-- content -->



</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        
        $(".menu").click(function() {
            $("#sidebar").toggleClass("hidden");
        });

        $('#user').click(function(){
            $('#user_box').toggle();
        });

        $('#settings').click(function(){
            $('#settings_box').toggle();
        });

        $(document).click(function(event) {
            var settings = $("#settings");
            
            if (!settings.has(event.target).length) {
                $('#settings_box').hide(); 
            }

            var user = $("#user");
            if (!user.has(event.target).length) {
                $('#user_box').hide(); 
            }
        });

        // when delete any record
        $(".delete").click(function(){

            let token = $(this).attr('token');
            let url = $(this).attr('route') + $(this).attr('id');

            swal({
              title: "Are you sure?", 
              text: "You want to delete this record.", 
              type: "warning",
              confirmButtonText: "Yes, Delete It!",
              showCancelButton: true
            })
            .then((result) => {
              if (result.value) {

                  $.ajax({
                    method: "POST",
                    url: url,
                    data: { 
                      "_token": token, 
                      "_method": 'DELETE' 
                    }
                  }).done(function( response ) {

                    swal(
                      'Success', 
                      response.message, 
                      'success'
                    ).then((result) => {
                      if (result.value) {
                        window.location.reload();
                      }
                    });

                  });
                
              } else if (result.dismiss === 'cancel') {    
                swal(
                  'Cancelled',
                  'Your data is safe :)',
                  'error'
                )
              }
            })
        });

    });
</script>

@if(session()->has('message'))

    <script type="text/javascript">

      $(document).ready(function(){

      let msg = "{{ session()->get('message') }}";
        swal('Success', msg, 'success');
      });
    </script>

@endif

@stack('scripts')