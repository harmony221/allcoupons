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
		{{Form::open(['url' => URL::action('UsersController@authUser') , 'method' => 'post'])}}
			{{Form::text('email' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ձեր էլ. հասցեն'])}}
			{{Form::password('password' ,  ['class' => 'form-control' , 'placeholder' => 'Ծածկագիր'])}}
			{{Form::submit('Մուտք' , ['class'=>'btn btn-primary'])}} Մոռացել ե՞ք գաղտնաբառը:
		{{Form::close()}}
		<hr>
		<a class='btn facebook-login' href={{URL::action('UsersController@loginWithFacebook')}}><span class='fa fa-facebook'></span>Մուտք facebook-ի միջոցով</a>
		<a class='btn google-login' href={{URL::action('UsersController@loginWithGoogle')}}><span class='fa fa-google'></span>Մուտք google-ի միջոցով</a>
	</div>
@stop