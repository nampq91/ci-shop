function DatHangSanPham(item_id){
	BootstrapDialog.show({
		title: 'Xác nhận đặt hàng',
        message: $('<div></div>').load(BASE_URL + 'home/order/add/'+item_id),
        buttons: [{
            label: 'Tiếp tục mua hàng',
            action: function(dialogItself){
                dialogItself.close();
            }
        }, {
            label: 'Đặt hàng sản phẩm',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                dialogItself.close();
                XacNhanDatHangSanPham(item_id);
            }
        },{
            label: 'Xem lại đơn hàng',
            cssClass: 'btn-success',
            action: function(dialogItself){
                //dialogItself.close();
                ChiTietDonHang();
            }
        }]
    });

	return false;
}

function XoaKhoiDongDatHang(item_id){
	closeAllBootstrapDialog();
	$.ajax({
        dataType: "json",
        url: BASE_URL + 'service/order/remove/'+ item_id,
        data: {},
        success: function(result) {
            if (result.status > 0) {
                return ChiTietDonHang();
            }else{
            	BootstrapDialog.show({
            		title: 'Có lỗi xảy ra',
            		message: result.message,
            		buttons: [{
                		label: 'Đóng',
                		action: function(dialogRef){
                    		dialogRef.close();
                		}
					}]
        		});
            }
        }
    });
}

function XacNhanDatHangSanPham(item_id){
	var total = $('#soluong_sp_duoc_chon').val();
    $.ajax({
        dataType: "json",
        url: BASE_URL + 'service/order/add/'+ item_id,
        data: {total:total},
        success: function(result) {
            if (result.status > 0) {
                return ChiTietDonHang();
            }else{
            	BootstrapDialog.show({
            		title: 'Có lỗi xảy ra',
            		message: result.message,
            		buttons: [{
                		label: 'Đóng',
                		action: function(dialogRef){
                    		dialogRef.close();
                		}
					}]
        		});
            }
        }
    });
}


function ChiTietDonHang(){
	BootstrapDialog.show({
		title: 'Chi tiết đơn hàng',
        message: $('<div></div>').load(BASE_URL + 'home/order/detail'),
        buttons: [{
            label: 'Tiếp tục',
            action: function(dialogItself){
                dialogItself.close();
            }
        }, {
            label: 'Thanh toán',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                dialogItself.close();
                XacNhanThongTinDatHang();
            }
        }]
    });

	return false;
}

function XacNhanThongTinDatHang(){
	BootstrapDialog.show({
		title: 'Thông tin người đặt hàng',
        message: $('<div id="order_info"></div>').load(BASE_URL + 'home/order/customer'),
        buttons: [{
            label: 'Quay lại',
            action: function(dialogItself){
                dialogItself.close();
                ChiTietDonHang();
            }
        }, {
            label: 'Thanh toán',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                ThanhToanNgay();
            }
        }]
    });
}

function ThanhToanNgay(){
	var info_fullname = $("#info_fullname").val();
	var info_email = $("#info_email").val();
	var info_phone = $("#info_phone").val();
	var info_address = $("#info_address").val();
	var info_note = $("#info_note").val();

	if(info_fullname && info_email && info_phone && info_address){
		closeAllBootstrapDialog();
		$.ajax({
        dataType: "json",
        url: BASE_URL + 'service/order/update',
        data: {info_fullname:info_fullname , info_email:info_email , info_phone:info_phone , info_address:info_address , info_note:info_note},
        success: function(result) {
        	BootstrapDialog.show({
        		title: 'Thông báo',
        		message: result.message,
        		buttons: [{
            		label: 'Đóng',
            		action: function(dialogRef){
                		dialogRef.close();
            		}
				}]
    		});
        }
    });


	}else{
		BootstrapDialog.show({
    		title: 'Có lỗi xảy ra',
    		message: 'Vui lòng cung cấp đủ thông tin',
    		buttons: [{
        		label: 'Đóng',
        		action: function(dialogRef){
            		dialogRef.close();
        		}
			}]
		});
	}

}

function closeAllBootstrapDialog(){
	$.each(BootstrapDialog.dialogs, function(id, dialog){
        dialog.close();
    });
}




function Form_Register(){
    BootstrapDialog.show({
        title: 'Đăng kí tài khoản',
        message: $('<div id="register_form"></div>').load(BASE_URL + 'home/user/register'),
        buttons: [{
            label: 'Đăng nhập',
            action: function(dialogItself){
                dialogItself.close();
                Form_Login();
            }
        }, {
            label: 'Đăng kí ngay',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                ThanhToanNgay();
            }
        }]
    });
}

function Form_Login(){
    BootstrapDialog.show({
        title: 'Đăng nhập vào Website',
        message: $('<div id="login_form"></div>').load(BASE_URL + 'home/user/login'),
        buttons: [{
            label: 'Đăng nhập',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                Do_Login();
            }
        }]
    });
}

function Do_Login(){
    var email = $('#txt_username').val();
    var password = $('#txt_password').val();
    $.post(BASE_URL + 'admin/user/do_login',{email:email,password:password,fix:Math.random()},function(update){
        if(update == 'success'){
            location.reload(true);
        }else{
            alert('Đăng nhập có lỗi');
            closeAllBootstrapDialog();
        }
    });

}

function formatNumber(num)
{    
    var n = num.toString();
    var nums = n.split('.');
    var newNum = "";
    if (nums.length > 1){
        var dec = nums[1].substring(0,2);
        newNum = nums[0] + "," + dec;
    }else{
        newNum = num;
    }
    return newNum;
}
