@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    Edit article
                </h3>
                <form action="{{ route('article.update',$article->id) }}" method="post">

                    @csrf
                    @method('put')
                    <div class=" mb-3">
                        <label class=" form-label" for="">Title</label>
                        <input type="text"
                        class=" form-control @error('title') is-invalid @enderror "
                        name="title"
                        value="{{ old('title',$article->title) }}">
                        @error('title')
                            <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class=" form-label" for="">Category</label>
                        <select type="select"
                        class=" form-select @error('category') is-invalid @enderror "
                        name="category"
                        
                        >

                            @foreach (App\Models\Category::all() as $category)

                                <option value="{{ $category->id }}" {{ old('category',$article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}
                                </option>

                            @endforeach

                        </select>
                        @error('category')
                            <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class=" form-label" for="">Description</label>
                        <textarea name="description" id="" cols="10" rows="5" class=" form-control @error('description') is-invalid @enderror">{{ old('description',$article->description) }}</textarea>
                        @error('description')
                            <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                        <button class=" btn btn-dark">
                            Update article
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection
