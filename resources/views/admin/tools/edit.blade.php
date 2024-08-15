<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="py-5 bg-red-700 text-white font-bold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                @endif
                <form action="{{ route('admin.tools.update', $tool) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                     <div class="flex flex-col gap-y-5 w-full">
                    <div class="flex flex-col gap-y-2">
                        <h1 class="text-3xl text-indigo-950 font-bold">
                            Add New Tools
                        </h1>
                        <h3>Name</h3>
                    </div>
                    <input value="{{ $tool->name }}" type="text" class="w-full" id="name" name="name">
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-5">
                    <div class="flex flex-col gap-y-2">
                        <h3>
                            Tagline
                        </h3>
                        <input type="text" class="w-full" id="tagline" name="tagline">
                    </div>
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <div class="flex flex-col gap-y-2">
                        <h3>logo</h3>
                    </div>
                    <img src="{{ Storage::url($tool->logo) }}" alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">
                    <input type="file" class="w-full" id="logo" name="logo">
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Update Project</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
