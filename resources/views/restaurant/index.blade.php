@extends('layouts.app')
@section('title', 'Restaurants')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Restaurant list</div>
                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Address</th>
                                @if(Auth::user()->role > 9)
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        @forelse($restaurants as $restaurant)
                        <tr>
                            <td>{{$restaurant->id}}</td>
                            <td>{{$restaurant->name}}</td>
                            <td>{{$restaurant->code}}</td>
                            <td>{{$restaurant->address}}</td>

                            @if(Auth::user()->role > 9)
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('restaurants-edit', $restaurant)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('restaurants-delete', $restaurant)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                            </form>
                            </td>
                            @endif

                        </tr>

                        @empty
                        <li>No restaurants...</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
