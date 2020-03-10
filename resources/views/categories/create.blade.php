
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>
{{-- @section('content') --}}
<div class="top">
  <div class="card uper">
    <div class="card-header ">
    <h1>Add Category</h1>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('categories.store') }}">
  
            <div class="form-group">
                @csrf
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
  
            <button type="submit" class="btn btn-success">Create Category</button>
            <div class="right">
                  <button  class="btn btn-warning"> <a  href="/admin/categories">Back</a></button>
              </div>
        </form>
    </div>
  
  </div>
  
  </div>
  {{-- @endsection --}}