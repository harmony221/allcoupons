@extends('template.template')
@section('content')

	<div class='registration-form'>
	<h2>Գրանցվել</h2>
		@if(Session::has('messages'))
			<ul class='validation-errors'>
				@foreach(Session::get('messages')->all() as $message)
					<li><span class='fa fa-exclamation'></span>{{$message}}</li>
				@endforeach
			</ul>
		@endif
		{{Form::open(['url' => URL::action('UsersController@registerUser') , 'method' => 'post'])}}
			{{Form::text('email' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ձեր էլ. հասցեն'])}}
			{{Form::text('first_name' , null ,  ['class' => 'form-control' , 'placeholder' => 'Անուն'])}}
			{{Form::text('last_name' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ազգանուն'])}}
			{{Form::password('password' ,  ['class' => 'form-control' , 'placeholder' => 'Ծածկագիր'])}}
			{{Form::password('repeat_password' ,  ['class' => 'form-control' , 'placeholder' => 'Կրկնեք ծածկագիրը'])}}
			{{Form::submit('Գրանցվել' , ['class'=>'btn btn-primary'])}} Արդեն գրանցված ե՞ք:
		{{Form::close()}}
		<hr>
		<a class='btn facebook-login' href={{URL::action('UsersController@loginWithFacebook')}}><span class='fa fa-facebook'></span>Մուտք facebook-ի միջոցով</a>
		<a class='btn google-login' href={{URL::action('UsersController@loginWithGoogle')}}><span class='fa fa-google'></span>Մուտք google-ի միջոցով</a>
	</div>
@stop