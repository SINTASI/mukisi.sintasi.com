<x-layout title="Login">

    <x-page-content header-clear-medium>
        <x-header back-button></x-header>
        @if (session('success'))
            <div class="card card-style alert" role="alert">
                <div class="d-flex py-2">
                    <div>
                        <i class="fa fa-check-circle me-3 scale-box fa-4x color-green-dark"></i>
                    </div>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="flex-center card card-style bg-theme pb-0">
            <form method="POST" action="/login" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="content">
                    <div class="text-center header header-title mb-4">
                        LOGIN
                    </div>

                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control validate-email" id="email" name="email"
                            placeholder="Alamat Email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email" class="color-highlight">Alamat Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-password" id="password" name="password"
                            placeholder="Password" value="{{ old('password') }}" required autocomplete="password">
                        <label for="password" class="color-highlight">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <button class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s full-width"
                        type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>

    </x-page-content>

</x-layout>
