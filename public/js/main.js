$(document).on('ready' , function(){
	$("#menu-item-coupons").on('mouseenter' , function(e){
		var couponsSubmenu = $(".coupons-submenu");
		$.ajax({
			url : '/categories',
			type : 'post',
			data : null,
			success : function(data){
				$(".coupons-submenu-items").empty();
				for (var i=0; i<data.length; i++){
					$(".coupons-submenu-items").append("<li data-id='"+data[i].id+"'>"+data[i].name+"</li>");
				}
				couponsSubmenu.show();
			}
		});
	});

	$("#menu-item-coupons").on('mouseleave' , function(e){
		var couponsSubmenu = $(".coupons-submenu");
		couponsSubmenu.hide();
	});

	$("#user-pay-button").on('click' , function(){
		var paymentModal = $(this).parents('#modalPayment');
		var id = paymentModal.data('id');
		$.ajax({
			url : '/user/storeorder',
			type : 'post',
			data : {coupon_id : id},
			success : function(){
				paymentModal.hide();
				window.location.href = '/user';
			}
		});
	});

/////////////////////////////////////////////user///////////////
$('.user-profile-coupons>li').on('click' , function(){
	$(this).css({'border' : '1px solid #cfcfcf' , 'border-bottom' : '1px solid white'});
	$(this).siblings('li').css('border' , '1px solid #f0f0f0');
});
$("#user-buyed-coupons").on('click' , function(){
	$.ajax({
		url : '/user/buyedcoupons',
		type : 'post',
		data : null,
		beforeSend : function(){
			$('.user-profile-loader').show();
			$('.user-profile-coupons-info').html('');
		},
		success : function(data){
			$('.user-profile-loader').hide();
			$('.user-profile-coupons-info').html(data);
		}
	});
});

$("#user-used-coupons").on('click' , function(){
	$.ajax({
		url : '/user/usedcoupons',
		type : 'post',
		data : null,
		beforeSend : function(){
			$('.user-profile-loader').show();
			$('.user-profile-coupons-info').html('');
		},
		success : function(data){
			$('.user-profile-loader').hide();
			$('.user-profile-coupons-info').html(data);
		}
	});
});

$("#user-expired-coupons").on('click' , function(){
	$.ajax({
		url : '/user/expiredcoupons',
		type : 'post',
		data : null,
		beforeSend : function(){
			$('.user-profile-loader').show();
			$('.user-profile-coupons-info').html('');
		},
		success : function(data){
			$('.user-profile-loader').hide();
			$('.user-profile-coupons-info').html(data);
		}
	});
});

$("#user-buyed-coupons").click();
});