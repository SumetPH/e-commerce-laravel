@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->exists('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
            @elseif(session()->exists('failure'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('failure')}}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @foreach ($orders as $order)
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order #{{ $order->id }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th width="20%">
                                        Image
                                    </th>
                                    <th width="35%">
                                        Title
                                    </th>
                                    <th width="15%">
                                        Price
                                    </th>
                                    <th width="15%">
                                        Quantity
                                    </th>
                                    <th width="15%">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                <tr>
                                    <td>
                                        <img class="img-fluid" width="100px" src="/upload/{{ $product->image }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('web.product.show',['id' => $product->product_id]) }}">
                                            {{ $product->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        {{ $product->price * $product->quantity }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <p>Total : {{ $order->total }}</p>
                            <p>Buyer : {{ $order->user->name }}</p>
                            <p>Date : {{ $order->created_at }}</p>
                            @if($order->payment_completed)
                            <a class=" btn btn-primary btn-sm" href="/upload/{{ $order->transfer_slip }}"
                                target="_blank">Transfer slip</a>
                            @endif
                            <a class=" btn btn-success btn-sm" onclick="return confirm('Wolud you link to confirm it?')"
                                href="{{ route('admin.payment_confirm', ['id' => $order->id]) }}">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection