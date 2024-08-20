<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'content',
        'date',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tecnologies(){
        return $this->belongsToMany(Technology::class);
    }
}