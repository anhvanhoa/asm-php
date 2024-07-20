<section class="border-b border-black/40">
    <header class="max-w-screen-xl mx-auto px-4 py-5 flex items-center gap-x-14 justify-between">
        <div class="flex items-center gap-x-14">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Ánh Văn Hóa Store" class="size-9 rounded-md" />
                </a>
            </div>
            <div>
                <nav class="flex items-center gap-x-8 *:font-medium">
                    @foreach ($categories as $category)
                        <a href="{{ route('category-book', $category->id) }}"
                            class="text-gray-900 hover:text-primary">{{ $category->name }}</a>
                    @endforeach
                </nav>
            </div>
        </div>
        <div class="flex items-center gap-x-14">
            <div class="flex items-center gap-x-1 *:cursor-pointer">
                <span class="p-2 hover:bg-white rounded-lg">
                    <i class="size-5" data-lucide="search"></i>
                </span>
                <span class="p-2 hover:bg-white rounded-lg">
                    <i class="size-5" data-lucide="shopping-cart"></i>
                </span>
                <span class="p-2 hover:bg-white rounded-lg">
                    <i class="size-5" data-lucide="user"></i>
                </span>
            </div>
        </div>
    </header>
</section>
