<div class="col-md-4 mt-4">
    <div class="card card-plain">
        <img class="card-img-top" src={{asset("images/".$book->image)}} alt="book image" height="250px" />

        <div class="card-body">
            <h4 class="card-title mb-0">
                <a href="{{route('books.show' ,['id'=> $book->id])}}" class="no-decoration">{{$book->title}}</a>
            </h4>
            <span class="text-secondary d-flex ">By {{$book->author}}</span>

            <i class="fa fa-heart-o fa-pull-right mb-3" aria-hidden="true"></i>

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
                <span class="text-secondary d-flex ">available {{$book->available}}</span>
                <span class="badge badge-pill badge-warning">{{$book->price}} EGP</span>
            </div>

            <p class="card-text">
                {{$book->description}}
            </p>

        </div>

    </div>
</div>
