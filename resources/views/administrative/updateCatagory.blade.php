@extends('administrative.home')

@section('updateCatagory')

	<div class="container">.

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

   
        <form  method="post" action="{{URL::to('update/catagory/'.$catagory->cid)}}" enctype="multipart/form-data" name="postform" id="contactForm" novalidate>
        	@csrf
          
             <div class="control-group">


             	<div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
        <input type="text" class="form-control"  readonly name="cid" value={{$catagory->cid}} id="email"  >
              <p class="help-block text-danger"></p>
            </div>
           
             <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="cname" id="email" value={{$catagory->cname}}
           data-validation-required-message="Please enter your email address." >
              <p class="help-block text-danger"></p>
            </div>

            <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <input type="text" class="form-control" name="cslug" id="email" value={{$catagory->cslug}} data-validation-required-message="Please enter your email address." >
              <p class="help-block text-danger"></p>
            </div>

           
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" id="sendMessageButton">Update</button>
          </div>
         </form>
      </div>
    </div>
  </div>

@endsection