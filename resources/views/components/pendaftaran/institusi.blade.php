<div class="content">

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="name" name="name"
            placeholder="Nama Direktur/Owner Rumah sakit" required>
        <label for="name" class="color-highlight">Nama Direktur/Owner Rumah sakit</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-at"></i>
        <input type="email" class="form-control validate-email" id="email" name="email" placeholder="Alamat Email"
            required>
        <label for="email" class="color-highlight">Alamat Email</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control validate-name" id="institusi_name" name="institusi_name"
            placeholder="Nama Institusi">
        <label for="institusi_name" class="color-highlight">Nama Institusi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="rs_type" id="rs_type" class="form-control validate" required>
            <option value>Pilih Tipe Rumah Sakit</option>
            <option value="Tipe A">Tipe A</option>
            <option value="Tipe B">Tipe B</option>
            <option value="Tipe C">Tipe C</option>
            <option value="Tipe D">Tipe D</option>
        </select>
        <label for="rs_type" class="color-highlight">Tipe Rumah Sakit</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="akreditasi" id="akreditasi" class="form-control validate" required>
            <option value>Pilih Akreditasi</option>
            <option value="Dasar">Dasar</option>
            <option value="Madya">Madya</option>
            <option value="Utama">Utama</option>
            <option value="Paripurna">Paripurna</option>
        </select>
        <label for="akreditasi" class="color-highlight">Akreditasi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="category_id" id="category_id" class="form-control validate" required>
            {!! $category !!}
        </select>
        <label for="category_id" class="color-highlight">Kategori</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="prov_code" id="prov_code" class="form-control validate" required onchange="loadKab()">
            {!! $prov !!}
        </select>
        <label for="prov_code" class="color-highlight">Provinsi</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="kab_code" id="kab_code" class="form-control validate" required onchange="loadKec()">
            <option value="">Kabupaten/Kota</option>
        </select>
        <label for="kab_code" class="color-highlight">Kabupaten/Kota</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="kec_code" id="kec_code" class="form-control validate" required onchange="loadKel()">
            <option value="">Kecamatan</option>
        </select>
        <label for="kec_code" class="color-highlight">Kecamatan</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-list"></i>
        <select name="kel_code" id="kel_code" class="form-control validate" required>
            <option value="">Kelurahan</option>
        </select>
        <label for="kel_code" class="color-highlight">Kelurahan</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="material-icons">call</i>
        <input type="number" class="form-control validate" id="tlp_rs" name="tlp_rs"
            placeholder="Nomor Telpon Rumah Sakit">
        <label for="tlp_rs" class="color-highlight">Nomor Telpon Rumah Sakit</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-lock"></i>
        <input type="password" class="form-control validate-password" id="password" placeholder="Masukan Password">
        <label for="password" class="color-highlight">Masukan Password</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-lock"></i>
        <input type="password" class="form-control validate-password" id="password2" name="password"
            placeholder="Konfirmasi Password">
        <label for="password2" class="color-highlight">Konfirmasi Password</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon mb-4">
        <i class="material-icons">article</i>
        <textarea id="alamat" name="alamat" placeholder="Alamat Rumah Sakit"></textarea>
        <label for="alamat" class="color-highlight">Alamat Rumah Sakit</label>
    </div>

    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="material-icons">file_upload</i>
        <input type="file" class="form-control validate-file" id="img_rs" name="img_rs"
            placeholder="Upload foto Rumah Sakit">
        <label for="img_rs" class="color-highlight">Upload foto Rumah Sakit
        </label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>

    <button class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s full-width" type="submit">
        Daftar</button>

    <div class="row pt-3 mb-3">
        <div class="col-6 text-start">
            <a href="page-forgot-1.html">Lupa Password?</a>
        </div>
        <div class="col-6 text-end">
            <a href="page-signin-1.html">Login disini!</a>
        </div>
    </div>


</div>


{!! $mapscript !!}


<style>

</style>
