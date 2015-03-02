@extends('template.template')
@section('content')

	<div class='registration-form'>
	<h2>Մուտք</h2>
		@if(Session::has('messages'))
			<ul class='validation-errors'>
				@foreach(Session::get('messages')->all() as $message)
					<li><span class='fa fa-exclamation'></span>{{$message}}</li>
				@endforeach
			</ul>
		@endif
		@if(Session::has('error'))
			<ul class='validation-errors'>
				<li><span class='fa fa-exclamation'></span>{{Session::get('error')}}</li>
			</ul>
		@endif
		{{Form::open(['url' => URL::action('UsersController@authAdmin') , 'method' => 'post'])}}
			{{Form::text('email' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ձեր էլ. հասցեն'])}}
			{{Form::password('password' ,  ['class' => 'form-control' , 'placeholder' => 'Ծածկագիր'])}}
			{{Form::submit('Մուտք' , ['class'=>'btn btn-primary'])}}
		{{Form::close()}}
		<hr>
	</div>
@stop