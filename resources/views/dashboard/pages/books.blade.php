@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#bookModal">Add
                        Book</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Books</h4>
                            <p class="card-category"> list of all our books</p>
                        </div>
                        <div class="card-body">
                            @if(session()->get('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div><br />
                            @endif

                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Author
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Available
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                        <tr>
                                            <td>
                                                {{$book->id}}
                                            </td>
                                            <td>
                                                {{$book->title}}
                                            </td>
                                            <td>
                                                {{$book->auther}}
                                            </td>
                                            <td>
                                                {{$book->categorie_id}}
                                            </td>
                                            <td>
                                                {{$book->quantity}}
                                            </td>
                                            <td>
                                                {{$book->avaliable}}
                                            </td>
                                            <td>
                                                {{$book->price}}
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                data-title={{$book->title}} data-auther={{$book->auther}}
                                                data-category={{$book->categorie_id}} data-quantity={{$book->quantity}}
                                                data-avaliable={{$book->avaliable}} data-price={{$book->price}}
                                                data-id={{$book->id}} data-image={{$book->image}}
                                                data-target="#bookModalUpdate">Edit</button>

                                                <form action="{{ url('books/'.$book->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div><br />
                                @endif
                                <table class="table">

                                    <tbody>
                                    @foreach ($categories as $category)

                                        <tr>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#editcat" >Edit</button>

                                                    {{-- <br> --}}
                                                    <form action="{{ route('cat.destroy', $category->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                <button type ="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#categoryModal">Add
                        Category</button>
                </div>
            </div>
        </div>

        <!-- Begin Book Form Modal-->
        <div class="col-md-12 modal fade" role="dialog" id="bookModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Book Form</h4>
                    </div>
                    <div class="card-body modal-body">
                        <form method="POST" action="{{ url('books/') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Author</label>
                                        <input type="text" class="form-control" name="auther">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group mt-4">
                                            <label class="bmd-label-floating" for="inputGroupSelect01">Category</label>
                                            <select class="custom-select form-control" id="inputGroupSelect01"  name="category">
                                                <option value="">Choose...</option>
                                                <option value="Science Fiction">Science Fiction</option>
                                                <option value="Historical">Historical</option>
                                                <option value="Literature">Literature</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Upload Picture</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input" id="inputGroupFile01" name="image">
                                            <label class="form-control custom-file-label" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Book Form Modal-->

        <!-- Begin Book Update Form Modal-->
        <div class="col-md-12 modal fade" role="dialog" id="bookModalUpdate">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Update Book Form</h4>
                    </div>
                    <div class="card-body modal-body">
                        <form id="updateForm" method="POST"  action="{{ url('books', 'update') }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID</label>
                                        <input type="text" class="form-control" name="id" id="id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Author</label>
                                        <input type="text" class="form-control" name="auther" id="auther">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group mt-4">
                                            <label class="bmd-label-floating" for="inputGroupSelect01">Category</label>
                                            <select class="custom-select form-control" id="inputGroupSelect01"  name="category" id="category">
                                                <option value="">Choose...</option>
                                                <option value="Science Fiction">Science Fiction</option>
                                                <option value="Historical">Historical</option>
                                                <option value="Literature">Literature</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="text" class="form-control" name="price" id="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" id="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">avaliable</label>
                                        <input type="number" class="form-control" name="avaliable" id="avaliable">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Upload Picture</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input" id="inputGroupFile01" name="image">
                                            <label class="form-control custom-file-label" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Book Form Modal-->



        <!-- Begin Category Modal -->

        <div class="col-md-12 modal fade" role="dialog" id="categoryModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Category Form</h4>
                    </div>

                    <div class="card-body modal-body">
                        {{-- @if (!isset($category->id))

                        <form method="post" action="{{ route('cat.update',$category->id)}}">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-primary pull-right">Edit</button>

                        @else --}}

                        <form method="post" action="{{ route('cat.store') }}">

                            @csrf
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT"> --}}

                        {{-- @endif --}}

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Name</label>
                                        <input type="text" class="form-control"name="name"  />

                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Category Modal -->

        <div class="col-md-12 modal fade" role="dialog" id="editcat">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Category Form</h4>
                    </div>

                    <div class="card-body modal-body">

                        <form method="post" action="{{ route('cat.update',$category->id)}}">
                            @csrf
                            @method('PATCH')




                            @csrf

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Name</label>
                                        <input type="text" class="form-control"name="name" value="{{$category->name}}" />

                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary pull-right">Edit</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
