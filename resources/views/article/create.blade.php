@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    Create Article
                </h3>
                <form action="{{ route('article.store') }}" method="post">

                    @csrf

                    <div class=" mb-3">
                        <label class=" form-label" for="">Title</label>
                        <input type="text"
                        class=" form-control @error('title') is-invalid @enderror "
                        name="title">
                        @error('title')
                            <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class=" form-label" for="">Description</label>
                        <textarea name="description" id="" cols="10" rows="5" class=" form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                        <button class=" btn btn-dark">
                            Save Article
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection
