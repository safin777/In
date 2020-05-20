@extends('admin.home')
@section('allPost')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="">
             @foreach($allPost as $row)
            <h2 class="post-title">
              {{$row->pname}}
            </h2>
            <img src="{{URL::to($row->image)}}" style="height: 300px; width: 400px;">
            <h3 class="post-subtitle">
             
              {{$row->description}}
            </h3>
          </a>
          <p class="post-meta" style="color: blue;">
            <a href="#">Catagory:{{$row->cname}}</a>
           </p>

            <p class="post-meta" style="color: green;">
            <a href="#">Tags:{{$row->tname}}</a>
           </p>
        </div>
        <hr>
        @endforeach
       
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection