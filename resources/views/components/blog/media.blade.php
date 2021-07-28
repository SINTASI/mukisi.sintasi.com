@if ($type === 'images')
    <img src="{{ $media->source_url }}" alt="{{ $media->alt_text }}" class="img-fluid rounded-sm">
@endif
