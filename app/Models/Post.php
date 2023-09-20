<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'title',
        'slug',
        'extract',
        'url',
        'body',
        'status',
        'user_id',
        'category_id',
        'image_author'
    ];
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    /* Relationshiop one to many inverse */
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    /* Relationship many to many */
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /* R one to one poliphormic */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->slug = $post->createSlug($post->title);
            $post->save();
        });
    }
    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
