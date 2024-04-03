<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2 items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase">
                {{-- {{ __('Dashboard') }} --}}
                I miei progetti
            </h2>
            <a href="{{ route('projects.create') }}
            ">
                <i class="fa-solid fa-circle-plus text-xl text-cyan-600"></i>
            </a>
        </div>

    </x-slot>

    <div class="card-big">
        <h2>{{ $project->title }}</h2>
        <img src="{{ $project->thumb }}" alt="{{ $project->title }}">
        <p>{{ $project->description }} </p>
        <p>
            {{ $stack->name }}
        </p>
    </div>

</x-app-layout>
