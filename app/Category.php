<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $keyType = 'int'; //The "type" of the primary key ID

    public $incrementing = true; // Indicates if the IDs are auto-incrementing.

    const CREATED_AT = 'created_at'; //The name of the "created at" column.
    const UPDATED_AT = 'updated_at'; //The name of the "updated at" column.

    public $timestamps = true; //fales (default)

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
