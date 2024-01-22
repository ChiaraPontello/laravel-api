<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable =['user_id', 'title','slug', 'body', 'image', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public static function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        //primo post con slug uguale a $slug
        //se è già presente allora genero un nuovo slug aggiungendo -$count
        while(Project::where("slug", $slug)->first()) {
            $slug= Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
