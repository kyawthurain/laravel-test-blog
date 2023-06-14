@extends('layouts.app')

@section('content')
    
{{-- <div class=" col-12 col-md-12"> --}}
                
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
        

{{-- </div> --}}

@endsection


