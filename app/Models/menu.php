<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant as R;

class menu extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(R::class, 'restaurant_id', 'id');
    }
}
