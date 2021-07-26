<div class="card card-style">
    <h4 class="font-28 text-center color-theme font-800 pt-3 mt-3">@setting('name')</h4>

    <p class="boxed-text-l mb-4">
        @setting('description')
    </p>
    <div class="text-center mb-4">
        <a href="@setting('facebook')" class="icon icon-xs rounded-sm shadow-l mr-1 bg-facebook"><i
                class="fab fa-facebook-f"></i></a>
        {{-- <a href="#" class="icon icon-xs rounded-sm shadow-l mr-1 bg-twitter"><i class="fab fa-twitter"></i></a> --}}
        <a href="@setting('whatsapp')" class="icon icon-xs rounded-sm shadow-l mr-1 bg-phone"><i
                class="fa fa-phone"></i></a>
        <a href="@setting('youtube')" class="icon icon-xs rounded-sm mr-1 shadow-l bg-red-dark"><i
                class="fa fa-youtube"></i></a>
        {{-- <a href="#" class="back-to-top icon icon-xs rounded-sm shadow-l bg-highlight color-white"><i
                class="fa fa-arrow-up"></i></a> --}}
    </div>
    <div class="divider mb-3"></div>
    <div class="row text-center mb-3 pl-3 pr-3">
        <a class="font-11 col-4" href="#">Privacy Policy</a>
        <a class="font-11 col-4" href="#">Terms of Service</a>
        <a class="font-11 col-4" href="#">Contact Support</a>
    </div>
</div>
