@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    @if(session()->get('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div><br />
    @endif
    <div class="col-md-10 modal-content card">
        <div class="card-header card-header-primary modal-header">
            <h4 class="card-title">Category Form</h4>
        </div>

        <div class="card-body modal-body">

            <form method="post" action="{{ route('category.update',$category->id)}}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="bmd-label-floating">Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}" />

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
@endsection