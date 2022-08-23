@extends('layouts.app')
@section('title', 'Restaurants')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Restaurant list</div>
@if(Auth::user()->role > 9)
                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Address</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        @forelse($restaurants as $restaurant)
                        <tr>
                            <td>{{$restaurant->id}}</td>
                            <td>{{$restaurant->name}}</td>
                            <td>{{$restaurant->code}}</td>
                            <td>{{$restaurant->address}}</td>
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
                        </tr>

                        @empty
                        <li>No restaurants...</li>
                        @endforelse
                    </table>
                </div>
@endif
            </div>
        </div>
    </div>
</div>
@endsection
