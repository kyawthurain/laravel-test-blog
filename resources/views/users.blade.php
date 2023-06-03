@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class=" col-12 col-md-12">
                <h3>
                    Users
                </h3>
                <table class=" table table-bordered rounded">
                    <thead>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created time</th>
                    </thead>
                    <tbody>

                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $user->created_at->format('D m Y') }}

                                    </p>
                                    <p class=" small mb-0">
                                        <i class="bi bi-clock"></i>

                                        {{ $user->created_at->format('h:i a') }}

                                    </p>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    No data is here <br>
                                    <a href="{{route('article.create')}}">Go to add some!</a>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


