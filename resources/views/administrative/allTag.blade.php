@extends('administrative.home')
@section('allTag')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<table class="table table-responsive">
	 <div class="form-group">
     <input type="text" class="form-controller" id="search" name="search"></input>
     </div>

<table class="table table-responsive">
	
	<tr>
		 <th>Tag Id</th>
		 <th>Tag Name</th>
		 <th>Tag Slug</th>
		 <th>Created at</th>
		 <th>Action</th>
	</tr>
  @foreach($tag as $row)
	<tr>
		<td>{{$row->tid}}</td>
		<td>{{$row->tname}}</td>
		<td>{{$row->tslug}}</td>
		<td>{{$row->created_at}}</td>
		<td>
			<a href="{{URL::to('edit/tag/'.$row->tid)}}" class="btn btn-info">Update</a>
			<a href="{{URL::to('view/tag/'.$row->tid)}}" class="btn btn-success">View</a>
			<a href="{{URL::to('delete/tag/'.$row->tid)}}" class="btn btn-danger">Delete</a>
		</td>
        
	</tr>
	@endforeach
</table>
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'searchTag':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

@endsection