<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant as R;
use App\Models\Menu as M;
use App\Models\Dish as D;
use App\Models\User as U;

class order extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(R::class, 'restaurant_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(M::class, 'menu_id', 'id');
    }

    public function dish()
    {
        return $this->belongsTo(D::class, 'dish_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(U::class, 'user_id', 'id');
    }

}
