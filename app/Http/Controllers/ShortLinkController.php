<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ShortLinkController extends Controller
{
    protected function rules($slug) {
        $urlRegex = "/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/su";
        return [
            'link' => 'required|regex:'.$urlRegex,
            'slug' => $slug ? 'required|string|min:3|max:64' : ''
        ];
    }
    public function shortLink(Request $request)
    {
        $slug = $request->post('slug');
        $link = $request->post('link');

        $link = validateUrl($link);

        $success = false;
        $error = "";

        $validator = Validator::make(
            [
                'link' => $link,
                'slug' => $slug
            ],
            $this->rules($slug),
            [
                'regex' => __('messages.invalidUrl')
            ]
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

        $fullUrl = url()->to($slug);
        return response()->json([
            'ok' => $success,
            'error' => $error,
            'slug' => $slug,
            'fullUrl' => $fullUrl
        ]);
    }
    public function checkSlug(Request $request) {
        if ($request->ajax()) {
            $slug = $request->post('slug');

            return response()->json([
                'ok' => !slugIsExists($slug),
                'slug' => $slug
            ]);

        }
    }
}
