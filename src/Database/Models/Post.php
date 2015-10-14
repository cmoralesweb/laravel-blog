<?php
namespace ANavallaSuiza\Laravel\Blog\Database\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Dimsav\Translatable\Translatable;

abstract class Post extends EloquentModel
{
    use Translatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    public $translatedAttributes = ['slug', 'title', 'intro', 'body'];

    public function author()
    {
        return $this->belongsTo('ANavallaSuiza\Laravel\Blog\Database\Models\Author');
    }

    public function category()
    {
        return $this->belongsTo('ANavallaSuiza\Laravel\Blog\Database\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('ANavallaSuiza\Laravel\Blog\Database\Models\Tag');
    }
    
    public function media()
    {
        return $this->hasMany('ANavallaSuiza\Laravel\Blog\Database\Models\PostMedia', 'blog_post_id');
    }
}
