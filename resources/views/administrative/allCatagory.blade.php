@extends('administrative.home')
@section('allCatagory')


<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="form-group">
     <input type="text" class="form-controller" id="search" name="search"></input>
     </div>


<table class="table table-responsive">
	
	<tr>
		 <th>Catagory Id</th>
		 <th>Catagory Name</th>
		 <th>Catagory Slug</th>
		 <th>Created at</th>
		 <th>Action</th>
	</tr>
  @foreach($catagory as $row)
	<tr>
		<td>{{$row->cid}}</td>
		<td>{{$row->cname}}</td>
		<td>{{$row->cslug}}</td>
		<td>{{$row->created_at}}</td>
		<td>
			<a href="{{URL::to('edit/catagory/'.$row->cid)}}" class="btn btn-info">Update</a>
			<a href="{{URL::to('view/catagory/'.$row->cid)}}" class="btn btn-success">View</a>
			<a href="{{URL::to('delete/catagory/'.$row->cid)}}" class="btn btn-danger">Delete</a>
		</td>
        
	</tr>
	@endforeach
</table>
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('searchCatagory')}}',
data:{'searchCatagory':$value},
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


