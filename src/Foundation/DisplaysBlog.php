<?php
namespace ANavallaSuiza\Laravel\Blog\Foundation;

use ANavallaSuiza\Laravel\Blog\Database\Models\Post;

trait DisplaysBlog
{
    /**
     * The index view template.
     *
     * @var string
     */
    protected $indexView;

    /**
     * The single view template.
     *
     * @var string
     */
    protected $singleView;

    /**
     * Show the blog posts list.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $posts = Post::all();

        return view($this->indexView, compact('posts'));
    }

    /**
     * Show a blog post detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSingle($id, $slug)
    {
        $post = Post::findOrFail($id);

        return view($this->singleView, compact('post'));
    }
}
