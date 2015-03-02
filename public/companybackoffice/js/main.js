$(document).on('ready' , function(){
	$('.admin-main-menu-general').on('click' , function(){
		$(this).addClass('acitve-admin-menu-item');
		$(this).children('.admin-submenu').fadeIn();
		$(this).siblings('.admin-main-menu-general').removeClass('acitve-admin-menu-item');
		$(this).siblings('.admin-main-menu-general').children('.admin-submenu').hide();
	});

	$('.admin-submenu li').on('click' , function(){
		$('li').removeClass('admin-submenu-active');
		$(this).addClass('admin-submenu-active');
	});
/////////////////////////////////////////////////////////////////sale
//////////////creating sale
	$('#add-coupon-element').on('click' , function(){
		$.ajax({
			url: '/company/add-coupon',
			type: 'post',
			data: null,
			beforeSend : function(){
			$("#ajax-loader").show();
			$(".content-admin").animate({'opacity' : '.2'});
		},
		success : function(data){
			$("#ajax-loader").hide();
			$(".content-admin").html(data);
			$(".content-admin").animate({'opacity' : '1'});
			$('input[name=expiration_date]').datepicker({
				format: 'yyyy-mm-dd',
			});
		}

		});
	});
////////////// storing sale
	$(document).on('submit' , "#coupon-crating-form" , function(e){
		e.preventDefault();
		//var formData = $(this).serializeArray();
		req = new FormData(this);
		var couponForm = $(this);
		$.ajax({
			url : '/company/store-coupon',
			type : 'post',
			data : req,
			cache : false,
            processData : false,
            contentType : false,
			beforeSend :function(){
				couponForm.children('input[type=submit]').attr('disabled' , 'disabled');
			},
			success : function(data){
				if(data.success) {
					$('.validation-errors-company').html('');
					$('.validation-errors-company').hide();
					$('.coupon-create-form form input[type=submit]').removeClass('btn-primary').addClass('btn-success').val('ստեղծված է').attr('disabled' , 'disabled');
					couponForm.remove();
					$('.content-admin').append("<span class='fa fa-check-circle'></span><span>Շնորհակալություն, ակցիան ստեղծված Է: Մենք կկապնվենք ձեզ հետ 24 ժամվա ընթացքում:</span>")
			} else if(data.error) {
				couponForm.children('input[type=submit]').removeAttr('disabled');
				$('.validation-errors-company').html('');
				$('.validation-errors-company').show();
				for(var k in data.error) {
					$('.validation-errors-company').append('<p>'+data.error[k][0]+'</p>')
				}
			}
			}
		});
	});
//////////////active sales
	$('#active-coupons').on('click' , function(){
		$.ajax({
			url: '/company/activecoupons',
			type: 'post',
			data: null,
			beforeSend : function(){
			$("#ajax-loader").show();
			$(".content-admin").animate({'opacity' : '.2'});
		},
		success : function(data){
			$("#ajax-loader").hide();
			$(".content-admin").html(data);
			$(".content-admin").animate({'opacity' : '1'});
			$('input[name=expiration_date]').datepicker({
				format: 'yyyy-mm-dd',
			});
		}

		});
	});
////////////////////////////////////////////////////////////////////////////////////orders
/////////////////form for checking customer order code
$('#check-coupon').on('click' , function(){
		$.ajax({
			url: '/company/checkorderform',
			type: 'post',
			data: null,
			beforeSend : function(){
			$("#ajax-loader").show();
			$(".content-admin").animate({'opacity' : '.2'});
		},
		success : function(data){
			$("#ajax-loader").hide();
			$(".content-admin").html(data);
			$(".content-admin").animate({'opacity' : '1'});
		}

		});
	});

/////////////////checking order code
$(document).on('submit' , '#coupon-checking-form' , function(e){
		e.preventDefault();
		var checkOrderForm = $(this);
		var order_code = checkOrderForm.children('input[type=text]').val();
		$.ajax({
			url: '/company/checkorder',
			type: 'post',
			data: {order_code : order_code},
			beforeSend : function(){
			checkOrderForm.children('input').attr('disabled' , 'disabled')
		},
		success : function(data){
			if(data.not_exist) {
				$("#response-information").empty();
				$("#response-information").show();
				$("#response-information").append(data.not_exist);
				checkOrderForm.children('input').removeAttr('disabled');
			} else if(data.expired){
				$("#response-information").empty();
				$("#response-information").show();
				$("#response-information").append(data.expired);
				checkOrderForm.children('input').removeAttr('disabled');
			} else if(data.order){
				$("#response-information").empty();
				$("#response-information").show();
				$("#response-information").append("<h4><span class='fa fa-check'></span>Վավեր կտրոն:</h4><hr>");
				$("#response-information").append("<p>"+data.order.user+"</p>");
				$("#response-information").append("<p>"+data.order.date.date.slice(0,16)+"</p>");
				$("#response-information").append("<p><a target='_blank' href='/sale/"+data.order.coupon_id+"'>"+data.order.coupon+"</a></p>");
				$("#response-information").append("<button id='use-coupon' data-id="+data.order.id+" data-code="+data.order.code+" class=' btn btn-xs btn-primary'>հաստատել</button>");
				checkOrderForm.slideUp(200);
			}
		}

		});
	});

/////////////////////////use coupon(order)
$(document).on('click' , '#use-coupon' , function(){
	var self = $(this);
	var order_id = self.data('id')
	var order_code = self.data('code');
	//console.log(order_id , order_code);
	$.ajax({
		url : '/company/useorder',
		type : 'post',
		data : {id : order_id , code : order_code},
		beforeSend : function(){
			self.attr('disabled' , 'disabled');
		},
		success : function(data){
			if(data=='true'){
				$("#response-information").empty();
				$("#response-information").append("<h4><span class='fa fa-check'></span>Կտրոնը օգտագործված է:</h4>");
			}
		}
	});
});
});