
@include('mktabaty.includes.header')

<div class="page-title text-center">
    @yield('title')
</div>

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

@include('mktabaty.includes.footer')
