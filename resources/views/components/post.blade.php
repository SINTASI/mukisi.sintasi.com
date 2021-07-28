<div class="card card-style">
    <div class="content mb-0">
        @foreach ($posts as $post)

            <a href="#" class="mb-4 d-block bg-20">
                <img src="{{ asset('/template/images/pictures/8w.jpg') }}" class="img-fluid rounded-sm">
                <h5 class="font-600 pt-2">{{ $post->title->rendered }}</h5>
                <span class="color-highlight opacity-60">{!! $post->excerpt->rendered !!}</span>
            </a>


            {{-- <div class="d-flex">
                <div class="me-3">
                    <img width="120" class="fluid-img rounded-m shadow-xl"
                        src="{{ asset('/template/images/pictures/31l.jpg') }}">
                </div>
                <div>
                    <p class="color-highlight font-600 mb-n1">Copy and Paste Ready</p>
                    <h2>{{ $post->title->rendered }}</h2>
                    <p class="mt-2">
                        {!! $post->excerpt->rendered !!}
                    </p>
                    <a href="{{ $post->link }}" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View
                        All</a>
                </div>
            </div> --}}


            <div class="divider mt-4"></div>
        @endforeach


    </div>
</div>
