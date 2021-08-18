<x-layout title="Pendaftaran">

    <x-page-content header-clear-medium>

        <x-header back-button></x-header>
        @if (session('error'))
            <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark" role="alert">
                <span><i class="fa fa-times color-white"></i></span>
                <strong class="color-white">{{ session('error') }}
                </strong>
                <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
                    aria-label="Close">×</button>
            </div>
        @endif

        <div class="card card-style bg-theme pb-0">
            <div class="content" id="tab-group-1">
                <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">

                    <a href="/pendaftaran?type=personal" {{ $type === 'institusi' ?: 'data-active' }}>Personal</a>
                    <a href="/pendaftaran?type=institusi" {{ $type === 'personal' ?: 'data-active' }}>Institusi</a>
                    {{-- <a href="#" {{ $type === 'personal' ?: 'data-active' }}>Institusi</a> --}}

                </div>
                <div class="clearfix mb-3"></div>


                <form method="POST" action="/pendaftaran?type={{ $type }}" enctype="multipart/form-data">
                    @csrf
                    <div data-bs-parent="#tab-group-1" class="collapse show" id="{{ $type }}">
                        @if ($type === 'personal')
                            <x-dynamic-component :component="$componentName" />
                        @elseif ($type === 'institusi')
                            <x-dynamic-component :component="$componentName" />
                        @endif
                        {{-- <x-dynamic-component :component="$componentName" /> --}}
                    </div>
                </form>


            </div>
        </div>

        <div class="card card-style">

        </div>

    </x-page-content>

    {{-- <x-menu-bottom></x-menu-bottom> --}}
</x-layout>
