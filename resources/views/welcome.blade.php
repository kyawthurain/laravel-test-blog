@extends('layouts.master')

@section('content')
    
            
                        <div class=" d-flex justify-content-between">
                            @if (request()->has('keyword'))
                            <p>
                                Show results by '{{ request()->keyword }}'
                            </p>
                            <a href="{{ route('index') }}" class=" text-dark">
                                Clear result
                            </a>
                            @endif
                        </div>
                        @forelse ($articles as $article)
                        <div class=" card p-2 mb-3">

                            <div class=" card-body">
                                <h3 class=" card-title">
                                    {{ $article->title }}
                                </h3>
                                
                                    <div class=" mb-3">
                                        <span class=" badge bg-dark ">
                                            {{ $article->category->title ?? 'Unknown' }}
                                        </span>
                                        <span class=" badge bg-dark">
                                            {{ $article->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                    <p class=" mb-0">
                                        Author : {{ $article->user->name ?? 'Anonymous' }}
                                    </p>
                                    <p class=" mb-3">
                                        {{ Str::words($article->description, 50, '...') }}
                                    </p>
                                    <a href="{{ route('showPublic',$article->slug) }}" class=" btn btn-dark ">
                                        Read More
                                    </a>
                            </div>
                        </div>
                        @empty
                        <div class=" card p-2 mb-3">

                            <div class=" card-body text-center">
                                <h3 class=" card-title">
                                    There is no article
                                </h3>
                                <p class=" mb-3">You can create articles with your own account</p>
                                <a href="{{ route('article.create') }}" class=" btn btn-sm btn-outline-dark">
                                    create here
                                </a>
                            </div>
                        </div>
                        @endforelse
                        {{ $articles->onEachSide(1)->links() }}
                
            
@endsection