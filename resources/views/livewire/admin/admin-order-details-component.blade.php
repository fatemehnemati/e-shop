<div class="container" style="padding:30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    <div class="row">
                        <div class="col-md-6">
                            order items
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.orders')}}" class="btn btn-danger pull-right">Add orders</a>
                        </div>
                    </div>
                </div>
                <div class="panel_body">
                    <table class="table">
                        <th>order id</th>
                        <td>{{ $order->id }}</td>
                        <th>order date</th>
                        <td>{{ $order->created_at }}</td>
                        <th>order status</th>
                        <td>{{ $order->status }}</td>
                        @if($order->status == "delivered")
                        <th>delivering details</th>
                        <td>{{ $order->delivered_date }}</td>
                        @elseif ($order->status == "canceled")
                        <th>canceling details</th>
                        <td>{{ $order->canceled }}</td>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    <div class="row">
                        <div class="col-md-6">
                            order items
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.orders')}}" class="btn btn-danger pull-right">Add orders</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="wrap-iten-in-cart">                            
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach ($order->orderItem as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{ route('product.details',['slug'=>$item->product->slug]) }}">{{ $item->product->name }}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">${{ $item->price }}</p></div>
                                <div class="quantity">
                                    <h5>{{ $item->quantity }}</h5>
                                </div>
                                <div class="price-field sub-total"><p class="price">${{ $item->price * $item->quantity }}</p></div>
                                
                            </li>
                            @endforeach                            
                        </ul>
                        
                    </div>
        
                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">Order Summary</h4>
                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ $order->subtotal }}</b></p>
                            <p class="summary-info"><span class="title">Tax</span><b class="index">${{ $order->tax }}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{ $order->total }}</b></p>
                            
                        </div>
                    </div>  
        
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    billing details
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table_striped">
                        <tr>
                            <th>first name</th>
                            <td>{{ $order->firstName }}</td>
                            <th>last name</th>
                            <td>{{ $order->lastName }}</td>
                        </tr>

                        <tr>
                            <th>phone</th>
                            <td>{{ $order->mobile }}</td>
                            <th>email</th>
                            <td>{{ $order->email }}</td>
                        </tr>

                        <tr>
                            <th>line1</th>
                            <td>{{ $order->line1 }}</td>
                            <th>line2</th>
                            <td>{{ $order->line2 }}</td>
                        </tr>

                        <tr>
                            <th>city</th>
                            <td>{{ $order->city }}</td>
                            <th>province</th>
                            <td>{{ $order->province }}</td>
                        </tr>

                        <tr>
                            <th>country</th>
                            <td>{{ $order->country }}</td>
                            <th>zipeCode</th>
                            <td>{{ $order->zipCode }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        @if($order->is_shipping_diffrent)
        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    <div class="row">
                        <div class="col-md-6">
                            shipping details
                        </div>
                        <div class="col-md-6">
                            {{-- <a href="{{ route('admin.addproducts')}}" class="btn btn-danger pull-right">Add Product</a> --}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table_striped">
                        <tr>
                            <th>first name</th>
                            <td>{{ $order->shipping->firstName }}</td>
                            <th>last name</th>
                            <td>{{ $order->shipping->lastName }}</td>
                        </tr>

                        <tr>
                            <th>phone</th>
                            <td>{{ $order->shipping->mobile }}</td>
                            <th>email</th>
                            <td>{{ $order->shipping->email }}</td>
                        </tr>

                        <tr>
                            <th>line1</th>
                            <td>{{ $order->shipping->line1 }}</td>
                            <th>line2</th>
                            <td>{{ $order->shipping->line2 }}</td>
                        </tr>

                        <tr>
                            <th>city</th>
                            <td>{{ $order->shipping->city }}</td>
                            <th>province</th>
                            <td>{{ $order->shipping->province }}</td>
                        </tr>

                        <tr>
                            <th>country</th>
                            <td>{{ $order->shipping->country }}</td>
                            <th>zipeCode</th>
                            <td>{{ $order->shipping->zipCode }}</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
        @endif

        <div class="col-md-12">
            <div class="panel panel_default">
                <div class="panel_heading">
                    <div class="row">
                        <div class="col-md-6">
                            transaction details
                        </div>
                        <div class="col-md-6">
                            {{-- <a href="{{ route('admin.addproducts')}}" class="btn btn-danger pull-right">Add Product</a> --}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table_striped">
                        <tr>
                            <th>transaction mode</th>
                            <td>{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th>status</th>
                            <td>{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th>transaction date</th>
                            <td>{{ $order->transaction->created_at }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>