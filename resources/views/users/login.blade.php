<x-layout title="Login">

    <x-page-content header-clear-medium>

        <x-header back-button></x-header>

        <div class="text-center">
            {{ request()->session()->get('message') }}
        </div>

    </x-page-content>

</x-layout>
