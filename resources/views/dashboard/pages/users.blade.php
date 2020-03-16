@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Users</h4>
                    <p class="card-category"> list of all our users</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
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
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" {{$user->isActive?'checked':''}}
                                                    type="checkbox" id="inlineCheckbox1"
                                                    onclick="changeState({{$user->id}})" value="option1">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" rel="tooltip" title="Remove"
                                            onclick="deleteUser({{$user->id}})" class="btn btn-white btn-link btn-sm">
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
</div>
@endsection
<script>
    function changeState(id) {
        //alert(id);
        //var row = document.getElementById(id);
        //row.parentNode.removeChild(row);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "change/" + id, true);
        xmlhttp.send();
  }
  function deleteUser(id) {
        var row = document.getElementById(id);
        row.parentNode.removeChild(row);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "deleteUser/" + id, true);
        xmlhttp.send();
  }
</script>