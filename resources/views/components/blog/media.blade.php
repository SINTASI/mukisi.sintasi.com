@if ($type === 'images')

    @if (property_exists($media, 'media_details'))
        <img src="{{ $media->media_details->sizes->$size->source_url }}" alt="{{ $media->alt_text }}"
            class="img-fluid bg-20 {{ $size }}" style="width: 533px;height: 240px;max-height:30vh;">
    @else
        <img src="/images/no-image1.png" class="img-fluid bg-20 {{ $size }}"
            style="width: 533px;height: 240px;max-height:30vh;">
    @endif

@endif

{{-- style="height: auto;width: 100%;" --}}
