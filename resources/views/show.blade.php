@extends('layouts.master')


@section('content')
    
                
    <div class=" mb-5">
        <h3 class=" card-title">
            {{ $article->title }}
        </h3>
            
            <div class=" mb-3">
                <span class=" badge bg-dark ">
                    {{ $article->category->title }}
                </span>
                <span class=" badge bg-dark">
                    {{ $article->created_at->format('d M Y') }}
                </span>
            </div>
            <p class=" mb-0">
                Author : {{ $article->user->name ?? 'unknown'}}
            </p>
            <p class=" mb-0">
                {{ $article->description }}
            </p>
    </div>
        
        @include('layouts.comments')
        
        


@endsection


