<?php
namespace ANavallaSuiza\Laravel\Blog\Database\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Dimsav\Translatable\Translatable;

abstract class Tag extends EloquentModel
{
    use Translatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_tags';

    public $translatedAttributes = ['slug', 'name'];

    public function posts()
    {
        return $this->belongsToMany('ANavallaSuiza\Laravel\Blog\Database\Models\Post');
    }
}
