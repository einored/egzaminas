@extends('layouts.app')
@section('title', 'Order')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Do order</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('orders-store')}}" method="post">
                            {{-- <li>Restaurant</li>
                            <select class="form-control" name="create_order_restaurant_id" required focus>
                                <option value="" disabled selected>Please select restaurant</option>
                                @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}">{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                            <li>Menu</li>
                            <select class="form-control" name="create_order_menu_id" required focus>
                                <option value="" disabled selected>Please select menu</option>
                                @foreach($menus as $menu)
                                @if ($menu->restaurant_id == $restaurant->id)
                                    <option value="{{$menu->id}}">{{ $menu->name }}</option>
                                @endif                                
                                @endforeach
                            </select> --}}
                            <li>Dish</li>
                            <select class="form-control" name="create_order_dish_id" required focus>
                                <option value="" disabled selected>Please select dish</option>
                                @foreach($dishes as $dish)
                                <option value="{{$dish->id}}">{{ $dish->name }}</option>
                                @endforeach
                            </select>
                            <li>Count</li>
                            <input type="number" class="form-control" name="create_order_count" />
                            
                            @csrf
                            @method('post')
                            <button type="submit" class="button-top-margin btn btn-success btn-sm">Order</button>
                        </form>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
