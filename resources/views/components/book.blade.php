<div>
    <a href="{{route("detail-book", $id)}}">
        <div class="select-none relative hover:scale-105 transition-all">
            <div class="py-2 flex justify-between items-center absolute w-full top-0">
                <div>
                    @php
                        $price = $price ? number_format($price, 0, ',', '.') . ' đ' : 'Miễn phí';
                    @endphp
                    <span
                        class="text-xs ml-2 px-2 py-1 font-semibold bg-rose-500 rounded-full text-white">{{ $price }}</span>
                </div>
            </div>
            <div class="w-full aspect-[4/6]">
                <img class="w-full h-full object-cover rounded-lg shadow-lg shadow-black/50" src="{{ asset('storage/' . $thumbnail  ) }}"
                    alt="{{ $title }}" />
            </div>
        </div>
        <div class="px-2 pb-4 mt-6">
            <h2 class="font-semibold text-pretty">
                {{ $title }}
            </h2>
        </div>
    </a>
</div>
