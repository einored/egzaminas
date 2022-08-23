@extends('layouts.app')
@section('title', 'Dishes')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Dish list</div>
                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Menu name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                @if(Auth::user()->role > 9)
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        @forelse($dishes as $dish)
                        <tr>
                            <td>{{$dish->id}}</td>
                            <td>{{$dish->menu->name}}</td>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->description}}</td>
                            <td class="image-box">
                                @if($dish->image)
                                <img src="{{$dish->image}}">
                                @endif
                            </td>
                            @if(Auth::user()->role > 9)
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('dishes-edit', $dish->id)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('dishes-delete', $dish->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                            </form>
                            </td>
                            @endif
                        </tr>

                        @empty
                        <li>No menus...</li>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
