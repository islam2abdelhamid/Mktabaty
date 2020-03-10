@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
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
                                                Science Fiction
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#categoryModal">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Historical
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#categoryModal">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Religious
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
    </div>
</div>
@endsection