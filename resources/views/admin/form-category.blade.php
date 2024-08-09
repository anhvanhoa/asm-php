@extends('./layouts/admin/layout')
@php
    $isEdit = isset($data);
@endphp
@section('heading', $isEdit ? 'Edit category' : 'Add category')
@section('content')
    <div class="px-4 py-2">
        @if ($errors->any())
            <div class="border border-red-700 py-2 px-4 rounded-xl mb-8">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data"
            action="{{ $isEdit ? route('admin.category.edit-handle', $data->id) : route('admin.category.add-handle') }}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-full">
                            <label for="Title" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input
                                    value="@if ($isEdit) {{ $data->name }}@else{{ old('name') }} @endif"
                                    type="text" name="name" id="Title" autocomplete="Title"
                                    class="border w-full block flex-1 rounded-md p-2 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="janesmith">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
@endsection
