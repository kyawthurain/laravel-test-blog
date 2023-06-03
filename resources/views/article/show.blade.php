@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    Article detail
                </h3>
                <div class=" mb-4 mt-3">
                    <a href="{{ route('article.create')}}" class=" btn btn-outline-dark me-2">
                        create new article
                    </a>

                    <a href="{{ route('article.index')}}" class=" btn btn-outline-dark">
                        view all article
                    </a>

                </div>
                <h3>
                    {{ $article->title }}
                </h3>
                <div>
                    {{ $article->description }}
                </div>
            </div>
        </div>
    </div>
@endsection


