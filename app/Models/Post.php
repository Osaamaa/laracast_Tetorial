<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $fillable =['title','category_id','slug','body','excerpt'];
    protected $guarded = [];
//    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()//auther_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
