<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Derails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col">
                <div class="flex flex-col sm:flex-row sm:items-center gap-x-5 mb-5 sm:mb-0">
                    <div class="flex flex-col gap-y-1">
                        <h3 class="font-bold text-xl">
                            {{ $projectOrder->name }}
                        </h3>
                        <p class="text-sm text-slate-400">
                            {{ $projectOrder->email }}
                        </p>
                    </div>
                </div>
                <hr class="my-10">
                <h3 class="text-3xl text-indigo-950 font-bold">
                    Brief
                </h3>
                <p>
                    {{ $projectOrder->brief }}
                </p>
                <p>
                    {{ $projectOrder->category }}
                </p>
                <p>
                    ${{ $projectOrder->budget }}
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
