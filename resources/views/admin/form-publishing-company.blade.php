@extends('./layouts/admin/layout')
@php
    $isEdit = isset($data);
@endphp
@section('heading', $isEdit ? 'Edit Publishing company' : 'Add Publishing company')
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
            action="{{ $isEdit ? route('admin.publishing_company.edit-handle', $data->id) : route('admin.publishing_company.add-handle') }}">
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
                        <div class="col-span-full">
                            <label for="synopsis" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="synopsis" name="description" rows="3"
                                    class="p-2 block w-full rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 sm:text-sm sm:leading-6">
@if ($isEdit)
{{ $data->description }}@else{{ old('description') }}
@endif
</textarea>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="cover-photo"
                                class="block text-sm font-medium leading-6 text-gray-900">Logo</label>
                            <div class="flex items-center gap-4">
                                @if ($isEdit)
                                    <div>
                                        <img class="w-32 rounded-md" src="{{ asset('storage/' . $data->logo) }}"
                                            alt="">
                                    </div>
                                @endif
                                <div
                                    class="mt-2 flex-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="logo" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="mt-2">
                                <input
                                    value="@if ($isEdit) {{ $data->address }}@else{{ old('address') }} @endif"
                                    type="text" name="address" id="first-name" autocomplete="given-name"
                                    class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm border">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name"
                                class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2">
                                <input
                                    value="@if ($isEdit) {{ $data->phone }}@else{{ old('phone') }} @endif"
                                    type="text" name="phone" id="last-name" autocomplete="family-name"
                                    class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm border">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input
                                    value="@if ($isEdit) {{ $data->email }}@else{{ old('email') }} @endif"
                                    type="text" name="email" id="first-name" autocomplete="given-name"
                                    class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm border">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name"
                                class="block text-sm font-medium leading-6 text-gray-900">Website</label>
                            <div class="mt-2">
                                <input
                                    value="@if ($isEdit) {{ $data->website }}@else{{ old('website') }} @endif"
                                    type="text" name="website" id="last-name" autocomplete="family-name"
                                    class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm border">
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
