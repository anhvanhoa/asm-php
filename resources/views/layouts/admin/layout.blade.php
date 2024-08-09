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
    <div>
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        @php
            $data = [
                [
                    'name' => 'Dashboard',
                    'icon' => '<i data-lucide="layout-grid"></i>',
                    'route' => 'admin.dashboard',
                ],
                [
                    'name' => 'Users',
                    'icon' => '<i data-lucide="user"></i>',
                    'route' => 'admin.users',
                ],
                [
                    'name' => 'Books',
                    'icon' => '<i data-lucide="square-library"></i>',
                    'route' => 'admin.books',
                ],
                [
                    'name' => 'Categories',
                    'icon' => '<i data-lucide="layout-panel-top"></i>',
                    'route' => 'admin.categories',
                ],
                [
                    'name' => 'Authors',
                    'icon' => '<i data-lucide="user-pen"></i>',
                    'route' => 'admin.authors',
                ],
                [
                    'name' => 'Publishing companies',
                    'icon' => '<i data-lucide="newspaper"></i>',
                    'route' => 'admin.publishing_companies',
                ],
                // [
                //     'name' => 'Comments',
                //     'icon' => '<i data-lucide="message-square-more"></i>',
                //     'route' => 'admin.categories',
                // ],
            ];
        @endphp

        <aside id="default-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <div class="px-2 pb-4 flex items-center gap-2">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Ánh Văn Hóa Store" class="size-9 rounded-md" />
                    </a>
                    <h1 class="font-bold">
                        Anh Van Hoa Store
                    </h1>
                </div>
                <ul class="space-y-2 font-medium">
                    @foreach ($data as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="flex items-center p-2 my-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                {!! $item['icon'] !!}
                                <span class="ms-3">{{ $item['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <div class="sm:ml-64">
            <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg m-4 ">
                <div class="flex justify-between items-center px-4 py-2">
                    <p class="font-semibold text-lg">
                        @yield('heading')
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="font-medium">
                            ! {{auth()->user()->name}}
                        </span>
                        <a class="block" href="{{route('logout')}}">
                            <span class=" block p-2 bg-[#F9FAFB] rounded-xl cursor-pointer">
                                <i class="size-4" data-lucide="log-out"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
