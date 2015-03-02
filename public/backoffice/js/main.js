$(document).on('ready' , function(){
	//////////////////////////////////left bar styles and animation
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
///////////////////////////////////////////////////////////////////////////////////dashboard
$("#dashboard").on('click' , function(){
	$.ajax({
		url : "/admin/dashboard",
		type : 'post',
		data : null,
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
$(document).on('click' , '.dashboard-acitve-companies' , function(){
	$('#all-companies').click();
});
$(document).on('click' , '.dashboard-pending-companies' , function(){
	$('#pending-companies').click()
});
/////////////////////////////////////////////////////////////////////////////////////companies
////////////////active companies
	$('#all-companies').on('click' , function(){
		$.ajax({
			url: '/admin/allcompanies',
			data: null,
			type: 'post',
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
/////////////////pending companies
	$('#pending-companies').on('click' , function(){
		$.ajax({
			url: '/admin/pendingcompanies',
			data: null,
			type: 'post',
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

	/////////////////confirm company
	$(document).on('click' , ".confirm-company" , function(){
		var self = $(this);
		var id = self.data('id');
		$.ajax({
			url: '/admin/confirmcompany',
			data: {id : id} ,
			type: 'post',
			success : function(data){
				self.parents('tr').fadeOut(500);
			}
		});
	});
///////////////////////////////////////////////////////////////////////////////////////////sales
/////////////////pending sales
	$('#pending-coupons').on('click' , function(){
		$.ajax({
			url: '/admin/pendingcoupons',
			data: null,
			type: 'post',
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
///////////////vew sale details
	$(document).on('click' , '.tag-icon' , function(){
		if(!$(this).data('id')){
			$(this).parent().children('.single-coupon').show();
			$(this).removeClass('fa-eye').addClass('fa-eye-slash').removeClass('btn-primary').addClass('btn-danger');
			$(this).data('id' , 1);
		} else {
			$(this).parent().children('.single-coupon').hide();
			$(this).removeClass('fa-eye-slash').addClass('fa-eye').removeClass('btn-danger').addClass('btn-primary');
			$(this).data('id' , 0);
		}
		
	});
///////////////reject sale
	$(document).on('click' , '#coupon-reject' , function(){
		var id = $(this).data('id');
		var coupon = $(this);
		$.ajax({
			url: '/admin/rejectcoupon',
			type : 'post',
			data : {coupon_id : id},
			success : function(){
				coupon.parents('.coupon-listing-header').fadeOut(800);
			}
		});
	});
///////////////confirm sale
	$(document).on('submit' , '#coupon-confirming-form' , function(e){
		e.preventDefault();
		var coupon = $(this);
		var id = coupon.data('id');
		var formData = $(this).serializeArray();
		var validationErrors = coupon.parents('.coupon-listing-header').children('div').children('div').children('.validation-errors')
		formData.push({name : 'id' , value: id});
		$.ajax({
			url : 'admin/confirmcoupon',
			type : 'post',
			data : formData,
			success : function(data){
				if(data.errors){
					validationErrors.empty();
					for(var key in data.errors){
						validationErrors.append("<p>"+data.errors[key][0]+"</p>")
					}
				} else if(data.success){
					coupon.parents('.coupon-listing-header').fadeOut(800);
				}
			}
		});
	});
//////////////////////acitve sales
$("#acitve-coupons").on('click' , function(){
	$.ajax({
		url : "/admin/activecoupons",
		type : 'post',
		data : null,
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

//////////////////////rejected sales
$("#rejected-coupons").on('click' , function(){
	$.ajax({
		url : "/admin/rejectedcoupons",
		type : 'post',
		data : null,
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
//////////////////////////////////////////////////////////////////////////cities
////////////////all cities
$("#all-cities").on('click' , function(){
	$.ajax({
		url : "/admin/allcities",
		type : 'post',
		data : null,
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
//////////////add city form
$("#add-city").on('click' , function(){
	$.ajax({
		url : "/admin/createcity",
		type : 'post',
		data : null,
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
//////////storing city

$(document).on('submit' , "#city-creating-form" , function(e){
	e.preventDefault();
	var city_name = $(this).serializeArray();
	$.ajax({
		url : "/admin/storecity",
		type : 'post',
		data : city_name,
		beforeSend : function(){
			$(this).children('input').attr('disabled' , 'disabled');
		},
		success : function(data){
			$("#city-creating-form").remove();
			$(".content-admin").append("<span class='fa fa-check-circle'></span><span>Քաղաքը ավելացված է:</span>");
		}
	});
});
///////delete city
$(document).on('click' , ".delete-city" , function(e){
	var city_id = $(this).parents('td').data('id');
	var delete_icon = $(this);
	$.ajax({
		url : "/admin/deletecity",
		type : 'post',
		data : {id : city_id},
		success : function(data){
			delete_icon.parents('td').fadeOut(200);
		}
	});
});

/////////edit city
$(document).on('click' , ".edit-city" , function(e){
	var old_text = $(this).parents('td').children('span.city-name').text();
	var id = $(this).parents('td').data('id');
	$(this).parents('td').children('span.city-name').empty();
	$(this).parents('td').children('span.city-name').html("<input style='width:70%' type='text' value="+old_text+">");
	$(this).removeClass('fa-edit').removeClass('btn-warning').addClass('btn-success').addClass('fa-check').removeClass('edit-city').addClass('update-city');
	$(".update-city").on('click' , function(){
		var new_text = $(this).parents('td').children('span.city-name').children('input').val()
		var update_icon = $(this);
		$.ajax({
			url : "/admin/updatecity",
			type : 'post',
			data : {id : id , name : new_text},
			success : function(){
				update_icon.parents('td').children('span.city-name').children('input').remove();
				update_icon.parents('td').children('span.city-name').html(new_text);
				update_icon.removeClass('fa-check').removeClass('btn-success').removeClass('update-city').addClass('btn-warning').addClass('fa-edit').addClass('edit-city')
			}

		});
	});
});

//////////////////////////////////////////////////////////////////////////categories
////////////////all categories
$("#all-categories").on('click' , function(){
	$.ajax({
		url : "/admin/allcategories",
		type : 'post',
		data : null,
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
//////////////add category form
$("#add-category").on('click' , function(){
	$.ajax({
		url : "/admin/createcategory",
		type : 'post',
		data : null,
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
//////////storing category

$(document).on('submit' , "#category-creating-form" , function(e){
	e.preventDefault();
	var category_name = $(this).serializeArray();
	$.ajax({
		url : "/admin/storecategory",
		type : 'post',
		data : category_name,
		beforeSend : function(){
			$(this).children('input').attr('disabled' , 'disabled');
		},
		success : function(data){
			$("#category-creating-form").remove();
			$(".content-admin").append("<span class='fa fa-check-circle'></span><span>Կատեգորիան ավելացված է:</span>");
		}
	});
});
///////delete category
$(document).on('click' , ".delete-category" , function(e){
	var category_id = $(this).parents('td').data('id');
	var delete_icon = $(this);
	$.ajax({
		url : "/admin/deletecategory",
		type : 'post',
		data : {id : category_id},
		success : function(data){
			delete_icon.parents('td').fadeOut(200);
		}
	});
});

/////////edit category
$(document).on('click' , ".edit-category" , function(e){
	var old_text = $(this).parents('td').children('span.category-name').text();
	var id = $(this).parents('td').data('id');
	$(this).parents('td').children('span.category-name').empty();
	$(this).parents('td').children('span.category-name').html("<input style='width:70%' type='text' value="+old_text+">");
	$(this).removeClass('fa-edit').removeClass('btn-warning').addClass('btn-success').addClass('fa-check').removeClass('edit-category').addClass('update-category');
	$(".update-category").on('click' , function(){
		var new_text = $(this).parents('td').children('span.category-name').children('input').val()
		var update_icon = $(this);
		$.ajax({
			url : "/admin/updatecategory",
			type : 'post',
			data : {id : id , name : new_text},
			success : function(){
				update_icon.parents('td').children('span.category-name').children('input').remove();
				update_icon.parents('td').children('span.category-name').html(new_text);
				update_icon.removeClass('fa-check').removeClass('btn-success').removeClass('update-category').addClass('btn-warning').addClass('fa-edit').addClass('edit-category')
			}

		});
	});
});
////////////////////////////////////////////////////////////////////////////orders
///////////////active orders
$("#active-orders").on('click' , function(){
	$.ajax({
		url : "/admin/activeorders",
		type : 'post',
		data : null,
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

///////////////expired orders
$("#expired-orders").on('click' , function(){
	$.ajax({
		url : "/admin/expiredorders",
		type : 'post',
		data : null,
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
$("#dashboard").click();
});