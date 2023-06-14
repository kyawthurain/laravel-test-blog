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
    <div>
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
