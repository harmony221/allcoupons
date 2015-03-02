@extends('template.template')
@section('content')

	<div class='registration-form'>
	<h2>Գրանցել կազմակերպություն</h2>
		@if(Session::has('messages'))
			<ul class='validation-errors'>
				@foreach(Session::get('messages')->all() as $message)
					<li><span class='fa fa-exclamation'></span>{{$message}}</li>
				@endforeach
			</ul>
		@endif
		{{Form::open(['url' => URL::action('UsersController@registerCompany') , 'method' => 'post'])}}
			{{Form::text('company_name' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ձեր կազմակերպության անվանումը *'])}}
			{{Form::select('city_id' , $cities , null,  ['class' => 'form-control'])}}
			{{Form::text('company_adress' , null ,  ['class' => 'form-control' , 'placeholder' => 'Հասցե'])}}
			{{Form::text('email' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ձեր Էլ. հասցեն *'])}}
			{{Form::text('phone' , null ,  ['class' => 'form-control' , 'placeholder' => 'Հեռախոսահամար'])}}
			{{Form::text('first_name' , null ,  ['class' => 'form-control' , 'placeholder' => 'Անուն *'])}}
			{{Form::text('last_name' , null ,  ['class' => 'form-control' , 'placeholder' => 'Ազգանուն *'])}}
			{{Form::password('password' ,  ['class' => 'form-control' , 'placeholder' => 'Ծածկագիր *'])}}
			{{Form::password('repeat_password' ,  ['class' => 'form-control' , 'placeholder' => 'Կրկնեք ծածկագիրը *'])}}
			{{Form::submit('Գրանցվել' , ['class'=>'btn btn-primary'])}} Արդեն գրանցված ե՞ք:
		{{Form::close()}}
	</div>
@stop