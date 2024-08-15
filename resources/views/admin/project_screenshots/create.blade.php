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
                <form action="{{ route('admin.project_screenshots.store', $project) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="flex flex-col gap-y-5 w-full">
                        <div class="flex flex-col gap-y-2">
                            <h1 class="text-3xl text-indigo-950 font-bold">
                                Add Project Screenshot
                            </h1>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-x-5 mb-5 sm:mb-0">
                                <img src="{{ Storage::url($project->cover) }}" alt="" class="object-cover w-[120px] h-[90px] rounded-2xl">
                                <div class="flex flex-col gap-y-1">
                                    <h3 class="font-bold text-xl">
                                        {{ $project->name }}
                                    </h3>
                                    <p class="text-sm text-slate-400">
                                        {{ $project->category }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <div class="flex flex-col gap-y-2">
                        <h3>Screenshot</h3>
                    </div>
                    <input type="file" class="w-full" id="screenshot" name="screenshot">
                </div>
                <div class="flex flex-col gap-y-5 w-full mt-10">
                    <button type="submit" class="py-4 w-full rounded-full bg-violet-700 font-bold text-white">Ad Screenshot</button>
                </div>
                </form>
                <hr class="my-10">
                <h3 class="text-3xl text-indigo-950 font-bold">
                    Existing Screenshot
                </h3>
                <div class="flex flex-col gap-y-5">
                    @forelse ($project->screenshots as $screenshot)
                    <div class="item-project flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 bg-gray-100 rounded-lg shadow-md">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-x-5 mb-5 sm:mb-0">
                            <img src="{{ Storage::url($screenshot->screenshot) }}" alt="" class="object-logo w-[120px] h-[90px] rounded-2xl">
                            
                        </div>
                        <div class="flex flex-col sm:flex-row gap-x-2 gap-y-2 sm:gap-y-0">
                            <form action="{{ route('admin.project_screenshots.destroy', $screenshot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white text-center">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-500">Belum ada screenshot yang tersedia</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
