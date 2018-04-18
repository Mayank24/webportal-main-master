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
                        <h4 class="title">Events</h4>
                       	<button type="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#myModalEvents">Create Event/Festivals</button>
                        <!-- <p class="category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                            	<th>Event Name</th>
                            	<th>Event Category</th>
                            	<th>Event Description</th>
                            	<th>City</th>
                            	<th>Country</th>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($events as $event)
                                <tr>
                                	<td>{{ $i }}</td>
                                	<td>{{ $event->event_name }}</td>
                                	<td>{{ $event->event_category }}</td>
                                	<td>{{ $event->event_description }}</td>
                                	<td>{{ $event->city }}</td>
                                	<td>{{ $event->country }}</td>
                                	<td><button type="button" class="btn btn-info btn-fill" data-toggle="modal" data-target="#myModalEventEdit" id="ModalEventEdit" data-id="{{ $event->id }}">Edit</button></td>
                                	<td><a href="/event/delete/{{$event->id}}" class="btn btn-danger btn-fill">Delete</a></td>
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