<div class="content">

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="name" name="name" placeholder="Nama"
            value="{{ old('name') }}" required>
        <label for="name" class="color-highlight">Nama</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
        <small class="text-small">Nama beserta gelar</small>
    </div>


    @foreach ($forms as $form)
        @if ($form->key === 'profesi_id')
            <div class="input-style no-borders has-icon validate-field mb-4">
                <i class="material-icons">{{ $form->icon }}</i>
                <select name="{{ $form->key }}" id="{{ $form->key }}" value="{{ old($form->key) }}"
                    class="form-control validate" {{ !$form->required ?: 'required' }}>
                    {!! $profesi !!}
                </select>
                <label for="{{ $form->key }}" class="color-highlight">{{ $form->label }}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>
        @endif
    @endforeach

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="institusi_name" name="institusi_name"
            value="{{ old('institusi_name') }}" placeholder="Institusi">
        <label for="institusi_name" class="color-highlight">Institusi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-at"></i>
        <input type="email" class="form-control validate-email" id="email" name="email" placeholder="Alamat Email"
            value="{{ old('email') }}" required>
        <label for="email" class="color-highlight">Alamat Email</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="material-icons">call</i>
        <input type="number" class="form-control validate" id="no_tlp" name="no_tlp" placeholder="Nomor Telpon"
            value="{{ old('no_tlp') }}" required>
        <label for="no_tlp" class="color-highlight">Nomor Telpon</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon mb-4">
        <i class="material-icons">article</i>
        <textarea id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat') }}"></textarea>
        <label for="alamat" class="color-highlight">Alamat Lengkap</label>
    </div>


    <div class="no-borders has-icon validate-field mb-4">
        <select name="prov_code" id="prov_code" class="form-control" value="{{ old('prov_code') }}"
            required></select>
    </div>

    <div class="no-borders has-icon validate-field mb-4">
        <select name="kab_code" id="kab_code" class="form-control" value="{{ old('kab_code') }}" required></select>
    </div>

    <div class="no-borders has-icon validate-field mb-4">
        <select name="kec_code" id="kec_code" class="form-control" value="{{ old('kec_code') }}" required></select>
    </div>

    <button class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s full-width" type="submit">
        Daftar
    </button>

    <div class="row pt-3 mb-3">
        <div class="col-6 text-start">
            <a href="#">Lupa Password?</a>
        </div>
        <div class="col-6 text-end">
            <a href="/login">Login disini!</a>
        </div>
    </div>
</div>



{!! $mapscript !!}
