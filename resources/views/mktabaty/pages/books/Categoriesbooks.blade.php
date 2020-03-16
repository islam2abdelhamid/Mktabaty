@extends('mktabaty.layouts.default')
@section('title')
<h1>{{$category->name}}</h1>
@endsection

@section('content')
@foreach ($books as $book)
@include('mktabaty.includes.book')
@endforeach

@stop