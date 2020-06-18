<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlugController extends Controller
{
    public function process($slug)
    {
        $link = "";
        if(Cache::has($slug)) {
            $link = Cache::get($slug);
        }
        else {
            $link = Link::query()
                    ->where('slug', $slug)
                    ->get('link')
                    ->first()
                    ->link ?? '';
        }
        
        if(filter_var($link, FILTER_VALIDATE_URL) !== FALSE) return redirect($link);
        else return abort(404);
    }
}
