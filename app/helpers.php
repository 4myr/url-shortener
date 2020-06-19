<?php

use App\Link;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

function slugIsExists($slug) {
    $ok = false;
    if (Cache::has($slug)) $ok = true;
    else $ok = Link::query()->where('slug', $slug)->exists();
    return $ok;
}
function getNewSlug() {
    $slug = "";
    while(true) {
        $slug = Str::random(5);
        if (!Cache::has($slug)) {
            if (!Link::query()->where('slug', $slug)->exists()) break;
        }
    }
    if (!empty($slug)) return $slug;
    return false;
}
function getSlugLink($slug) {
    $link = "";
    if (Cache::has($slug)) {
        $link = Cache::get($slug);
    }
    else {
        $link = Link::query()
                ->where('slug', $slug)
                ->get('link')
                ->first()
                ->link ?? '';
    }
    return $link;
}
function urlIsValid($link) {
    if (filter_var($link, FILTER_VALIDATE_URL) !== FALSE) return true;
    return false;
}
