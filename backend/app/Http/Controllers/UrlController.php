<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\UrlModel;
use App\Http\Resources\UrlResource;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function redirect($code) : \Illuminate\Http\RedirectResponse
    {
        $url = UrlModel::where('code', $code)->first();

        if (!$url) {
            abort(404, 'URL não encontrada.');
        }

        if ($url->deleteIfExpired()) {
            abort(404, 'URL expirou e foi removida.');
        }

		return redirect()->away($url->original_url, 302);
    }

    public function deleteIfExpired(): bool
    {
        if ($this->isExpired()) {
            $this->delete();
            return true;
        }
        return false;
    }

    public function store(UrlRequest $request) : \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        $originalUrl = $validated['originalUrl'] ?? null;

        if (!$originalUrl) {
            return response()->json(['error' => 'originalUrl is required'], 422);
        }

        do {
            $code = substr(md5(uniqid(rand(), true)), 0, 6);
        } while (UrlModel::where('code', $code)->exists());

        $url = new UrlModel();
        $url->original_url = $validated['originalUrl'];
        $url->code = $code;
        $url->expires_at = Carbon::now()->addDays(7);
        $url->save();

        return response()->json(new UrlResource($url), 201);
    }
}
