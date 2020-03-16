@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#adminModal">Add
                    Admin</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title mt-0"> Admins</h4>
                        <p class="card-category"> List of all our Admins</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="">
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
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr id={{$user->id}}>
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
                                            <button type="button" rel="tooltip" title="Remove" onclick="deleteUser({{$user->id}})" class="btn btn-white btn-link btn-sm">
                                                <i class="material-icons">close</i>
                                            </button>
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

        <!-- Beginnig of modal  -->
        <div class="col-md-12 modal fade" role="dialog" id="adminModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="col-md-10 modal-content card">
                    <div class="card-header card-header-primary modal-header">
                        <h4 class="card-title">Admin Selection</h4>
                    </div>
                    <div class="card-body modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="input-group mt-4">
                                            <label class="bmd-label-floating" for="inputGroupSelect01">Select User To be
                                                Admin</label>
                                            <select class="custom-select form-control" style="color: #fff;
                                            border: 1px solid #aaa;
                                            background: #20293f;
                                            padding: 5px;" id="inputGroupSelect01">
                                                <option selected>User1</option>
                                                <option value="1">User2</option>
                                                <option value="2">User3</option>
                                                <option value="3">User3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- End of modal -->

    </div>
</div>
<script>
  function deleteUser(id) {
        var row = document.getElementById(id);
        row.parentNode.removeChild(row);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "deleteUser/" + id, true);
        xmlhttp.send();
  }
</script>
@endsection