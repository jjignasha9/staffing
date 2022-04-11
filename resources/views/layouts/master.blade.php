<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

    @stack('css')

    <title>Dashboard</title>
</head>

<body class="bg-cover" style="background-image: url('https://cdn.wallpapersafari.com/13/73/AQ4CSR.jpg');">
    <!-- header section -->
    <div class="relative bg-teal-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="">
                <button class="md:hidden menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 border border-gray-500 rounded mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex justify-between text-white">
                    <div class="md:flex py-6"  id="sidebar">
                        @if(Auth::user()->role != '2' &&  Auth::user()->role != '4')
                            <a href="{{ route('bookings') }}" class="flex font-medium hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>      
                                <span>Booking</span>
                            </a>

                            <a href="{{ route('timesheets') }}" class="flex font-medium hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>  
                                <span>Timesheet</span>
                            </a>

                            <a href="{{ route('payrolls') }}" class="flex font-medium hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Payroll</span>
                            </a>

                            <a href="{{ route('invoices') }}" class="flex font-medium hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Invoice</span>
                            </a>
                        @elseif(Auth::user()->role == '2' )
                            <a href="{{ route('timesheets.create') }}" class="flex font-medium hover: hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>  
                                <span>Timesheet</span>
                            </a>
                        @else
                            <a href="{{ route('timesheets') }}" class="flex font-medium hover: hover:text-gray-200 mr-9">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>  
                                <span>Timesheet</span>
                            </a>
                        @endif
                    </div>

                    <div class="flex gap-6">
                        
                        @if(Auth::user()->role != '2' &&  Auth::user()->role != '4')
                            <button id="settings" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        @endif

                        <button id="user" data-dropdown-toggle="dropdown" data-dropdown-placement="left" type="button" class="text-sm text-center items-center block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> 
                        </button>
                        
                    </div>

                    <!-- Dropdown menu -->
                    <div id="settings_box" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-zinc-100 shadow dark:bg-gray-700 absolute mt-16 right-0 mr-28 z-10">
                        <ul class="py-1" aria-labelledby="dropdownLeftButton">
                          <li>
                            <a href="{{ route('employees') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Employees</a>
                          </li>
                          <li>
                            <a href="{{ route('clients') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Clients</a>
                          </li>
                          <li>
                            <a href="{{ route('shifts') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Shifts</a>
                          </li>
                          <li>
                            <a href="{{ route('rates') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Rates</a>
                          </li>
                            <li>
                            <a href="{{ route('invites') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Invite User</a>
                          </li>
                            <li>
                            <a href="{{ route('holidays') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Holidays</a>
                          </li>
                        </ul>
                    </div>
                    

                    <!-- Dropdown menu -->
                    <div id="user_box" class="hidden w-44 text-base list-none bg-white rounded divide-gray-100 shadow dark:bg-gray-700 absolute mt-16 right-0 mr-16 z-10">
                        <ul class="py-1" aria-labelledby="dropdownLeftButton">
                          <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white capitalize">{{ Auth::user()->name }}</a>
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

    <!-- header section -->


    <!-- content -->
    <div class="bg-cover" style="background-image: url('https://cdn.wallpapersafari.com/13/73/AQ4CSR.jpg');">
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
                            @elseif (Request::segment(2) == 'show')
                                Show
                            @elseif (Request::segment(2) == 'approved')
                                Approve
                            @elseif (Request::segment(2) == 'paid-payroll')
                                Paid payroll
                                @elseif (Request::segment(2) == 'draft-invoice')
                                Draft invoice
                                @elseif (Request::segment(2) == 'sent-invoice')
                                Sent invoice
                            @endif
                        </span>

                    @endif

                </div>
                
                
                @yield('content')
               
            </div>

        </div>
        <button class="bg-white fixed right-1 bottom-1 p-4 m-5 rounded-full shadow-lg outline-none chatbutton">
           
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>   
        </button> 
        <div class="chatmessege fixed right-4 bottom-14"></div>
        <div id="chatbox" class="hidden fixed right-0 bottom-24 w-80 text-base max-h-screen  list-none bg-white rounded-lg shadow dark:bg-gray-700 mr-2" >
            <div class="flex justify-between items-center">
                <div class="flex items-center p-3 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="mx-2">Messenger</span>
                </div>
                <div class="p-3 mt-2">
                    <button type="button" id="closebox">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-3">
                <input type="text" name="search" id="search" placeholder="search" class="bg-gray-100 rounded-full py-1 px-4 w-full" autocomplete="off">
            </div>
           
            <div class="px-3 py-2 flex-col items-center h-full chatdetails"></div>
          
        </div>

        <div id="message" class="offset-0 h-96 hidden fixed right-0 bottom-24 w-80 text-base list-none bg-white rounded-lg shadow dark:bg-gray-700 mr-2">

            <div class="flex justify-between items-center px-4 py-2 shadow-lg">
                <div class="flex items-center ">
                    <div id="back" class="flex items-center cursor-pointer">
                        <button>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <div id="message-user-name"></div>
                    </div>
                    <input type="hidden" name="user-id" id="message-user-id">
                </div>
            </div>

            
            <div class="px-4 py-2 overflow-y-auto" style="height: 288px;" id="messages">
               
            </div>
                      
            <div class="flex items-center">
                <div class="px-2">
                     <textarea name="text" placeholder="Type something here...." row="1" class="bg-slate-100 outline-none w-60 rounded-lg px-1 " id="message-text"></textarea>
                </div>
                <div class="p-2">
                    <button type="button" class="bg-teal-600 p-2 text-white rounded-full" id="send-message">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                       </svg>
                   </button>
                </div>
            </div>   
       </div>
    </div>
   
    <!-- content -->

    

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {


        var login_user_id = "{{ Auth::user()->id }}";
        var temp = [];
        var chatInterval = null;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
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


         $('#closebox').click(function(){
            $('#chatbox').hide();
            clearInterval(chatInterval); // stop the interval
            $('#message-user-id').val('');
        });

        $('#back').click(function(){

            $('#message').hide();
            $('#chatbox').show();
            clearInterval(chatInterval); // stop the interval

            var user_id = $('#message-user-id').val();
            $('.indicator-' + user_id).hide();

            $('#message-user-id').val('');

        });

        if($('chatbox').hide()) {

            var url = "/chats"; 
            let count = 0;

           $.ajax({
                method:"GET",
                url: url,
               
            }).done(function(data) {

            
                let html = '';
               
                var users = data.users;
                var indicateUsers = data.indicate_users;

                Object.keys(users).forEach(key => {

                    if (indicateUsers.includes(users[key]['id'])) {

                        count++;  
                         playAudio();
                        console.log(count);
                    }

                });

                if(count != 0) {
                    html += '<span class="bg-teal-500 rounded-full py-1 px-2 text-white indicator-'+ users['id'] +'">'+ count +'</span>';
                     
                }               

                $('.chatmessege').html(html);

                
            }); 

       
        }
    
      
        function playAudio() {
            
            var x = new Audio("{{ route('chats.notification-sound') }}");
          
            var playPromise = x.play();

            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    x.play();
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }

        $('.chatbutton').click(function() {

            $('#chatbox').show();

            chatlist();
            
            
        });

         $('#search').keyup(function(){

            var keyword = $(this).val();

            chatlist(keyword);
                
        });

       
        function chatlist(keyword = '') {
            var url = "/chats"; 

           $.ajax({
                method:"GET",
                url: url,
                data: {keyword:keyword}
               
            }).done(function(data) {

            
                let html = '';
                var users = data.users;
                var indicateUsers = data.indicate_users;

                Object.keys(users).forEach(key => {

                    html += '<div class="flex items-center w-full my-2 hover:bg-gray-100 hover:rounded-lg p-1 cursor-pointer select-user" user-name="'+ users[key]['name'] +'" user-id="'+ users[key]['id'] +'">';
                    html +=     '<button class="rounded-full p-3 bg-gray-300 outline-none">';
                    html +=         '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">';
                    html +=             '<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />';
                    html +=         '</svg>';
                    html +=     '</button>';
                    html +=     '<div class="w-full flex justify-between items-center mx-2">';
                    html +=         '<span>'+ users[key]['name'] +'</span>';

                    if (indicateUsers.includes(users[key]['id'])) {
                        html +=         '<span  class="h-1 w-1 px-1 py-1 rounded-full bg-teal-600 indicator-'+ users[key]['id'] +'"></span>'; 
                     
                    }

                    html +=     '</div>';
                    html += '</div>';
                  
                });

                $('.chatdetails').html(html);

                
            }); 

        }
        
        

        
 

        $(document).on('click', '.select-user', function(){

            var user_name = $(this).attr('user-name');
            var user_id = $(this).attr('user-id');
            
            $('#message').show();
            $('#chatbox').hide();
            
            $('#message-user-name').text(user_name);
            $('#message-user-id').val(user_id);

            $('#messages').html(''); 

            chatInterval = setInterval(refreshChat, 1000);
            
        });

        

        $('#send-message').click(function(){

            var receiver_id = $('#message-user-id').val();
            var message = $('#message-text').val();
            var url = "/chats/store"; 

            $.ajax({
                method:"POST",
                url: url,
                data: { receiver_id:receiver_id, message:message }
               
            }).done(function(data) {

                $('#message-text').val('');
                 
            }); 
        
        });


        
        
        function refreshChat() {

            var user_id = $('#message-user-id').val();

            var url = "/chats/show"; 

            var message_id = $("#messages > div:last").attr('message_id');

            if (!message_id) {
                message_id = 0;
            }

            $.ajax({
                method:"GET",
                url: url,
                data: { receiver_id:user_id }
               
            }).done(function(data) {

                var message_html = '';

                data.forEach(item => {

                    if (item.id > message_id) {

                        if (!temp.includes(item.date)) {
                            temp.push(item.date);
                            message_html += '<div class="w-full px-1 rounded-full text-center text-sm">'+ item.date +'</div>';
                        } 

                        message_html += '<div class="w-56 m-1 rounded-full'+ item.align +'" message_id="'+ item.id +'">'
                        message_html +=     '<div class="border border-teal-600 flex justify-between items-center px-2 rounded-full text-sm">'
                        message_html +=         '<div>'+ item.message +'</div>'

                        if (item.is_read == 1 && item.sender_id == login_user_id) { 
                            message_html += '<div>'
                            message_html +=     '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-right" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">'
                            message_html +=         '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />'
                            message_html +=     '</svg>'
                            message_html += '</div>'

                        } 

                        if (item.is_read == 0 && item.receiver_id == login_user_id) {
                            playAudio();
                        }

                        message_html +=     '</div>'
                        message_html += '</div>'
                        
                         
                    }    
                   
                });

                

                if (message_html) {

                    $('#messages').append(message_html); 
                
                    $('#messages').scrollTop($('#messages')[0].scrollHeight);

                }
                 
            });  
        }

       

        
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