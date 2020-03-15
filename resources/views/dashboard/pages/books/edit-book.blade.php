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
    <div class=" modal-content card">
        <div class="card-header card-header-primary modal-header">
            <h4 class="card-title">Update Book Form</h4>

        </div>
        <div class="card-body modal-body">
            <form id="updateForm" method="POST" action="{{ route("books.update",$book->id)}}"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf


                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value={{$book->title}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="bmd-label-floating">Author</label>
                            <input type="text" class="form-control" name="author" id="auther" value={{$book->author}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="bmd-label-floating" for="inputGroupSelect01">Category</label>
                            <select class="custom-select form-control d-block" style="color: #fff;
                                border: 1px solid #aaa;
                                background: #20293f;
                                padding: 5px;" id="inputGroupSelect01" name="category_id">
                                <option value="">Choose...</option>
                                @foreach ($categories as $category)
                                <option {{$book->category_id===$category->id?"selected":""}} value="{{$category->id}}">
                                    {{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value={{$book->price}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity"
                                value={{$book->quantity}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">avaliable</label>
                            <input type="number" class="form-control" name="avaliable" id="avaliable"
                                value={{$book->available}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="bmd-label-floating">Upload Picture</label>
                            <div class="custom-file">
                                <input type="file" class="form-control custom-file-input" id="inputGroupFile01"
                                    name="image">
                                <label class="form-control custom-file-label" for="inputGroupFile01">Choose
                                    file</label>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row justify-content-end">
            <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
        </div>
        <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection