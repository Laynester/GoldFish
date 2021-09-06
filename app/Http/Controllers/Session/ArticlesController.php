<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\News;

class ArticlesController extends Controller
{
    public function index()
    {
        $news = News::orderBy('date', 'DESC')->paginate(5);
        return view('pages.community.articles', [
                'group' => 'community',
                'news' => $news
            ]
        );
    }

    public function show(News $article)
    {
        $recentArticles = News::select('id', 'caption')->where('id', '!=', $article->id)->orderByDesc('id')->get();

        return view('pages.community.article', [
            'group' => 'community',
            'article' => $article,
            'recentArticles' => $recentArticles,
        ]);
    }
}
