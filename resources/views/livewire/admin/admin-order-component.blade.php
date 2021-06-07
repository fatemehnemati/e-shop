<div class="container" style="padding:30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Orders
                        </div>
                        <div class="col-md-6">
                            {{-- <a href="{{ route('admin.addproducts')}}" class="btn btn-danger pull-right">Add Product</a> --}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                    <table class="table table_striped">
                        <thead>
                            <tr>
                                <th>order ID</th>
                                <th>subtotal</th>
                                <th>discount</th>
                                <th>tax</th>
                                <th>total</th>
                                <th>firstName</th>
                                <th>lastName</th>
                                <th>mobile</th>
                                <th>email</th>
                                <th>zip_code</th>
                                <th>status</th>
                                <th>order date</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->discount }}</td>
                                <td>{{ $order->tax }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->firstName }}</td>
                                <td>{{ $order->lastName }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->zipCode }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.orderdetails',['order_id' => $order->id])}}" class="btn btn-danger">details</a>
                                </td>
                                <td>
                                    <div class="drowpdown">
                                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                status <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">delivered</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">enabled</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            {{ $orders->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
