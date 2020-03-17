
@include('mktabaty.includes.header')

<section id="hero">
    @if(session()->get('message'))
        <div class="col-xl-12 col-lg-12 alert alert-success text-center">
            {{ session()->get('message') }}
        </div><br/>
    @endif
    <div class="overly">
        <h1 class="display-3">Welcome To Mktabaty</h1>
    </div>
</section>


<div class="container-fluid mt-5">
    <div class="row">
        @include('mktabaty.includes.sidebar')
        <!-- Main Content -->
        <div class="col-md-9">
            @include('mktabaty.includes.search-form')
            <div class="row">
                {{-- Books List --}}
                @yield('content')
            </div>

        </div>
    </div>

    @yield('pagination')
</div>

<footer class="row  mt-5 d-flex justify-content-center">
    <h5>© Copyright 2019 OS Track</h5>
</footer>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>