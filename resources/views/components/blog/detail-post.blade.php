<x-layout title="{{ $post->title->rendered }}">
    <link rel="stylesheet" href="https://mukisi.com/wp-content/themes/Newspaper/style.css?ver=8.8.2">
    <x-header back-button header-auto-show></x-header>
    <x-menu-bottom></x-menu-bottom>

    <div class="card card-fixed mb-n5" data-card-height="420" style="height: 420px;">
        <div class="card rounded-0" data-card-height="450"
            style="height: 450px;background-image:url({{ $post->media->source_url }})">
            <div class="card-bottom px-3 pb-4">
                <h2 class="color-white font-25 mb-0">
                    {{ $post->title->rendered }}
                </h2>
            </div>
            <div class="card-top mt-3 pb-5 ps-3">
                <a href="#" data-back-button="" class="icon icon-s bg-theme rounded-xl float-start me-3"><i
                        class="fa color-theme fa-arrow-left"></i></a>
                <a href="#" data-menu="menu-share" class="icon icon-s bg-theme rounded-xl float-end me-3"><i
                        class="fa color-theme fa-share-alt"></i></a>
            </div>
            <div class="card-overlay bg-gradient"></div>
        </div>
    </div>
    <div class="card card-clear" data-card-height="400" style="height: 400px;"></div>


    <x-page-content>
        <div class="card card-full rounded-m">
            <div class="drag-line"></div>
            <div class="content content-wp">
                {!! $post->content->rendered !!}
            </div>
        </div>
    </x-page-content>

    <script>
        $.each($("figure > a"), function() {
            $(this).attr('data-gallery', "{{ $post->id }}")
        })
    </script>
</x-layout>
