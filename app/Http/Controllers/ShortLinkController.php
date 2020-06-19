<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    protected function rules($slug) {
        return [
            'link' => 'required|url',
            'slug' => $slug ? 'required|string|min:3|max:64' : ''
        ];
    }
    public function shortLink(Request $request)
    {
        $slug = $request->post('slug');
        $link = $request->post('link');

        $success = false;
        $error = "";

        $validator = Validator::make(
            $request->all(),
            $this->rules($slug)
        );

        if (!$validator->fails()) {
            if (!$slug) $slug = getNewSlug();

            if (!empty($slug) && !slugIsExists($slug)) {
                $success = Link::query()->insert([
                    'slug' => $slug,
                    'link' => $link
                ]);

                Cache::put($slug, $link);
            }
            else {
                $error = __('messages.slugExists');
            }
        }
        else {
            $error = $validator->errors()->first();
        }

        $fullUrl = env('APP_URL') . "/" . $slug;
        return response()->json([
            'ok' => $success,
            'error' => $error,
            'slug' => $slug,
            'fullUrl' => $fullUrl
        ]);
    }
    public function checkSlug(Request $request) {
        if ($request->ajax()) {
            $ok = false;
            $slug = $request->post('slug');

            return response()->json([
                'ok' => !slugIsExists($slug),
                'slug' => $slug
            ]);

        }
    }
}
