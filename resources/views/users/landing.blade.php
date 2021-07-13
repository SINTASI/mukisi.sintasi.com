<x-layout>

    <x-header header-auto-show></x-header>


    <x-menu-bottom></x-menu-bottom>

    <x-page-content>
        <x-slider-home></x-slider-home>
        <x-menu-home></x-menu-home>

        <div class="card card-full-left card-style">
            <div class="content">
                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl"
                            src="{{ asset('/template/images/pictures/31l.jpg') }}">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Copy and Paste Ready</p>
                        <h2>Components</h2>
                        <p class="mt-2">
                            Reusable components that are just as easy as copy and paste.
                        </p>
                        <a href="index-components.html"
                            class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View All</a>
                    </div>
                </div>

                <div class="divider mt-4"></div>

                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl"
                            src="{{ asset('/template/images/pictures/16l.jpg') }}">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p>
                        <h2>Pages</h2>
                        <p class="mt-2">
                            Pages that feel amazing to your fingertips! Ready to use!
                        </p>
                        <a href="index-pages.html" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View
                            All</a>
                    </div>
                </div>
                <div class="divider mt-4"></div>

                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl"
                            src="{{ asset('/template/images/pictures/6l.jpg') }}">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Endless Options</p>
                        <h2>Homepages</h2>
                        <p class="mt-2">
                            Absolutely awesome homepages ready for you to enjoy.
                        </p>
                        <a href="index-homepages.html"
                            class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View All</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mb-0">
            <a href="#" class="col-6 pe-0">
                <div class="card mr-0 card-style">
                    <div class="d-flex pt-3 pb-3">
                        <div class="align-self-center">
                            <i class="fa fa-home color-green-light ms-3 font-34 mt-1"></i>
                        </div>
                        <div class="align-self-center">
                            <h5 class="ps-2 ms-1 mb-0">PWA <br> Ready</h5>
                        </div>
                    </div>
                    <p class="px-3">
                        Enjoy Mukisi from your Home Screen.
                    </p>
                </div>
            </a>
            <a href="#" class="col-6 ps-0">
                <div class="card ml-0 card-style">
                    <div class="d-flex pt-3 pb-3">
                        <div class="align-self-center">
                            <i class="fa fa-cog color-blue-dark ms-3 font-34 mt-1"></i>
                        </div>
                        <div class="align-self-center">
                            <h5 class="ps-2 ms-1 mb-0">Clean<br>Code</h5>
                        </div>
                    </div>
                    <p class="px-3">
                        Powered by Bootstrap makes your job easier!
                    </p>
                </div>
            </a>
        </div>

        <a href="#" data-toggle-theme>
            <div class="card card-style">
                <div class="d-flex pt-3 mt-1 mb-2 pb-2">
                    <div class="align-self-center">
                        <i
                            class="color-icon-gray color-gray-dark font-30 icon-40 text-center fa fa-moon ms-3 show-on-theme-light"></i>
                        <i
                            class="color-icon-yellow color-yellow-dark font-30 icon-40 text-center fa fa-sun ms-3 show-on-theme-dark"></i>
                    </div>
                    <div class="align-self-center">
                        <p class="ps-2 ms-1 color-highlight font-500 mb-n1 mt-n2">Tap to Enable</p>
                        <h4 class="show-on-theme-light ps-2 ms-1 mb-0">Dark Mode</h4>
                        <h4 class="show-on-theme-dark ps-2 ms-1 mb-0">Light Mode</h4>
                    </div>
                    <div class="ms-auto align-self-center mt-n2">
                        <div class="custom-control small-switch ios-switch me-3 mt-n2">
                            <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-home">
                            <label class="custom-control-label" for="toggle-dark-home"></label>
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <x-menu-footer></x-menu-footer>
    </x-page-content>

    <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title mt-n1">
            <h1>Share the Love</h1>
            <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#" class="close-menu"><i
                    class="fa fa-times"></i></a>
        </div>
        <div class="content mb-0">
            <div class="divider mb-0"></div>
            <div class="list-group list-custom-small list-icon-0">
                <a href="auto_generated" class="shareToFacebook external-link">
                    <i class="font-18 fab fa-facebook-square color-facebook"></i>
                    <span class="font-13">Facebook</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToTwitter external-link">
                    <i class="font-18 fab fa-twitter-square color-twitter"></i>
                    <span class="font-13">Twitter</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToLinkedIn external-link">
                    <i class="font-18 fab fa-linkedin color-linkedin"></i>
                    <span class="font-13">LinkedIn</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToWhatsApp external-link">
                    <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                    <span class="font-13">WhatsApp</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToMail external-link border-0">
                    <i class="font-18 fa fa-envelope-square color-mail"></i>
                    <span class="font-13">Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m">
        <img class="mx-auto mt-4 rounded-m" src="{{ asset('/template/app/icons/icon-128x128.png') }}" alt="img"
            width="90">
        <h4 class="text-center mt-4 mb-2">Mukisi on your Home Screen</h4>
        <p class="text-center boxed-text-xl">
            Install Mukisi on your home screen, and access it just like a regular app. It really is that simple!
        </p>
        <div class="boxed-text-l">
            <a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Add to Home Screen</a>
            <a href="#"
                class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12 pb-4 mb-3">Maybe
                later</a>
        </div>
    </div>

    <!-- Install instructions for iOS -->
    <div id="menu-install-pwa-ios" class="menu menu-box-bottom rounded-m">
        <div class="boxed-text-xl top-25">
            <img class="mx-auto mt-4 rounded-m" src="{{ asset('/template/app/icons/icon-128x128.png') }}" alt="img"
                width="90">
            <h4 class="text-center mt-4 mb-2">Mukisi on your Home Screen</h4>
            <p class="text-center ms-3 me-3">
                Install Mukisi on your home screen, and access it just like a regular app. Open your Safari menu and
                tap "Add to Home Screen".
            </p>
            <a href="#"
                class="pwa-dismiss close-menu btn-full mt-3 text-center text-uppercase font-900 color-red-light opacity-90 font-110 pb-5">Maybe
                later</a>
        </div>
    </div>

</x-layout>
