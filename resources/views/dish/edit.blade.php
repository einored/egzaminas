@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit dish</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('dishes-edit', $dish)}}" method="post" enctype="multipart/form-data">
                            <li>Menu</li>
                            <select class="form-control" name="dish_menu_id" required focus>
                                @foreach($menus as $menu)
                                <option value="{{$menu->id}}" {{old('dish_menu_id', $dish->menu_id)==$menu->id?'selected':''}}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                            <li>Dish name</li>
                            <input type="text" class="form-control" name="dish_name" value="{{old('dish_name', $dish->name)}}" />
                            <li>Dish description</li>
                            <input type="text" class="form-control" name="dish_description" value="{{old('dish_description', $dish->description)}}" />
                            <li>Image</li>
                            @if($dish->image)
                            <div class="image-box">
                                <img src="{{$dish->image}}">
                            </div>
                            @endif
                            <input class="form-control" type="file" name="dish_image" />
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
