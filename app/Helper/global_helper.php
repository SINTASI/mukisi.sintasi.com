<?php

function setting(string $key = null)
{
    if (isset($key)) {
        $get = App\Models\Setting::where('key', $key);
        if ($get->exists()) {
            return $get->first()->value;
        }
        return null;
    }
    return App\Models\Setting::get();
}


function parseTag($url, $timeout = 10)
{
    $html = loadPagesUrl($url, $timeout);
    if (!$html) {
        return false;
    }
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');
    $metas = $doc->getElementsByTagName('meta');
    $ary = [
        'title' => '',
        'description' => '',
    ];
    $ary['title'] = $nodes->item(0)->nodeValue;
    $tags = ['description', 'keywords'];
    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        foreach ($tags as $tag) {
            if ($meta->getAttribute('name') == $tag) {
                $ary[$tag] = $meta->getAttribute('content');
            }
        }
    }
    return $ary;
}

function loadPagesUrl($url, $timeout)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
