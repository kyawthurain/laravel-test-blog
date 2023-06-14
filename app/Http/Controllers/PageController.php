<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::when(request()->has("keyword"), function ($query) {
            $query->where(function (Builder $builder) {
                $keyword = request()->keyword;
                $builder->where("title", "like", "%" . $keyword . "%");
                $builder->orWhere("description", "like", "%" . $keyword . "%");
            });
        })
            ->when(request()->has('category'),function($query){
                $query->where("category_id",request()->category);
            })
            ->when(request()->has('title'), function ($query) {
                $sortType = request()->title ?? 'asc';
                $query->orderBy("title", $sortType);
            })
            // ->dd()
            ->latest("id")
            ->paginate(10)->withQueryString();

        return view("welcome", compact('articles'));
    }

    public function showPublic($slug)
    {
        $article = Article::where('slug',$slug)->firstOrFail();
        return view('show',compact('article'));
    }

    public function category($slug)
    {
        $categories = Category::where('slug',$slug)->firstOrFail();
        return view('category',[
            'category' => $categories,
            "articles" => $categories->articles()->when(request()->has("keyword"), function ($query) {
                $query->where(function (Builder $builder) {
                    $keyword = request()->keyword;
                    $builder->where("title", "like", "%" . $keyword . "%");
                    $builder->orWhere("description", "like", "%" . $keyword . "%");
                });
            })->paginate(10)->withQueryString(),
        ]);
    }
}
