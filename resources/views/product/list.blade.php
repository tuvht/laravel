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
								<th>Category</th>
								<th>Description</th>	
								<th>Create at</th>									
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $key => $row)
							<tr>
								<td>{!!$key + 1!!}</td>
								<td>{!!$row->product_name!!}</td>
								<td>{!!$row->category_name!!}</td>
								<td><small>{!!$row->description!!}</small></td>
								<td>{!!$row->created_at!!}</td>
								<td style="width: 120px;">
								    <a title="Edit"
								    	href="{{ route('product/edit' . $row->product_id) }}"
                                        >
                                        Edit
                                    </a>
                                    <a title="Edit"
                                        onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();">
                                        Remove
                                    </a>
								    <form id="delete-form" action="{{ route('product/delete') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{!!$row->product_id)}}">
                                    </form>
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