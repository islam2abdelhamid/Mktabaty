@extends('mktabaty.layouts.default')
@section('title')
<h1>{{$category->name}}</h1>
@endsection

@section('content')
<div class="col-md-4 mt-4">
  @foreach ($books as $book)
  @include('mktabaty.includes.book')
  @endforeach
</div>

@stop