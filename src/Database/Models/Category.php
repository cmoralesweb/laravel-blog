<?php
namespace ANavallaSuiza\Laravel\Blog\Database\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Dimsav\Translatable\Translatable;

abstract class Category extends EloquentModel
{
    use Translatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_categories';

    public $translatedAttributes = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany('ANavallaSuiza\Laravel\Blog\Database\Models\Post');
    }
}
