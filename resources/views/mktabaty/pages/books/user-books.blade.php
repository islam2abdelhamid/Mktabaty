@extends('mktabaty.layouts.default')

@section('title')
<h1>Your Books</h1>
@endsection

@section('content')
<!-- Start Of Book-->
@if (count(auth::user()->leasedBooks)>0)
@foreach (auth::user()->leasedBooks as $book)
@include('mktabaty.includes.book')
@endforeach
@else
    <h1 class="text-center">You have no books :)</h1>
@endif



<!-- End Of Book-->
@stop