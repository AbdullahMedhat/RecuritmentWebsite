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
			        <li><a href="{{ URL::to('jobs') }}">View All jobs</a></li>
			        <li><a href="{{ URL::to('jobs/create') }}">Create a Job</a>
			    </ul>
			</nav>

			<h1>Showing {{ $job->title }}</h1>
			    <div class="jumbotron text-center">
			        <h2>{{ $job->title }}</h2>
			        <p>
			            <strong>Description:</strong> {{ $job->description }}<br>
			            <strong>Company:</strong> {{ $job->company }}<br>
			            <strong>Job Type:</strong> {{ $job->Job_type }}<br>
			            <strong>Experience:</strong> {{ $job->experience }}
			            <button type="button" onclick="window.location='{{ url("jobs/{$job->id}/applications/new") }}'">Sumbit</button>
			        </p>
			    </div>

		</div>
	</body>
</html>