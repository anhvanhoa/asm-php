@extends('./layouts/client/layout-main')

@section('title', 'Home')

@section('content')
    <div class="max-w-screen-xl mx-auto">
        <div class="px-8 py-8 relative select-none">
            <div>
                <img class="aspect-[16/5] w-full h-full object-cover rounded-xl"
                    src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.banner_web_v2/0/0/0/3448.jpg" alt="">
            </div>
        </div>
        <div>
            <h3 class="text-2xl font-semibold mt-8 px-8">Sách miễn phí</h3>
            <div class="grid grid-cols-5 gap-4 mt-6 px-8">
                @foreach ($booksFree as $book)
                    @include('./components/book', [
                        'thumbnail' => $book->thumbnail,
                        'title' => $book->title,
                        'price' => $book->price,
                        'staring' => $book->staring,
                        'id' => $book->id,
                    ])
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="text-2xl font-semibold mt-8 px-8">Sách của chúng tôi</h3>
            <div class="grid grid-cols-5 gap-4 mt-6 px-8">
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
        </div>
    </div>
@endsection
