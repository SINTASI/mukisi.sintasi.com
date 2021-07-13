<?php




function setting(string $key = null)
{


    if (isset($key)) {
        $get = App\Models\Setting::where('key', $key);
        if ($get->exists()) {
            return $get->first()->value;
        }
        throw new Exception(strtoupper($key) . " is not exists from Database settings", 1);
    }
    return App\Models\Setting::get();
}
