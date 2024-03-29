<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['post_id', 'tag_id'];
    // or // protected $guarded = [];
}
