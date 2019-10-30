<?php

namespace App;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function room()
    {
        return $this->hasMany(Room::class, 'category_id');
    }
}

