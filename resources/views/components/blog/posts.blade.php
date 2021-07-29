@foreach ($posts as $post)
    <div class="card card-style">
        <div class="content mb-0">

            <a href="/post/{{ $post->slug }}" class="mb-4 d-block">
                <x-blog.media media-id="{{ $post->featured_media }}"></x-blog.media>
                <h5 class="font-600 pt-2">{{ $post->title->rendered }}</h5>
                <span class="color-highlight opacity-60">{!! $post->excerpt->rendered !!}</span>
            </a>
            {{-- <div class="divider mt-4"></div> --}}

        </div>
    </div>
@endforeach
