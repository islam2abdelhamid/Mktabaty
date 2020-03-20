<div class="col-md-4 mt-4">
    <div class="card card-plain">
        <img class="card-img-top" src={{asset("images/".$book->image)}} alt="book image" height="250px" />

        <div class="card-body">
            @if (auth::user()->favoriteBooks()->get()->contains('id',$book->id))
            <form class="d-flex justify-content-between " action="{{ route('favs', $book->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="col-3 mt-3">
                    <div class="d-flex justify-content-center">
                        <input type="hidden" name="book_id" value={{$book->id}}>
                        <button type="submit" class="btn"> <i class="fa fa-heart fa-pull-right mb-3" 
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
            @else
            <i class="fa fa-heart-o fa-pull-right mb-3" aria-hidden="true"></i>
           
            @endif
            <h4 class="card-title mb-0">
                <a href="{{route('showBook' ,['id'=> $book->id])}}" class="no-decoration">{{$book->title}}</a>
            </h4>
            <span class="text-secondary d-flex ">By {{$book->author}}</span>


            <div class="star-rating">
                @for ($i = 0; $i < $book->getRates(); $i++) <span class="fa fa-star checked commentRate"></span>
                    @endfor
                    @for ($i = 5; $i > $book->getRates() ;$i--)
                    <span class="fa fa-star  commentRate"></span>
                    @endfor

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
