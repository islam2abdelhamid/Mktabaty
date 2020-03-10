@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Users</h4>
                    <p class="card-category"> list of all our users</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table center">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    User Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Active
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
                                        Dakota Rice
                                    </td>
                                    <td>
                                        Dakota@niger.com
                                    </td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                            data-size="sm">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Minerva Hooper
                                    </td>
                                    <td>
                                        Minerva@niger.com
                                    </td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                            data-size="sm">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Sage Rodriguez
                                    </td>
                                    <td>
                                        Minerva@niger.com
                                    </td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                            data-size="sm">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection