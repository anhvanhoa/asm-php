@extends('./layouts/client/layout-main')

@section('title', 'Author')

@section('content')
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="mt-8 max-w-screen-md mx-auto">
            <div class="flex items-center gap-12">
                <div class="py-4">
                    <img src="{{ $author->avatar }}" alt="" class="rounded-full size-32">
                </div>
                <div>
                    <p class="font-semibold text-lg">{{ $author->name }}</p>
                <div class="text-sm">
                    <p>{{ $author->phone }}</p>
                    <p>{{ $author->address }}</p>
                </div>
                </div>
            </div>
            <div class="mt-6">
                <p class="font-semibold">Tiểu sử</p>
                <p class="mt-2">
                    {{ $author->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
