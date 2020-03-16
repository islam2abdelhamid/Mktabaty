@extends('mktabaty.layouts.single')
@section('title')
<h1>Book Title</h1>
@endsection

@section('content')
<div class="col-md-12">
    <!-- Books -->
    <div class="row">
        <div class="col-3 mt-3">
            <div class="card card-plain">
                <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="300px">
            </div>
        </div>

        <div class="col-6 mt-3">

            <div class="card-body">
                <div>
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="star-rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>

                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicingaerat sunt maxime perspiciatis
                    eligendi Lorem ipsum dolor sit amet consectetur adipisicingaerat sunt maxime perspiciatis
                    eligendi Lorem ipsum dolor sit amet consectetur adipisicingaerat sunt maxime perspiciatis
                    eligendi...
                </p>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>

                <div>


                    <button class="btn btn-success" data-toggle="modal" data-target="#leaseModal"
                        data-whatever="@mdo">Lease</button>
                </div>
            </div>

        </div>

        <div class="col-3 mt-3">
            <div class="d-flex justify-content-center">
                <i class="fa fa-heart-o fa-pull-right mb-3" aria-hidden="true"></i>
            </div>
        </div>

    </div>
    <!-- End of Books -->

    <form class="d-flex justify-content-between ">
        <div class="form-group flex-grow-1">
            <textarea class="form-control" rows="5" id="comment" placeholder="Your Comment..."></textarea>
            <input type="submit" class="btn btn-primary btn-block commentButton" value="Comment" />
        </div>
        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star">5</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star">4</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star">3</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star">2</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1</label>
        </div>
    </form>

</div>


</div>
<!-- End write comment -->



<div class="row top-buffer">
    <div class="col-sm-12">
        <h3>Comments</h3>
    </div>
</div>

<!-- show previous comment -->

<div class="d-flex">
    <div class="thumbnail d-flex justify-content-center">
        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
    </div>
    <div class="card p-2">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <strong>myusername</strong>
                <div class="star-rating d-flex justify-content-center rate">
                    <span class="fa fa-star checked commentRate"></span>
                    <span class="fa fa-star checked commentRate"></span>
                    <span class="fa fa-star checked commentRate"></span>
                    <span class="fa fa-star checked commentRate"></span>
                    <span class="fa fa-star commentRate"></span>
                </div>
            </div>

            <span class="text-muted"><time datetime="2014-12-16T01:05">Dec 16, 2019 01:25 AM</time></span>
        </div>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

</div>


<!-- End show previous comment -->


<!-- Related Books -->

<div class="row top-buffer mt-5">
    <div class="col-sm-12">
        <h3>Related Books</h3>
    </div><!-- /col-sm-12 -->
</div><!-- /row -->

<div class="row">
    <div class="col-md-1 mt-4 vertical-center">
        <div class="pagination">
            <a href="#">❮</a>
        </div>
    </div>

    <div class="col-md-2 mt-4">
        <div class="card card-plain">
            <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mt-4">
        <div class="card card-plain">
            <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mt-4">
        <div class="card card-plain">
            <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mt-4">
        <div class="card card-plain">
            <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mt-4">
        <div class="card card-plain">
            <img class="card-img-top" src="assets/user/images/got.jpg" alt="book image" height="250px">

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title"><a href="#" class="no-decoration">Book Title</a></h4>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary d-flex ">4 copies available</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-1 mt-4 vertical-center">
        <div class="pagination">
            <a href="#">❯</a>
        </div>
    </div>

</div>

<!-- End Related Books -->

<div class="row top-buffer">
    <div class="col-sm-12">
        <div class="footer"></div>
    </div><!-- /col-sm-12 -->
</div><!-- /row -->

</div>



<div class="modal fade mt-5" id="leaseModal" tabindex="-1" role="dialog" aria-labelledby="leaseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaseModalLabel">Lease Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="lease-days" class="col-form-label">NO. of Days :</label>
                        <input type="number" class="form-control" id="lease-days">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Confirm Lease</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@stop