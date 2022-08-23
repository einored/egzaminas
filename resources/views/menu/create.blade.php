@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create menu</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('menus-store')}}" method="post">
                            <li>Restaurant</li>
                            <select class="form-control" name="create_menu_restaurant_id" required focus>
                                <option value="" disabled selected>Please select restaurant</option>
                                @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}">{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                            <li>Menu name</li>
                            <input type="text" class="form-control" name="create_menu_name" />
                            
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
