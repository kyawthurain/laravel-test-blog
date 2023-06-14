@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    View Article
                </h3>
                <div class=" mb-4 mt-3">
                    <a href="{{ route('article.create') }}" class=" btn btn-outline-dark">
                        create new article
                    </a>
                </div>
                <table class=" table">
                    <thead class="">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        @can('admin-only')
                        <th>Author</th>
                        @endcan
                        <th>Action</th>
                        <th>Created time</th>
                        <th>Updated time</th>
                    </thead>
                    <tbody>

                        @forelse ($articles as $article)
                        
                            <tr>
                                <td>
                                    {{ $article->id }}
                                </td>
                                <td>
                                    {{ $article->title }}
                                    <br>
                                    <span class=" small text-black-50">

                                        {{ Str::limit($article->description, 20, '...') }}

                                    </span>
                                </td>
                                <td>
                                    {{ $article->category->title ?? 'unknown' }}
                                </td>
                                @can('admin-only')
                                <td>
                                    {{ ($article->user->name ?? 'anonymous') }}
                                </td>
                                @endcan
                                <td>
                                    <div class=" btn btn-group">

                                        <a href="{{ route('article.show', $article->id) }}"
                                            class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-question-lg"></i>
                                        </a>
                                        @can('update', $article)
                                            <a href="{{ route('article.edit', $article->id) }}"
                                                class=" btn btn-sm btn-outline-dark">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                        @endcan
                                        @can('delete', $article)
                                        <button form="articleDeleteForm{{ $article->id }}"
                                            class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                        
                                        @endcan
                                    </div>
                                    <form id="articleDeleteForm{{ $article->id }}" class=" d-inline-block"
                                        action="{{ route('article.destroy', $article->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->created_at->format('D m Y') }}

                                    </p>
                                    <p class=" small mb-0">
                                        <i class="bi bi-clock"></i>

                                        {{ $article->created_at->format('h:i a') }}

                                    </p>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->updated_at->format('D m Y') }}

                                    </p>
                                    <p class=" small mb-0">
                                        <i class="bi bi-clock"></i>

                                        {{ $article->updated_at->format('h:i a') }}

                                    </p>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class=" text-center">
                                    No data is here <br>
                                    <a href="{{ route('article.create') }}">Go to add some!</a>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $articles->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
