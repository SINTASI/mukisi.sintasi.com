@if ($type === 'images')
    <img src="{{ $media->media_details->sizes->medium->source_url }}" alt="{{ $media->alt_text }}"
        class="img-fluid rounded-sm bg-20">
@endif
