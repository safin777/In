@extends('admin.home')

@section('viewCatagory')
   

	<form method="get">
  <div class="form-group">
    <label for="email">Catagory id:</label>
    <input type="email" class="form-control" readonly value="{{$catagory->cid}}" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Catagory Name:</label>
    <input type="text" class="form-control" readonly value="{{$catagory->cname}}"  id="pwd">
  </div>

  <div class="form-group">
    <label for="pwd">Catagory Slug:</label>
    <input type="text" class="form-control" readonly value="{{$catagory->cslug}}"  id="pwd">
  </div>
  
</form>

@endsection