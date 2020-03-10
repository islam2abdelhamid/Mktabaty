
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
 
</head>
<div class="top">
    <div class="card uper">
  <div class="card-header">
   <h1 > Edit Category</h1>
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
      <form method="post" action="{{ route('categories.update', $category->id) }}">

      <div class="form-group purple-border">
              @csrf
              @method('PATCH')
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" name="name" value="{{$category->name}}"/>
          </div>

          <div class="form-group shadow-textarea">


          <button type="submit" class="btn btn-success">Update Book</button>
          <div class="right">
            <button  class="btn btn-warning"> <a  href="/admin/categories">Back</a></button>
        </div>
      </form>

  </div>

  </div>