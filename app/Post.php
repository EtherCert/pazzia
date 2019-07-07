<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\PostDec;

class Post extends Model
{
    use SoftDeletes; //traits
    protected static  function boot()  // globlal scope function
    {
        parent::boot();
        static::addGlobalScope('published', function ($query) {
            $query->where('status', 'published');
        });
    }
    //////////////////////////////////////////////////////////////////
    // public function scopePublished($query)  //local scope function
    // {
    //     $query->where('status', 'published');
    //     $query->orderBy('created_at', 'DESC');
    //     return $query;
    // }
    ///////////////////////////////////////////////////////////////////
    public function scopeStatus($query, $status = 'published')  //local scope function
    {
        $query->where('status', $status);
        $query->orderBy('created_at', 'DESC');
        return $query;
    }
    //Accessors
    public function getPstatusAttribute()
    { // pstatus in posts.index
        return ucfirst($this->status);
    }

    public function getPtitleAttribute()
    { // Ptitle in posts.index
        return ucfirst($this->title);
    }

    public function getFullNameAttribute()
    { //full_name

    }
    //Mutators
    //$post->status ="PUBLISHED";
    public function setPstatusAttribute(
        $value
    ) {
        $this->attributes['status'] = strtolower($value);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'id' => 0,
            'name' => 'uncatoriezed'
        ]);
    }

    public function stat()
    {
        return $this->hasOne(PostStat::class, 'post_id', 'id')->withDefault([
            'id' => 0,
            'likes' => 0,
            'comments' => 0,
        ]);; // return one obj
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
