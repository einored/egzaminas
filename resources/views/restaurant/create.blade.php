@extends('layouts.app')
@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Create restaurant</div>

                <div class="card-body">
                    @include('msg.main')

                    <ul>
                        <form action="{{route('restaurants-store')}}" method="post">
                            <li>Restaurant name</li>
                            <input type="text" class="form-control" name="create_restaurant_name" />
                            <li>Restaurant code</li>
                            <input type="text" class="form-control" name="create_restaurant_code" />
                            <li>Restaurant address</li>
                            <input type="text" class="form-control" name="create_restaurant_address" />
                            
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
