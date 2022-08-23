@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create dish</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('dishes-store')}}" method="post" enctype="multipart/form-data">
                            <li>Menu</li>
                            <select class="form-control" name="create_dish_menu_id" required focus>
                                <option value="" disabled selected>Please select menu</option>
                                @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                            <li>Dish name</li>
                            <input type="text" class="form-control" name="create_dish_name" />
                            <li>Dish description</li>
                            <input type="text" class="form-control" name="create_dish_description" />
                            <li>Dish image</li>
                            <input type="file" class="form-control" name="create_dish_image" />
                            @csrf
                            @method('post')
                            <button type="submit" class="button-top-margin btn btn-success btn-sm">Create</button>
                        </form>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
