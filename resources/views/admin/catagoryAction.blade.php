@extends('admin.home')

@section('catagoryform')


<div class="container">.

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

      	<a href={{route('admin.catagoryAction')}} class="btn btn-danger">Add Catagory</a>
      		<a href={{route('allCatagory')}} class="btn btn-info">All Catagory</a>
            
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
      		 @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
     
        <form  method="post" action={{route('create.catagory')}} enctype="multipart/form-data" name="postform" id="contactForm" novalidate>
        	@csrf
          
             <div class="control-group">


             	<div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="cid" readonly id="email"  >
              <p class="help-block text-danger"></p>
            </div>
           
             <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="cname" placeholder="Enter Catagory Name" id="email" required data-validation-required-message="Please enter your email address." >
              <p class="help-block text-danger"></p>
            </div>

            <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="cslug" placeholder="Enter Catagory Slug Name" id="email" required data-validation-required-message="Please enter your email address." >
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
