@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit menu</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('menus-edit', $menu)}}" method="post">
                            <li>Restaurant</li>
                            <select class="form-control" name="menu_restaurant_id" required focus>
                                @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}" {{old('menu_restaurant_id', $menu->restaurant_id)==$restaurant->id?'selected':''}}>{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                            <li>Menu name</li>
                            <input type="text" class="form-control" name="menu_name" value="{{old('menu_name', $menu->name)}}" />
                            
                            @csrf
                            @method('put')
                            <button type="submit" class="button-top-margin btn btn-success btn-sm">Edit</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
