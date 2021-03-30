<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Manage Home categories
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
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Choose Category</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                        
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" >number of products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberOfProducts">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn" style="color:white;background:crimson">submit</button>
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
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e){
                var data=$('.sel_categories').select2("val");
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush