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

			<h1>Edit {{ $job->name }}</h1>

			<!-- if there are creation errors, they will show here -->
			{{ Html::ul($errors->all()) }}

			{{ Form::model($job, array('route' => array('jobs.update', $job->id), 'method' => 'PUT')) }}

		               <div class="form-group">
		                   <strong>Title:</strong>
		                   {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
		               </div>

		               <div class="form-group">
		                   <strong>Description:</strong>
		                   {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
		               </div>

		               <div class="form-group">
		                   <strong>Company:</strong>
		                   {!! Form::textarea('company', null, array('placeholder' => 'Company','class' => 'form-control','style'=>'height:100px')) !!}
		               </div>

		               <div class="form-group">
		                   <strong>Job type:</strong>
		                   {!! Form::textarea('Job_type', null, array('placeholder' => 'Job type','class' => 'form-control','style'=>'height:100px')) !!}
		               </div>

		               <div class="form-group">
		                   <strong>Experience:</strong>
		                   {!! Form::text('experience', null, array('placeholder' => 'Experience','class' => 'form-control')) !!}
		               </div>


			{{ Form::submit('Edit the job!', array('class' => 'btn btn-primary')) }}

			{{ Form::close() }}

		</div>
	</body>
</html>