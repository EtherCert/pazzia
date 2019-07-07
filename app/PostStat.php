<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostStat extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'post_id';
    protected $guarded = [];

    public function post()
    {
        $this->belongsTo(Post::class)->withDefault([
            'id' => 0,
            'likes' => 0,
            'comments' => 0,
        ]);
    }
}
