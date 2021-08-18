<div class="content">
    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="name" name="name"
            placeholder="Nama Direktur/Owner Rumah sakit" value="{{ old('name') }}" required>
        <label for="name" class="color-highlight">Nama Direktur/Owner Rumah sakit</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
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
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="institusi_name" name="institusi_name"
            value="{{ old('institusi_name') }}" placeholder="Nama Institusi">
        <label for="institusi_name" class="color-highlight">Nama Institusi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
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
        @else
            <div class="input-style no-borders has-icon validate-field mb-4">
                <i class="material-icons">{{ $form->icon }}</i>
                <select name="{{ $form->key }}" id="{{ $form->key }}" value="{{ old($form->key) }}"
                    class="form-control validate" {{ !$form->required ?: 'required' }}
                    onchange="showSubFrom('{{ $form->key }}')">
                    {!! $category !!}
                </select>
                <label for="{{ $form->key }}" class="color-highlight">{{ $form->label }}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>

            @foreach ($form->subs as $sub)
                @if ($sub->type === 'select')
                    <div class="input-style no-borders has-icon validate-field mb-4 group_{{ $form->key }}"
                        id="{{ $form->key }}_{{ $sub->key }}" style="display: none">
                        <i class="material-icons">{{ $sub->icon }}</i>
                        <select name="{{ $sub->key }}" id="{{ $sub->key }}" value="{{ old($sub->key) }}"
                            class="form-control validate" {{ !$sub->required ?: 'required' }}>
                            <option value>Pilih {{ $sub->label }}</option>
                            @foreach (json_decode($sub->data) as $data)
                                <option value="{{ $data }}">{{ $data }}</option>
                            @endforeach
                        </select>
                        <label for="{{ $sub->key }}" class="color-highlight">{{ $sub->label }}</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="material-icons">call</i>
        <input type="number" class="form-control validate" id="no_pic" name="no_pic" placeholder="NO HP PIC Institusi"
            value="{{ old('no_pic') }}">
        <label for="no_pic" class="color-highlight">NO HP PIC Institusi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="material-icons">call</i>
        <input type="number" class="form-control validate" id="no_tlp" name="no_tlp"
            placeholder="Nomor Telpon Rumah Sakit" value="{{ old('no_tlp') }}" required>
        <label for="no_tlp" class="color-highlight">Nomor Telpon Rumah Sakit</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon mb-4">
        <i class="material-icons">article</i>
        <textarea id="alamat" name="alamat" placeholder="Alamat Rumah Sakit" value="{{ old('alamat') }}"></textarea>
        <label for="alamat" class="color-highlight">Alamat Rumah Sakit</label>
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



    {{-- <label for="images" class="color-highlight">Upload foto Rumah Sakit
    </label>
    <div class="input-style no-borders has-icon validate-field mb-4">
        <input type="file" class="form-control validate-file" id="images" name="images" style="padding-left: 12px;"
            value="{{ old('images') }}" required>
    </div> --}}

    <button class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s full-width" type="submit">
        Daftar</button>

    <div class="row pt-3 mb-3">
        <div class="col-6 text-start">
            <a href="#">Lupa Password?</a>
        </div>
        <div class="col-6 text-end">
            <a href="/login">Login disini!</a>
        </div>
    </div>


</div>

<script>
    function showSubFrom(form) {
        $(`.group_${form}`).hide()
        const {
            ref
        } = $(`#${form}`).find('option').filter(':selected').data()
        if (ref) {
            $(`#${form}_${ref}`).fadeIn();
        }
    }
</script>
{!! $mapscript !!}
