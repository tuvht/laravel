@extends('layouts.master')
@section('title', 'Category')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Category Management
				<a href="{!!url('category/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Add</button></a>
			</div>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			    @elseif (Session()->has('flash_level'))
			    	<div class="alert alert-success">
				        <ul>
				            {!! Session::get('flash_massage') !!}	
				        </ul>
				    </div>
				@endif
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>										
								<th>#</th>										
								<th>Name</th>
								<th>Description</th>										
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $key => $row)
							<tr>
								<td>{!!$key + 1!!}</td>
								<td>{!!$row->name!!}</td>
								<td><small>{!!$row->description!!}</small></td>
								<td style="width: 120px;">
								    <a href="{!!url('admin/news/edit/'.$row->id)!!}" title="Edit"><span class="glyphicon glyphicon-edit">edit</span> </a>
								    <a href="{!!url('admin/news/del/'.$row->id)!!}"  title="Remove" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
								</td>
							</tr>	
						@endforeach								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection