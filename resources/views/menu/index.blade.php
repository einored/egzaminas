@extends('layouts.app')
@section('title', 'Menus')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Menu list</div>
                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Restaurant</th>
                                <th scope="col">Name</th>
                                @if(Auth::user()->role > 9)
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        @forelse($menus as $menu)
                        <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->restaurant->name}}</td>
                            {{-- <td>{{$menu->restaurant_id}}</td> --}}
                            <td>{{$menu->name}}</td>
                            @if(Auth::user()->role > 9)
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('menus-edit', $menu->id)}}">Edit</a>
                            </td>
                            <td>
                                <form class="delete" action="{{route('menus-delete', $menu)}}" method="post">
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
