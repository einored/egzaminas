@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit restaurant</div>

                <div class="card-body">
                    @include('msg.main')
                    <ul>
                        <form action="{{route('restaurants-edit', $restaurant)}}" method="post">
                            <li>Restaurant name</li>
                            <input type="text" class="form-control" name="restaurant_name" value="{{old('restaurant_name', $restaurant->name)}}" />
                            <li>Restaurant code</li>
                            <input type="text" class="form-control" name="restaurant_code" value="{{old('restaurant_code', $restaurant->code)}}" />
                            <li>Restaurant address</li>
                            <input type="text" class="form-control" name="restaurant_address" value="{{old('restaurant_address', $restaurant->address)}}" />
                        
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
