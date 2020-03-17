@extends('mktabaty.layouts.default')

@section('title')
    <h1>Your Books</h1>
@endsection

@section('content')
    <!-- Start Of Book-->
    <div class="col-md-4 mt-4">
    @include('mktabaty.includes.book')

    </div>
    <!-- End Of Book-->
@stop
