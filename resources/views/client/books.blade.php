@extends('./layouts/client/layout-main')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="grid grid-cols-12 my-8">
            <div class="col-span-3 pr-12">
                <div class="border-b pb-4 mb-4">
                    <p class="flex items-center justify-between">
                        <span class="font-semibold text-pretty">Tác giả</span>
                        <span class="cursor-pointer hover:bg-gray-100 rounded-lg p-1">
                            <i class="size-4" data-lucide="chevron-down"></i>
                        </span>
                    </p>
                    <div class="">
                        @foreach ($authors as $author)
                            <p class="flex items-center px-1 gap-x-1.5 my-2.5 text-sm">
                                <input type="checkbox" class="mt-0.5" id="{{ 'author-' . $author->id }}">
                                <label for="{{ 'author-' . $author->id }}" class="cursor-pointer">
                                    {{ $author->name }}
                                </label>
                            </p>
                        @endforeach
                    </div>
                </div>
                <div class="border-b pb-4 mb-4">
                    <p class="flex items-center justify-between">
                        <span class="font-semibold text-pretty">Nhà xuất bản</span>
                        <span class="cursor-pointer hover:bg-gray-100 rounded-lg p-1">
                            <i class="size-4" data-lucide="chevron-down"></i>
                        </span>
                    </p>
                    <div class="">
                        @foreach ($publishingCompanies as $publishingCompanie)
                            <p class="flex items-center px-1 gap-x-1.5 my-2.5 text-sm">
                                <input type="checkbox" class="mt-0.5" id="{{ 'publishing-' . $publishingCompanie->id }}">
                                <label for="{{ 'publishing-' . $publishingCompanie->id }}" class="cursor-pointer">
                                    {{ $publishingCompanie->name }}
                                </label>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-9">
                <div class="flex items-center justify-between">
                    <p class="text-sm flex items-center gap-x-2">
                        <span class="font-semibold">Home</span>
                        <span class="h-3 w-[1px] bg-gray-400"></span>
                        <span class="text-gray-500">{{ $category->name }}</span>
                    </p>
                    <button class="cursor-pointer bg-white py-1.5 px-3 text-sm rounded-lg flex items-center gap-x-1">
                        <span class="leading-5"> Sắp xếp </span>
                    </button>
                </div>
                <div class="grid grid-cols-4 gap-2 mt-6">
                    @foreach ($books as $book)
                        @include('./components/book', [
                            'thumbnail' => $book->thumbnail,
                            'title' => $book->title,
                            'price' => $book->price,
                            'staring' => $book->staring,
                            'id' => $book->id,
                        ])
                    @endforeach
                </div>
                <div>
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
