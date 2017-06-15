<!DOCTYPE html>
<html>
	<head>
	    <title>Wuzzef | Jobs</title>
	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-inverse">
	    <div class="navbar-header">
	        <a class="navbar-brand" href="{{ URL::to('jobs') }}">Job Alert</a>
	    </div>
	    <ul class="nav navbar-nav">
	        <li><a href="{{ URL::to('jobs') }}">View All Jobs</a></li>
	        <li><a href="{{ URL::to('jobs/create') }}">Create a Job</a>
	    </ul>
	</nav>

	<h1>All the Jobs</h1>

	<!-- will be used to show any messages -->
	@if (Session::has('message'))
	    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	        	<td>ID</td>
	            <td>Title</td>
	            <td>Company</td>
	            <td>Job type</td>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($jobs as $key => $value)
	        <tr>
	            <td>{{ $value->id }}</td>
	            <td>{{ $value->title }}</td>
	            <td>{{ $value->company }}</td>
	            <td>{{ $value->Job_type }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the job (uses the destroy method DESTROY /jobs/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->

	                {{ Form::open(array('url' => 'jobs/' . $value->id, 'class' => 'pull-right')) }}
	                   {{ Form::hidden('_method', 'DELETE') }}
	                   {{ Form::submit('Delete this Job', array('class' => 'btn btn-warning')) }}
	               {{ Form::close() }}
	                <!-- show the job (uses the show method found at GET /jobs/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('jobs/' . $value->id) }}">Show this Job</a>

	                <!-- edit this job (uses the edit method found at GET /jobs/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('jobs/' . $value->id . '/edit') }}">Edit this Job</a>

	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>

	</div>
	</body>
</html>