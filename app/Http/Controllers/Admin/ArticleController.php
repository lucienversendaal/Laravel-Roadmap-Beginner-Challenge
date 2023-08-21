<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::whereUserId(Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.article.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create', [
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);

        //store tags as string
        // $tags = explode(',',);

        rd($request->all());
        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image_url' => $fileName,
            'tag_ids' => $request->tags,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('admin.articles.index');
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
    public function edit($article)
    {

        $article = Article::where('user_id', Auth::user()->id)->findOrFail($article);
        $tags = collect($article->tags)->implode(', ');

        return view('admin.article.edit', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get(),
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //get the new image
        if ($request->hasFile('image')) {
            $this->updateArticleImage($article, $request->file('image'));
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category,
            'tags' => $request->tags,
        ]);

        return redirect()->route('admin.articles.index');
    }

    private function updateArticleImage(Article $article, $image)
    {
        Storage::delete('public/images/' . $article->image_url);

        $fileName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $fileName);

        $article->update([
            'image_url' => $fileName
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //get logged in user function
    private function getUser()
    {
        return Auth::user();
    }
}
