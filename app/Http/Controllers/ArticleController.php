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
        $articles = Article::latest()
            ->paginate(3);

        return view('welcome', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $fileName,
            'category_id' => $request->category,
            'tags' => $request->tags,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dummyData()
    {
        return [
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ];
    }
}
