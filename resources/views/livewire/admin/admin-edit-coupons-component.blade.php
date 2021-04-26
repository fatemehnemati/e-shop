<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-danger">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="editCoupon">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Coupon Code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="code">
                                @error('code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >Coupon Type</label>
                                <div class="col-md-4">
                                    <select class="form-control"  wire:model="type">
                                        <option value="">select</option>
                                        <option value="fixed">fixed</option>
                                        <option value="percent">percent</option>
                                    </select>
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >Coupon Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="value">
                                    @error('value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >Cart Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="cart_value">
                                    @error('cart_value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-danger">edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
