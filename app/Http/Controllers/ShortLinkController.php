<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function shortLink(Request $request)
    {
        $request = $request->post();
        var_dump($request);
    }
    public function checkSlug(Request $request) {
        if($request->ajax()) {
            $ok = false;
            $slug = $request->post('slug');
            $ok = !Link::query()->where('slug', $slug)->exists();
            return response()->json([
                'ok' => $ok,
                'slug' => $slug
            ]);
        }
    }
}
