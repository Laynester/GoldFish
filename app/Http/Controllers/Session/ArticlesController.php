<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\News;

class ArticlesController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->latest('date')
            ->paginate(5);

        return view('community.articles', [
                'group' => 'community',
                'news' => $news
            ]
        );
    }

    public function show(News $article)
    {
        $otherArticles = News::query()
            ->select('id', 'caption')
            ->where('id', '!=', $article->id)
            ->latest('id')
            ->get();

        return view('community.article', [
            'group' => 'community',
            'article' => $article,
            'otherArticles' => $otherArticles,
        ]);
    }
}
