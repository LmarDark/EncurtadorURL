<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UrlModel extends Model
{
    use HasFactory;

    protected $table = 'encurtadordeurls';

    protected $fillable = [
        'original_url',
        'code',
        'clicks',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'clicks'     => 'integer',
    ];

    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }

    public static function deleteExpired(): int
    {
        return static::whereNotNull('expires_at')
            ->where('expires_at', '<', now())
            ->delete();
    }
}
