<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products')}}" class="btn btn-danger pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label" >Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea type="text" id="short_description" class="form-control input-md" wire:model="short_description"></textarea>
                                    @error('short_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea type="text" id="description" class="form-control input-md" wire:model="description"></textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >regular_price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="regular_price">
                                    @error('regular_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >sale_price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="sale_price">
                                    {{-- @error('sale_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="SKU">
                                    @error('SKU')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >stock_status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">instock</option>
                                        <option value="outofstock">outofstock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >features</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">none</option>
                                        <option value="1">yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >quantity</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="quantity">
                                    @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120">
                                        @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                        @else
                                        <img src="{{  asset('assets/images/products')}}/{{ $image }}" width="120">
                                    
                                    @endif
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" >select category</label>
                                <div class="col-md-4">
                                    <select class="form-control"  wire:model="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-danger text-center" type="submit">update</button>
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
            tinymce.init({
                selector: '#short_description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data)
                    });
                }
            })
        });
        $(function(){
            tinymce.init({
                selector: '#description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var data = $('#description').val();
                        @this.set('description',data)
                    });
                }
            })
        });
    </script>
@endpush