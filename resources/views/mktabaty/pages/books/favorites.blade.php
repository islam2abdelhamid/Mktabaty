@extends('mktabaty.layouts.default')
@section('title')
<h1>Your Favorite Books</h1>
@endsection

@section('content')
@foreach ( $books as $book )
@if(in_array($book->id,$favourites))
@include('mktabaty.includes.book')
@endif
@endforeach

@stop