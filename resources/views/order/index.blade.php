@extends('layouts.app')
@section('title', 'Orders')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Order list</div>
@if(Auth::user()->role > 9)
                <div class="card-body">
                    @include('msg.main')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Order id</th>
                                <th scope="col">Dish name</th>
                                <th scope="col">Count</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">Confirm</th>
                                <th scope="col">Cancel</th>
                            </tr>
                        </thead>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->dish->name}}</td>
                            <td>{{$order->count}}</td>
                            <td>{{$order->user->name}}</td>
                            {{-- <td>{{$order->status}} --}}
                            <td>
                            @if($order->status == 0)
                                Pending...
                            @elseif($order->status == 1)
                                Confirmed
                            @else
                                Canceled
                            @endif
                            </td>
                            <td>
                                <form action="{{route('order-confirm', $order)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="button-top-margin btn btn-success btn-sm">Confirm</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('order-cancel', $order)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="button-top-margin btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <li>No orders...</li>
                        @endforelse
                    </table>
                </div>
@endif
            </div>
        </div>
    </div>
</div>
@endsection
