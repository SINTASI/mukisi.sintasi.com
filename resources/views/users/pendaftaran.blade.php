<x-layout title="Pendaftaran">

    <x-page-content header-clear-medium>

        <x-header back-button></x-header>

        <div class="card card-style bg-theme pb-0">
            <div class="content" id="tab-group-1">
                <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">

                    <a href="/pendaftaran?type=personal" {{ $type === 'institusi' ?: 'data-active' }}>Personal</a>

                    <a href="/pendaftaran?type=institusi" {{ $type === 'personal' ?: 'data-active' }}>Institusi</a>

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
                    </div>
                </form>


            </div>
        </div>

        <div class="card card-style">

        </div>

    </x-page-content>

    <x-menu-bottom></x-menu-bottom>
</x-layout>
