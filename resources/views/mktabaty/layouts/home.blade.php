
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
                @yield('content')
            </div>

        </div>
    </div>

    @yield('pagination')
</div>

@include('mktabaty.includes.footer')
