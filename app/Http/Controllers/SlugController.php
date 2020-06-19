<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlugController extends Controller
{
    public function process($slug)
    {
        $link = getSlugLink($slug);
        if (urlIsValid($link)) return redirect($link);
        else return abort(404);
    }
}
