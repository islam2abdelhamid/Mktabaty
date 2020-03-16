<div class="col-md-4 mt-4">
    <div class="card card-plain">
        <img class="card-img-top" src={{asset("images/".$book->image)}} alt="book image" height="250px" />

        <div class="card-body">
            <h4 class="card-title mb-0">
                <a href="/book" class="no-decoration">{{$book->title}}</a>
            </h4>
            <span class="text-secondary d-flex ">By {{$book->author}}</span>

            <i class="fa fa-heart-o fa-pull-right mb-3" aria-hidden="true"></i>

            <div class="star-rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-secondary d-flex ">available {{$book->available}}</span>
                <span class="badge badge-pill badge-warning">{{$book->price}} EGP</span>
            </div>

            <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicingaerat sunt
                maxime perspiciatis eligendi...
            </p>


        </div>

    </div>
</div>