<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function shortLink(Request $request)
    {
        $slug = $request->post('slug');
        $link = $request->post('link');

        $request->validate([
            'link' => 'required|url',
            'slug' => $slug ? 'required|string|min:3|max:64' : ''
        ]);
        if(!$slug) {
            while(true) {
                $slug = Str::random(5);
                if(!Cache::has($slug)) {
                    break;
                }
            }
        }
        $insertResult = Link::query()->insert([
            'slug' => $slug,
            'link' => $link
        ]);

        Cache::put($slug, $link);
        return redirect()->route('index')->with('success', $insertResult);
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
