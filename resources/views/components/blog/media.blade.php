@if ($type === 'images')
    <img src="{{ $media->media_details->sizes->$size->source_url }}" alt="{{ $media->alt_text }}"
        class="img-fluid rounded-sm bg-20 {{ $size }}" style="height: 275px;width: 100%;">
@endif
