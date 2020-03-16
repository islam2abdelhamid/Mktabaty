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
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <form method="POST" action="{{ route('addAdmin') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="bmd-label-floating">{{ __('Name') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="username" class="bmd-label-floating">{{ __('Username') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        
                                                        @error('username')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="image" class="bmd-label-floating">{{ __('image') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="image" type="file" class="file-upload" name="image">
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-12 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Add') }}
                                                        </button>
                                                    </div>
                                               
                                            </form>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
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