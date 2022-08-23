<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu as M;

class dish extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo(M::class, 'menu_id', 'id');
    }
}
