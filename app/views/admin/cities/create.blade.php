<h3><span class='fa fa-globe'></span>Ավելացնել Քաղաք</h3><hr>
<div style="width:40%">
	{{Form::open(['id' => 'city-creating-form'])}}
		{{Form::label('name' , 'Անվանում')}}
		{{Form::text('name' , null , ['class'=>'form-control'])}}
		{{Form::submit('ավելացնել' , ['class' => 'btn btn-primary' , 'style' => 'margin-top:15px'])}}
	{{Form::close()}}
</div>