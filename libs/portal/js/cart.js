function onAddCart(id, name, price, type) {
  if(type !== 'buyNow'){
    $('#total-item-in-cart').text('Thêm giỏ hàng thành công');
    $("#notification").addClass('notification-success').toggle();
    setTimeout(() => {
      $("#notification").toggle();
    }, 1500);
  }
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/cart-client/add-to-cart',
    data: {
      id,
      name,
      price,
      quantity: 1,
    },
    success: function (response) {
      if(response.status){
        if(type === 'buyNow'){
          window.location.href = baseURL + 'portal/cart-client';
        }
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function onChangeQuantity(id, type) {
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/cart-client/change-quantity',
    data: {
      id,
      type,
    },
    success: function (response) {
      if (response.status) {
        $('.item-cart-' + id).text(response.data.sub_total);
        $('#total_amount_cart').text(response.data.total_amount_cart);
        $('#total_sale_cart').text(response.data.total_sale_cart);
        $('#total_pay_cart').text(response.data.total_pay_cart);
        $('#total-item-in-cart').text(response.data.total_item);
        
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function removeItemCart(id) {
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/cart-client/remove-item-cart',
    data: {
      id,
    },
    success: function (response) {
      document.querySelector('.table-cart-' + id)?.remove();
      $('#total_cart').text(response.data.total_cart);
      $('#total_cart_with_fee').text(response.data.total_cart);
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function completeOrder() {
  $.ajax({
    type: 'POST',
    url: baseURL + 'admin/order/complete',
    data: {
      id,
    },
    success: function (response) {
      console.log(response);
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function validateCustomerOrder(event) {
  const orderButton = event.target;
  orderButton.textContent = "Đang xử lý...";

  let retVal = true;
  let full_name_tag = $('#order_infor_full_name');
  let email_tag = $('#order_infor_email');
  let phone_tag = $('#order_infor_phone');
  let address_tag = $('#order_infor_address');
  let note_tag = $('#order_infor_note');
  let full_name = full_name_tag.val();
  let email = email_tag.val();
  let phone = phone_tag.val();
  let address = address_tag.val();
  let note = note_tag.val();
  if (!full_name) {
    full_name_tag.addClass('error-input');
    retVal = false;
  }
  if (!email) {
    email_tag.addClass('error-input');
    retVal = false;
  }
  if (!phone) {
    phone_tag.addClass('error-input');
    retVal = false;
  }
  if (!address) {
    address_tag.addClass('error-input');
    retVal = false;
  }
  if(!retVal){
    orderButton.textContent = "Đặt hàng";
    $("#notification").text('Kiểm tra lại thông tin đơn hàng').addClass('notification-error').toggle();
    setTimeout(() => {
      $("#notification").toggle();
    }, 2000);
  }
  return retVal;
}
