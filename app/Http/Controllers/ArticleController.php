<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(6);

        return view('article.index', [
            'articles' => $articles
        ]);
    }
    /*
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('article.show', [
            'article' => Article::where('slug', $slug)->firstOrFail()
        ]);
    }
}
