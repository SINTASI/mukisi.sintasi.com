<style>
    .header,
    .page-title-fixed,
    .card-fixed,
    #menu-cards,
    #menu-colors,
    #menu-share,
    #footer-bar {
        max-width: 550px;
        margin: auto;
    }

    .footer-bar-6 .circle-nav strong {
        background-image: linear-gradient(to bottom, @setting('color_primary') 0%, @setting('color_secondary') 100%) !important;
    }

    .gradient-highlight {
        background-image: linear-gradient(to bottom, @setting('color_primary'), @setting('color_secondary')) !important;
        color: #FFF;
    }

    a {
        color: @setting('color_primary');
        text-decoration: underline;
    }

    .no-img1,
    .bg-20 {
        background-image: url({{ asset('/images/no-image1.png') }}) !important;
    }

    .no-img2 {
        background-image: url({{ asset('/images/no-image2.jpg') }}) !important;
    }

    .no-img3 {
        background-image: url({{ asset('/images/no-image3.jpg') }}) !important;
    }

</style>
