<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-28 flex flex-col">
            <a href="{{ route('admin.projects.create') }}" class="py-4 text-white bg-indigo-950 rounded-full font-bold w-1/5 text-center mb-10">
                Add New Project
            </a>
            <hr class="my-10">
            <div class="flex flex-col gap-y-5">
                @forelse ($projects as $project)
                <div class="item-project flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 bg-gray-100 rounded-lg shadow-md">
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
                    <div class="flex flex-col sm:flex-row gap-x-2 gap-y-2 sm:gap-y-0">
                        <a href="{{ route('admin.project.assign.tool', $project) }}" class="py-3 px-5 rounded-full bg-indigo-950 text-white text-center">
                        Add Tools
                        </a>
                        <a href="{{ route('admin.project_screenshots.create', $project) }}" class="py-3 px-5 rounded-full bg-indigo-950 text-white text-center">
                            Add Screenshots
                        </a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="py-3 px-5 rounded-full bg-indigo-500 text-white text-center">
                            Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white text-center">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500">Belum ada Project Tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

</x-app-layout>
