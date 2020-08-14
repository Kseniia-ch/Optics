<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    
    protected $primaryKey = 'id';
    protected $table = 'goods';
    protected $fillable = ['name', 'category_id', 'price', 'description', 'image_path', 'created_at', 'updated_at'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filters)
    {
        if( isset($filters['category_id']) ){
            $query->where('category_id', '=', $filters['category_id']);
        }
    }
}
