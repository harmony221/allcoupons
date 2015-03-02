<h3><span class='fa fa-tags'></span>Ստեղծել կտրոն</h3><hr>
<div class='coupon-create-form col-lg-6 col-md-6 col-sm-6 col-xs-6'>
	{{Form::open(['id' => 'coupon-crating-form'])}}
		{{Form::label('name' , 'Վերնագիր')}}
		{{Form::text('name' , null , ['class'=>'form-control'])}}
		{{Form::label('discription' , 'Նկարագրություն')}}
		{{Form::textarea('discription' , null , ['class'=>'form-control'])}}
		{{Form::label('category' , 'Կատեգորիա')}}
		{{Form::select('category_id' , $categories , null , ['class'=>'form-control'])}}
		{{Form::label('service_address' , 'Հասցե')}}
		{{Form::text('service_address' , null , ['class'=>'form-control'])}}
		{{Form::label('sale_percent' , 'Զեղչի չափ (%)')}}
		{{Form::text('sale_percent' , null , ['class'=>'form-control'])}}
		{{Form::label('price' , 'Գին ( դրամ )')}}
    	{{Form::text('price' , null , ['class'=>'form-control'])}}
		{{Form::label('expiration_date' , 'Գործում է մինչև..')}}
		{{Form::text('expiration_date' , null , ['class' => 'form-control'])}}
		{{Form::label('using_valid_days' , 'Կտրոնի վավերականության ժամանակահատված (օր)')}}
		{{Form::text('using_valid_days' , null , ['class' => 'form-control'])}}
		{{Form::label('image' , 'Նկար')}}
		{{Form::file('image' , null , ['class' => 'form-control'])}}
		<h5>Բոլոր դաշտերը պարտադիր են:</h5>
		{{Form::submit('ստեղծել' , ['class' => 'btn btn-primary'])}}
	{{Form::close()}}
</div>
<div class='alert alert-danger validation-errors-company col-lg-6 col-md-6 col-sm-6 col-xs-6' style="display:none">
</div>