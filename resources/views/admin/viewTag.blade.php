@extends('admin.home')

@section('viewTag')
   

	<form method="get">
    @csrf
  <div class="form-group">
    <label for="email">Tag id:</label>
    <input type="email" class="form-control" readonly value="{{$tag->tid}}" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Tag Name:</label>
    <input type="text" class="form-control" readonly value="{{$tag->tname}}"  id="pwd">
  </div>

  <div class="form-group">
    <label for="pwd">Tag Slug:</label>
    <input type="text" class="form-control" readonly value="{{$tag->tslug}}"  id="pwd">
  </div>
  
</form>

@endsection