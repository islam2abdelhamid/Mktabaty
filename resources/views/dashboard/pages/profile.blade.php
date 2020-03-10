@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5" id="exampleModal">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">User Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" class="form-control">
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
</div>
@endsection