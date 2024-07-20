@extends('./layouts/client/layout-main')

@section('title', 'Deatil sản phẩm')

@section('content')
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="mt-8">
            <p class="text-sm flex items-center gap-x-2">
                <span class="font-semibold">Home</span>
                <span class="h-3 w-[1px] bg-gray-400"></span>
                <span class="text-gray-500">{{ $book->title }}</span>
            </p>
        </div>
        <div class="grid grid-cols-12 mt-6">
            <div class="col-span-5 mr-12">
                <div class="px-14 sticky top-8">
                    <div>
                        <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}"
                            class="w-full aspect-[4/6] object-cover rounded-2xl overflow-hidden">
                    </div>
                </div>
            </div>
            <div class="col-span-7 ml-12">
                <div class="pb-8 mb-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <span class="bg-blue-500/10 text-blue-500 rounded-full px-3 py-1.5 text-sm font-semibold">
                                {{ $book->tag }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-[32px] py-4 font-semibold leading-[48px] text-pretty">{{ $book->title }}</h1>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <div class="flex items-center gap-x-1">
                            {{ $book->rating ? number_format($book->rating, 1, '.', '.') : 0 }}
                            <span>
                                <i class="size-4 fill-orange-500 text-orange-500" data-lucide="star"></i>
                            </span>
                        </div>
                        <span class="w-[1px] bg-black h-4 rounded-full"></span>
                        <p>{{ $book->countRating }} đánh giá</p>
                    </div>
                    <div class="overflow-x-auto mt-4">
                        <table class="table-fixed w-full text-sm text-left rtl:text-right">
                            <tbody>
                                <tr>
                                    <td scope="row" class="max-w-40 font-medium">Nhà xuất bản</td>
                                    <td class="px-3 py-2">{{ $book->publishing_company_name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row" class="max-w-40 font-medium">Tác giả</td>
                                    <td class="px-3 py-2">
                                        <a href="{{route('author-book', $book->author)}}" class="text-blue-500">
                                            {{ $book->author_name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row" class="max-w-40 font-medium">Thể loại</td>
                                    <td class="px-3 py-2">{{ $book->category_name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row" class="max-w-40 font-medium">Ngày xuất bản</td>
                                    @php
                                        $date = date_create($book->publishing_date);
                                        $date = date_format($date, 'd/m/Y');
                                    @endphp
                                    <td class="px-3 py-2">{{ $date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex items-center mt-4 gap-x-4">
                        @php
                            $price = $book->price ? number_format($book->price, 0, ',', ',') . ' đ' : 'Miễn phí';
                        @endphp
                        <p class="font-semibold text-2xl text-rose-500">{{ $price }}</p>
                    </div>
                    <div class="flex items-center gap-x-4 mt-6">
                        <button class="bg-rose-500 text-white py-2.5 px-20 rounded-lg text-sm font-semibold">
                            <span class="text-sm font-semibold">Mua ngay</span>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="font-semibold text-lg">Tóm tắt nội dung</p>
                    <div class="mt-2">
                        <p>
                            {{ $book->synopsis }}
                        </p>
                    </div>
                </div>
                <div class="border rounded-2xl py-3 px-4 mt-8">
                    <h4 class="text-xl font-semibold py-2">Đánh giá</h4>
                    <div class="flex items-center gap-x-2 text-sm"><label class="peer select-none"><input type="checkbox"
                                name="todo" hidden="" class="peer">
                            <p
                                class="text-xs cursor-pointer rounded-md px-2 py-1 border border-slate-400 text-slate-600 peer-checked:border-orange-500 peer-checked:text-orange-500 font-semibold">
                                5 Sao</p>
                        </label><label class="peer select-none"><input type="checkbox" name="todo" hidden=""
                                class="peer">
                            <p
                                class="text-xs cursor-pointer rounded-md px-2 py-1 border border-slate-400 text-slate-600 peer-checked:border-orange-500 peer-checked:text-orange-500 font-semibold">
                                4 Sao</p>
                        </label><label class="peer select-none"><input type="checkbox" name="todo" hidden=""
                                class="peer">
                            <p
                                class="text-xs cursor-pointer rounded-md px-2 py-1 border border-slate-400 text-slate-600 peer-checked:border-orange-500 peer-checked:text-orange-500 font-semibold">
                                3 Sao</p>
                        </label><label class="peer select-none"><input type="checkbox" name="todo" hidden=""
                                class="peer">
                            <p
                                class="text-xs cursor-pointer rounded-md px-2 py-1 border border-slate-400 text-slate-600 peer-checked:border-orange-500 peer-checked:text-orange-500 font-semibold">
                                2 Sao</p>
                        </label><label class="peer select-none"><input type="checkbox" name="todo" hidden=""
                                class="peer">
                            <p
                                class="text-xs cursor-pointer rounded-md px-2 py-1 border border-slate-400 text-slate-600 peer-checked:border-orange-500 peer-checked:text-orange-500 font-semibold">
                                1 Sao</p>
                        </label></div>
                    <div class="mt-5">
                        @if ($comments->count() > 0)
                            <div class="flex gap-x-3 mb-4">
                                <div class="text-sm flex flex-col gap-y-1">
                                    <p class="font-semibold leading-4">Jond</p>
                                    <p class="text-xs">14/06/2022 | phân loại đen, ram 8GB</p>
                                    <div class="flex items-center gap-x-1"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                                class="text-orange-500 size-3 iconify iconify--iconoir" width="1em"
                                                height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54z">
                                                </path>
                                            </svg><!--v-if--></span><span><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="text-orange-500 size-3 iconify iconify--iconoir"
                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54z">
                                                </path>
                                            </svg><!--v-if--></span><span><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="text-orange-500 size-3 iconify iconify--iconoir"
                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54z">
                                                </path>
                                            </svg><!--v-if--></span><span><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="text-orange-500 size-3 iconify iconify--iconoir"
                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54z">
                                                </path>
                                            </svg><!--v-if--></span><span><!--v-if--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                role="img" class="text-orange-500 size-3 iconify iconify--ph"
                                                width="1em" height="1em" viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="M237.28 97.87A14.18 14.18 0 0 0 224.76 88l-60.25-4.87l-23.22-56.2a14.37 14.37 0 0 0-26.58 0L91.49 83.11L31.24 88a14.18 14.18 0 0 0-12.52 9.89A14.43 14.43 0 0 0 23 113.32l46 39.61l-14 59.25a14.4 14.4 0 0 0 5.59 15a14.1 14.1 0 0 0 15.91.6l51.5-31.66l51.58 31.71a14.1 14.1 0 0 0 15.91-.6a14.4 14.4 0 0 0 5.59-15l-14-59.25L233 113.32a14.43 14.43 0 0 0 4.28-15.45m-12.14 6.37l-48.69 42a6 6 0 0 0-1.92 5.92l14.88 62.79a2.35 2.35 0 0 1-.95 2.57a2.24 2.24 0 0 1-2.6.1L131.14 184a6 6 0 0 0-6.28 0l-54.72 33.61a2.24 2.24 0 0 1-2.6-.1a2.35 2.35 0 0 1-1-2.57l14.88-62.79a6 6 0 0 0-1.92-5.92l-48.69-42a2.37 2.37 0 0 1-.73-2.65a2.28 2.28 0 0 1 2.07-1.65l63.92-5.16a6 6 0 0 0 5.06-3.69l24.63-59.6a2.35 2.35 0 0 1 4.38 0l24.63 59.6a6 6 0 0 0 5.06 3.69l63.92 5.16a2.28 2.28 0 0 1 2.07 1.65a2.37 2.37 0 0 1-.68 2.66">
                                                </path>
                                            </svg></span></div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ad aut exercitationem
                                        nisi sit ipsa, fuga dolorum. Unde molestias perspiciatis voluptate impedit omnis
                                        perferendis odio, doloremque sed dignissimos voluptas maiores.</p>
                                </div>
                            </div>
                        @else
                            <div>
                                <p>Chưa có đánh giá nào</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="px-8 mt-24">
            <h3 class="text-lg uppercase font-semibold">
                Có thể bạn sẽ thích
            </h3>
            <div class="grid grid-cols-5 gap-4 mt-6">
                {{-- @include('./components/book') --}}
            </div>
        </div>
    </div>
@endsection
