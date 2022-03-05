<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title></title>
</head>
<body>
    <div class="px-72 py-36">
        <div class="grid grid-cols-12">
            <div class="col-span-4">

            </div>
            <div class="col-span-4">
                <center>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col-span-4 bg-slate-100 mt-5 border border-cyan-700 p-10 bg-slate-100 rounded">
                            <h1 class="text-3xl text-blue-500 p-4 text-center font-bold font-serif tracking-wide">Register</h1>

                            <div>
                                <input id="name" type="text" placeholder="Name" class="h-6 w-full p-5 bg-blue-100 rounded mb-2 border focus:border-blue-400 outline-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>

                            <div> 
                                <input id="email" type="email" placeholder="Email" class="h-6 w-full p-5 bg-blue-100 rounded mb-2 border focus:border-blue-400 outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div>
                                <input id="password" type="password" placeholder="Password" class="h-6 w-full p-5 bg-blue-100 rounded mb-2 border focus:border-blue-400 outline-none @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div>
                                <input id="password-confirm" type="password" placeholder="Confirm password" class="h-6 w-full p-5 bg-blue-100 rounded mb-2 border focus:border-blue-400 outline-none" name="password_confirmation" required autocomplete="new-password">
                            </div>

                             <button type ="submit" class="w-full flex bg-blue-500 hover:bg-blue-700 p-3 text-white justify-center items-center rounded">       
                                   Register
                            </button>

                        </div>
                    </form>
                </center>
            </div>
            <div class="col-span-4">

            </div>
        </div>
    </div>
</body>
</html>
