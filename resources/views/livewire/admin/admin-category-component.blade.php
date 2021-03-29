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
                            All Categories
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategories') }}" class="btn btn-danger pull-right text-center">Add New</a>
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
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.editcategories',['category_slug'=>$category->slug]) }}"><i class="fa fa-edit fa-2x text-primary"></i></a>
                                        <a href="#" onclick="confirm('are you sure you want to delte this category?') || event.stopimmediatepropagation()" wire:click.prevent="deleteCategory({{ $category->id }})"><i class="fa fa-times fa-2x text-danger" style="margin-left:10px"></i></a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>   
                        

                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            {{ $categories->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
   </div>
</div>

