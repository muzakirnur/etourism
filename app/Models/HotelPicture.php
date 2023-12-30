<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelPicture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotel():BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
