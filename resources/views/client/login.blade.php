<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="bg-[#F0EEE2]">
        <div>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="Ánh Văn Hóa Store"
                            class="mx-auto size-9 rounded-md" />
                    </a>
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to
                        your account
                    </h2>
                </div>
                <div>
                </div>
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    @if ($errors->any())
                        <div class="border border-red-700 py-2 px-4 rounded-xl mb-8">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-700 text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="border border-red-700 py-2 px-4 rounded-xl mb-8">
                            <ul>
                                <li class="text-red-700 text-sm">{{ session('error') }}</li>
                            </ul>
                        </div>
                    @endif
                    <form class="space-y-6" action="{{ route('handle-login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                <div class="text-sm">
                                    {{-- <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                        password?</a> --}}
                                </div>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password"
                                    autocomplete="current-password" required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                                in</button>
                        </div>
                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                        Not a member?
                        <a href="{{ route('register') }}"
                            class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
                    </p>
                </div>
            </div>
        </div>
        @include('layouts/client/footer')
    </div>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
