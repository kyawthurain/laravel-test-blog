@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    View Categories
                </h3>
                <div class=" mb-4 mt-3">
                    <a href="{{ route('category.create')}}" class=" btn btn-outline-dark">
                        create new category
                    </a>
                </div>
                <table class=" table table-bordered rounded">
                    <thead>
                        <th>Id</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Created time</th>
                        <th>Updated time</th>
                    </thead>
                    <tbody>

                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->title }}
                                    <br>
                                    <span class=" small text-black-50">

                                        {{ Str::limit($category->description, 20, '...') }}

                                    </span>
                                </td>
                                <td>
                                    {{$category->user_id}}
                                </td>
                                <td>
                                    <div class=" btn btn-group">

                                        <a href="{{ route('category.edit',$category->id) }}" class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button form="categoryDeleteForm{{$category->id}}" class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                    <form id="categoryDeleteForm{{$category->id}}" class=" d-inline-block" action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->created_at->format('D m Y') }}

                                    </p>
                                    <p class=" small mb-0">
                                        <i class="bi bi-clock"></i>

                                        {{ $category->created_at->format('h:i a') }}

                                    </p>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->updated_at->format('D m Y') }}

                                    </p>
                                    <p class=" small mb-0">
                                        <i class="bi bi-clock"></i>

                                        {{ $category->updated_at->format('h:i a') }}

                                    </p>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    No data is here <br>
                                    <a href="{{route('category.create')}}">Go to add some!</a>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                </table>
                {{ $categories->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection


