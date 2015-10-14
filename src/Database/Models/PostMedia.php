<?php

namespace ANavallaSuiza\Laravel\Blog\Database\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class PostMedia extends EloquentModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_post_media';

    public function post()
    {
        return $this->belongsTo('ANavallaSuiza\Laravel\Blog\Database\Models\Post', 'blog_post_id', 'id');
    }
}
