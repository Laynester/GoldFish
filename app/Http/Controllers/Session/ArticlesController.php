<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\News;

class ArticlesController extends Controller
{
    public function index()
    {
        $news = News::orderBy('date', 'DESC')->paginate(5);

        return view('community.articles', [
                'group' => 'community',
                'news' => $news
            ]
        );
    }

    public function show(News $article)
    {
        $otherArticles = News::select('id', 'caption')->where('id', '!=', $article->id)->orderByDesc('id')->get();

        return view('community.article', [
            'group' => 'community',
            'article' => $article,
            'otherArticles' => $otherArticles,
        ]);
    }
}
