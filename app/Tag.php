<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at'; //The name of the "created at" column.
    const UPDATED_AT = 'updated_at'; //The name of the "updated at" column.

    public $timestamps = false; //fales (default)

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
