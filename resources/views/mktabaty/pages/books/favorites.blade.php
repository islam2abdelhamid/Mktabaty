@extends('mktabaty.layouts.default')
@section('title')
<h1>Your Favorite Books</h1>
@endsection

@section('content')
@foreach ( $books as $book )
@if(in_array($book->id,$favourites))
<div class="col-md-4 mt-4">
  <div class="card card-plain">

  <img class="card-img-top" src="{{ './../../../../../public/images/'.$book->image }}" alt="book image" height="250px" />

    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h4 class="card-title">
          <a href="/book" class="no-decoration">{{ $book->title }}</a>
        </h4>
        <i class="fa fa-heart fa-pull-right mb-3 "   aria-hidden="true"></i>

      </div>
      <div class="star-rating">
        @foreach ($rates as $rate)
        @if($book->id === $rate->book_id)
            @for($i =1 ; $i<=5 ; $i++)
                @if($i<=$rate->avg)
                <span class="fa fa-star checked"></span>
                @else
                <span class="fa fa-star"></span>
                @endif
             @endfor
        @endif    
        @endforeach
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-secondary d-flex ">{{ $book->quantity }}</span>
        <span class="badge badge-pill badge-warning">{{ $book->price }}</span>
      </div>

      <p class="card-text">
        @foreach ($rates as $rate)
        @if($book->id === $rate->book_id)
       {{ $rate->comment }}
       
       @endif

       @endforeach

      </p>


    </div>

  </div>

  @endif
            
       
    

  @endforeach
</div>

@stop