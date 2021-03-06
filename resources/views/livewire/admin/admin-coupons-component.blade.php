<div>
    {{-- <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style> --}}
   <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Coupons
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcoupons') }}" class="btn btn-danger pull-right text-center">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Coupon Code</th>
                                <th>Coupon type</th>
                                <th>Coupon Value</th>
                                <th>Cart type</th>
                                <th>expiry date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->type }}</td>
                                    @if($coupon->type == 'fixed')
                                    <td>{{ $coupon->value }}</td>
                                    @else
                                    <td>{{ $coupon->value }}%</td>
                                    @endif
                                    <td>{{ $coupon->cart_value }}</td>
                                    <td>{{ $coupon->expiry_date }}</td>

                                    <td>
                                       <a href="{{ route('admin.editcoupons',['coupon_id'=>$coupon->id]) }}"><i class="fa fa-edit fa-2x text-primary"></i></a>
                                        <a href="#" onclick="confirm('are you sure you want to delte this coupon?') || event.stopimmediatepropagation()" wire:click.prevent="deleteCoupon({{ $coupon->id }})"><i class="fa fa-times fa-2x text-danger" style="margin-left:10px"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>   
                        

                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            {{-- {{ $categories->links() }} --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
   </div>
</div>

