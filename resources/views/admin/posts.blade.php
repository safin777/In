@extends('admin.home')
 
@section('postform')


<div class="container">.

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form method="post" action="{{URL::to('write/post')}}" enctype="multipart/form-data" name="postform" id="contactForm" novalidate>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          @csrf

          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Name</label>
              <input type="text" class="form-control" name="pname" placeholder="Enter post name" id="email"  data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <select class="form-control" name="cname">
                @foreach($catagory as $row)
                 <option>{{$row->cname}}</option>
                 @endforeach
              </select>

              
            </div>

            <div class="form-group floating-label-form-group controls">
              <label>Tags</label>
              <select class="form-control" name="tname">
                @foreach($tag as $row)
                 <option>{{$row->tname}}</option>
                 @endforeach
              </select>
            </div>


          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image</label>
              <input type="file" class="form-control" placeholder="Image" id="fileToUpload" name="image" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Description </label>
              <textarea rows="5" class="form-control" placeholder="Write post here " name="description" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

