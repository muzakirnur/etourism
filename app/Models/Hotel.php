<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pictures():HasMany
    {
        return $this->hasMany(HotelPicture::class);
    }

    public function rating():HasMany
    {
        return $this->hasMany(HotelRating::class);
    }

    public function totalRating()
    {
        $rating = HotelRating::query()->where('hotel_id', $this->id)->get('bintang');
        $sumStar = $rating->sum('bintang');
        $finalStar = $sumStar/count($rating);
        return number_format($finalStar, 2, '.', ' ');
    }

    public function shortDesc()
    {
        return Str::limit(strip_tags($this->deskripsi), 300);
    }
}
