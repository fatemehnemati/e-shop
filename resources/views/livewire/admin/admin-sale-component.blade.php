<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Sale Setting
                            </div>
                            {{-- <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn" style="color:white;background:red">All Categories</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">inactive</option>
                                        <option value="1">active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" id="sale-date" placeholder="yyyy/mm/dd h:m:s" wire:model="sale_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-danger">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            $('#sale-date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
            .on('dp.change',function(ev){
                var data =$('#sale-date').val();
                @this.set('sale_date',data);
            });
        });
    </script>
@endpush