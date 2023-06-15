
<div class=" position-sticky" style="top:70px;" >
    <div>
        <p class=" mb-1">
            Article search
        </p>
        <div class=" search-form mb-3">
            <form action="">
               <div class=" input-group">
                <input type="text" class=" form-control" name="keyword" value="{{ request()->keyword }}">
                <button class=" btn btn-dark"><i class=" bi bi-search"></i></button>
               </div>
            </form>
        </div>
    </div>
    <div class=" categories mb-3">
        <p class=" mb-1">
            Article categories
        </p>
        <div class=" list-group">
            <a href="{{ route('index') }}" class=" list-group-item list-group-item-action">
                All categories
            </a>
            @foreach (App\Models\Category::all() as $category)
                <a href="{{ route('category',$category->slug) }}" class=" list-group-item list-group-item-action">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
    </div>

    <div class=" recent-articles mb-3">
        <p class=" mb-1">
            Recent articles
        </p>
        <div class=" list-group">
            @foreach (App\Models\Article::latest('id')->limit(5)->get() as $article)
                <a href="{{ route('showPublic',$article->slug) }}" class=" list-group-item list-group-item-action">
                    {{ $article->title }}
                </a>
            @endforeach
        </div>
    </div>
</div>