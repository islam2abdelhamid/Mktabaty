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
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->username}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            <input type="checkbox"  {{$user->isActive?'checked':''}} data-toggle="toggle" data-onstyle="success"
                                                data-size="sm">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No users</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection