@extends('mktabaty.layouts.default')
@section('title')
<h1>Your Favorite Books</h1>
@endsection

@section('content')
<div class="col-md-4 mt-4">
  <div class="card card-plain">

    <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px" />

    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h4 class="card-title">
          <a href="/book" class="no-decoration">Book Title</a>
        </h4>
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
</div>

@stop