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
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                Les Miserables
                                            </td>
                                            <td>
                                                Victor Hugo
                                            </td>
                                            <td>
                                                Historical
                                            </td>
                                            <td>
                                                20
                                            </td>
                                            <td>
                                                9
                                            </td>
                                            <td>
                                                200 EP
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#bookModal">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>

                                        </tr>
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
                                <table class="table">

                                    <tbody>

                                        <tr>
                                            <td>
                                                title
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#categoryModal">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

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
                        <form>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Author</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group mt-4">
                                            <label class="bmd-label-floating" for="inputGroupSelect01">Category</label>
                                            <select class="custom-select form-control" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="1">Science Fiction</option>
                                                <option value="2">Historical</option>
                                                <option value="3">Literature</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Upload Picture</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input"
                                                id="inputGroupFile01">
                                            <label class="form-control custom-file-label" for="inputGroupFile01">Choose
                                                file</label>
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



        <!-- Begin Category Modal -->

        <div class="col-md-12 modal fade" role="dialog" id="categoryModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Category Form</h4>
                    </div>
                    <div class="card-body modal-body">
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category Name</label>
                                        <input type="text" class="form-control" name="name" />
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

    </div>
</div>
@endsection