@extends('mktabaty.layouts.home')
@section('content')
<div class="col-md-4 mt-4">
  @foreach ($books as $book)
  <div class="card">
    {{-- {{$book}} --}}
    <img class="card-img-top" src={{asset("images/".$book->image)}} alt="book image" height="250px" />

    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h4 class="card-title">
          <a href="{{route('books.show' ,['id'=> $book->id])}}" class="no-decoration">{{$book->title}}</a>
        </h4>
        <span class="text-secondary d-flex ">{{$book->author}}</span>

        <i class="fa fa-heart-o fa-pull-right mb-3" aria-hidden="true"></i>

      </div>
      <div class="star-rating">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-secondary d-flex ">4 copies available</span>
        <span class="badge badge-pill badge-warning">36EGP</span>
      </div>

      <p class="card-text">
        Lorem ipsum dolor sit amet consectetur adipisicingaerat sunt
        maxime perspiciatis eligendi...
      </p>


    </div>

  </div>
  @endforeach
</div>

@stop