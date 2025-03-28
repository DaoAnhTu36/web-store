function onAddCart(id, name, price) {
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
      console.log(response);
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
        $('#total_cart').text(response.data.total_cart);
        $('#total_cart_with_fee').text(response.data.total_cart);
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

function validateCustomerOrder() {
  let retVal = true;
  let full_name_tag = $('#full_name');
  let email_tag = $('#email');
  let phone_tag = $('#phone');
  let address_tag = $('#address');
  let note_tag = $('#note');
  let full_name = full_name_tag.val();
  let email = email_tag.val();
  let phone = phone_tag.val();
  let address = address_tag.val();
  let note = note_tag.val();
  if (!full_name) {
    full_name_tag.css('border', '1px solid red');
    retVal = false;
  }
  if (!email) {
    email_tag.css('border', '1px solid red');
    retVal = false;
  }
  if (!phone) {
    phone_tag.css('border', '1px solid red');
    retVal = false;
  }
  if (!address) {
    address_tag.css('border', '1px solid red');
    retVal = false;
  }
  return retVal;
}
