<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class UrlModel extends Model
{
    use HasFactory;

    protected $table = 'encurtadordeurls'; 

    protected $fillable = [
        'original_url',
        'code',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
    ];
	
	public static function deleteIfExpired()
	{
    	static::whereNotNull('expires_at')
        	->where('expires_at', '<', now())
        	->delete();
	}
}
