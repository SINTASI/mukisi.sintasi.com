<div class="header {{ $headerAutoShow ? 'header-auto-show' : '' }}  header-fixed header-logo-center">

    @if (isset($headerTitle))
        <a href="{{ url('/') }}" class="header-title">{{ $headerTitle }}</a>
    @else
        <a href="{{ url('/') }}" class="header-title">@setting('title_header')</a>
    @endif


    @if ($backButton)
        <a href="{{ url()->previous() }}" data-back-button="" class="header-icon header-icon-1">
            <i class="fas fa-chevron-left"></i>
        </a>
    @else
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
    @endif


    <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
    <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
    <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
</div>

@if ($headerAutoShow)
    <x-page-title></x-page-title>
    <div class="page-title-clear"></div>
@endif

<x-menu-left></x-menu-left>
<x-menu-share></x-menu-share>
{{-- <x-menu-color></x-menu-color> --}}
