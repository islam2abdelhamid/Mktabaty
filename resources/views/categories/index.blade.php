{{-- @section('content') --}}
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
 
</head>
    <div class="right">
    <a class="btn btn-success" style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-default"><i class="fas fa-plus"></i>New category</a>
    </div>
    <div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped info">
    <thead>
        <tr>

          <td>Category Name</td>

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>

            <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-info"><i class="far fa-edit"></i>Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  </html>
   
