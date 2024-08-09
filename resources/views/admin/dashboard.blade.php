@extends('./layouts/admin/layout')

@section('heading', 'Dashboard')
@section('content')
    <div>
        <div class="grid grid-cols-3 p-4 gap-4">
            @foreach ($counts as $count)
                <div class="p-4 rounded-xl border">
                    <p class="text-sm py-1">{{ $count['name'] }}</p>
                    <div class="flex items-center justify-between py-2">
                        <p class="text-3xl font-semibold">{{ $count['count'] }}</p>
                        <span class="bg-gray-100 p-2 rounded-lg">
                            <i data-lucide="eye"></i>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
