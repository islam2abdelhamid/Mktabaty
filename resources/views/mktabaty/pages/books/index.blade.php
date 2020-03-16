@extends('mktabaty.layouts.home')
@section('content')

@foreach ($books as $book)
@include('mktabaty.includes.book')
@endforeach

@stop