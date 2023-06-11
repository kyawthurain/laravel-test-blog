@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    Create category
                </h3>
                <form action="{{ route('category.store') }}" method="post">

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

                        <button class=" btn btn-dark">
                            Save Category
                        </button>

                        <a href="{{ route('category.index') }}" class=" btn btn-outline-dark">
                            Cancel
                        </a>
                </form>
            </div>
        </div>
    </div>
@endsection
