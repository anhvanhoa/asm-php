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
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register
                        with us
                    </h2>
                </div>
                @if ($errors->any())
                    <div class="border border-red-700 py-2 px-4 rounded-xl mb-8">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-700 text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('handle-register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                name</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" autocomplete="name" required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-smsm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-smsm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-smsm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password confirmation</label>
                            </div>
                            <div class="mt-2">
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password"
                                    required
                                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-smsm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 ">Register</button>
                        </div>
                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                        Already have an account?
                        <a href="{{ route('login') }}"
                            class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
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
