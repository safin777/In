@extends('admin.home')

@section('tagform')


<div class="container">.

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        	<a href="" class="btn btn-danger">Add Tag</a>
      		<a href={{route('all.tag')}} class="btn btn-info">All Tag</a>

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       
        <form method="post" action="{{route('create.tag')}}" enctype="multipart/form-data" name="postform" id="contactForm" novalidate>
          @csrf
          
             <div class="control-group">

             	<div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="tid" readonly  id="email" data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
           
             <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="tname" placeholder="Enter Tag Name" id="email"  data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>

            <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="tslug" placeholder="Enter Tag Slug Name" id="email" data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>

           
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" id="sendMessageButton">Create</button>
          </div>
         
            
        </form>
      </div>
    </div>
  </div>

@endsection


