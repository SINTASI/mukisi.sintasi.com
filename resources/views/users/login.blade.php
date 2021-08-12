<x-layout title="Login">

    <x-page-content header-clear-medium>
        <x-header back-button></x-header>
        @if (session('success'))
            <div class="card card-style alert" role="alert">
                <div class="d-flex py-2">
                    <div>
                        <i class="fa fa-check-circle me-3 scale-box fa-4x color-green-dark"></i>
                    </div>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif



    </x-page-content>

</x-layout>
