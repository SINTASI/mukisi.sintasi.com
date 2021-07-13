<x-layout title="ERROR 404">
    <x-page-content header-clear-medium>
        <x-header back-button header-title="ERROR 404"></x-header>

        <div class="card card-style p-4 text-center">
            <h1>Wooops! Page Not Found</h1>
            <p>
                Sorry, the page you're looking for cannot be found. How about checking some of the other awesome pages
                we have around?
            </p>
            <a href="{{ url()->previous() }}" data-back-button=""
                class="btn btn-m btn-center-m font-700 gradient-highlight rounded-s mb-3">Back Home</a>
        </div>
    </x-page-content>
    <x-menu-bottom></x-menu-bottom>
</x-layout>
