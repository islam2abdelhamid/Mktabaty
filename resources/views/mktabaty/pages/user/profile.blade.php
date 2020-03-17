@extends('mktabaty.layouts.single')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12" id="exampleModal">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit your profile</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("user.update",$user->id)}}"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf


                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">User Name</label>
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Upload Picture</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="form-control custom-file-input"
                                                id="inputGroupFile01">
                                            <label class="form-control custom-file-label" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection