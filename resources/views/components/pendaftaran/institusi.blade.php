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
        <i class="fa fa-list"></i>
        <select name="category_id" id="category_id" class="form-control validate" required>
            {!! $category !!}
        </select>
        <label for="category_id" class="color-highlight">Kategori</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-at"></i>
        <input type="email" class="form-control validate-email" id="form1ac" placeholder="Email Address">
        <label for="form1ac" class="color-highlight">Email Address</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-lock"></i>
        <input type="password" class="form-control validate-password" id="form1ad" placeholder="Choose Password">
        <label for="form1ad" class="color-highlight">Choose Password</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
    </div>


    <div class="input-style no-borders has-icon validate-field mb-4">
        <i class="fa fa-lock"></i>
        <input type="password" class="form-control validate-password" id="form1ae" placeholder="Confirm Password">
        <label for="form1ae" class="color-highlight">Confirm Password</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>(required)</em>
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
