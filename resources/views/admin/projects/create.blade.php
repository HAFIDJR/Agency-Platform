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
                <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                     <div class="flex flex-col gap-y-5 w-full">
                    <div class="flex flex-col gap-y-2">
                        <h1 class="text-3xl text-indigo-950 font-bold">
                            Add New Project
                        </h1>
                        <h3>Name</h3>
                    </div>
                    <input type="text" class="w-full" id="name" name="name">
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-5">
                    <div class="flex flex-col gap-y-2">
                        <h3>Category</h3>
                    </div>
                    <select name="category" id="category" class="w-full">
                        <option value="">Choose Category Below</option>
                        <option value="Web Development">Web Development</option>
                        <option value="App Development">App Development</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <div class="flex flex-col gap-y-2">
                        <h3>Cover Image</h3>
                    </div>
                    <input type="file" class="w-full" id="cover" name="cover">
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <div class="flex flex-col gap-y-2">
                        <h3>About</h3>
                    </div>
                    <textarea name="about" id="about" cols="30" rows="10"></textarea>
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Upload Project</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
