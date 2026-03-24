<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\UrlModel;
use App\Http\Resources\UrlResource;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function redirect(string $code): \Illuminate\Http\RedirectResponse
    {
        $url = UrlModel::where('code', $code)->first();

        if (!$url) {
            abort(404, 'URL não encontrada.');
        }

        if ($url->isExpired()) {
            $url->delete();
            abort(404, 'URL expirou e foi removida.');
        }

        $url->increment('clicks');

        return redirect()->away($url->original_url, 302);
    }

    public function store(UrlRequest $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        if (!empty($validated['customCode'])) {
            $code = $validated['customCode'];
        } else {
            do {
                $code = Str::random(6);
            } while (UrlModel::where('code', $code)->exists());
        }

        $url = UrlModel::create([
            'original_url' => $validated['originalUrl'],
            'code'         => $code,
            'clicks'       => 0,
            'expires_at'   => Carbon::now()->addDays(7),
        ]);

        return response()->json(new UrlResource($url), 201);
    }
}
