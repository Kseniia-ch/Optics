<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
