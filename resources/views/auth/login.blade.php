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
            <div class="col-span-3">

            </div>
            <div class="col-span-6">
                <center>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-span-4 bg-slate-100 mt-5 border border-cyan-700 p-10 bg-slate-100 rounded">
                            <h1 class="text-3xl text-blue-600 p-4 text-center font-bold font-serif tracking-wide">TimeSheet  </h1>
                            <div>
                                <input id="email" type="email" class="h-6 w-full p-5 bg-blue-100 rounded mb-2 border focus:border-blue-400 outline-none @error('email') is-invalid @enderror" value="{{ old('email') }}"  name="email" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <input id="password" type="password" class="h-6 w-full p-5 bg-blue-100  rounded border focus:border-blue-400 outline-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{ old('password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="flex p-1 items-center text-sm">
                                <input type="checkbox" name="checkbox" class="mx-2" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                            </div>

                            <button type ="submit" class="w-full flex bg-blue-500 hover:bg-blue-700 p-3 text-white justify-center items-center rounded"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span >Sign In</span>

                            </button>
                            <br>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-sm " href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </center>
            </div>
            <div class="col-span-3">

            </div>
        </div>
    </div>
</body>
</html>