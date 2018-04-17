@extends('admin.layouts.app')

@section('content')
<div class="content">
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Your Renting Places</h4>
                       	<button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#myModal">Create Renting Places</button>
                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                            	<th>Apartment Name</th>
                            	<th>Place Name</th>
                            	<th>Place Description</th>
                            	<th>City</th>
                            	<th>Country</th>
                            	<th>Price</th>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($renting_places as $place)
                                <tr>
                                	<td>{{ $i }}</td>
                                	<td>{{ $place->apartment_name }}</td>
                                	<td>{{ $place->place_name }}</td>
                                	<td>{{ $place->place_description }}</td>
                                	<td>{{ $place->city }}</td>
                                	<td>{{ $place->country }}</td>
                                	<td>{{ $place->price }}</td>
                                	<td><button type="button" class="btn btn-info btn-fill" data-toggle="modal" data-target="#myModalEdit" id="ModalEdit" data-id="{{ $place->id }}">Edit</button></td>
                                	<td><a href="/renting/delete/{{$place->id}}" class="btn btn-danger btn-fill">Delete</a></td>
                                </tr>
                            <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection