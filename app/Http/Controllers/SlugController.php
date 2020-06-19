<?php

namespace App\Http\Controllers;

class SlugController extends Controller
{
    public function process($slug)
    {
        $link = getSlugLink($slug);
        if (urlIsValid($link)) return redirect($link);
        else return abort(404);
    }
}
