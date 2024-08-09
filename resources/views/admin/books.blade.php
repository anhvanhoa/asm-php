@extends('./layouts/admin/layout')

@section('heading', 'Books')
@section('content')
    <div class="px-4 py-2">
        <div>
            <div class="my-2">@if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif</div>
        <div class="flex justify-between items-center mb-4">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <a href="{{ route('admin.book.add') }}">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                        Thêm
                    </button>
                </a>
            </div>
            <form class="" method="GET">
                <div class="flex items-center gap-2">
                    <input type="search" id="search-dropdown" name="q" value="{{ request()->get('q') }}"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-none outline-none"
                        placeholder="Search Mockups, Logos, Design Templates..." />
                    <button type="submit" class="p-2.5 text-sm font-medium h-full bg-gray-100 rounded-lg">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </form>

        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Book name
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Author
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Publishing company
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Acction
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $i => $item)
                        <tr class="bg-white border-b">
                            <th class="px-2 py-4 !font-normal">
                                {{ $item->id }}
                            </th>
                            <td class="px-2 py-4">
                                {{ $item->title }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $item->author->name }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $item->category->name }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $item->publishing_company->name }}
                            </td>
                            <td class="px-2 py-4">
                                <div class="inline-flex rounded-md shadow-sm">
                                    <form action="{{route('admin.book.delete', $item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Xác nhận xóa')" type="submit"
                                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-rose-600 ">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{route('admin.book.edit', ['id' => $item->id])}}"
                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 ">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6">
                {{ $list->links() }}
            </div>
        </div>
    </div>
@endsection
