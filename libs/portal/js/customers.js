let dataResponseRegister = {};

function onRegisterCustomer() {
  let first_name_register = $('#first_name_register').val();
  let last_name_register = $('#last_name_register').val();
  let email_register = $('#email_register').val();
  let phone_register = $('#phone_register').val();
  let password_register = $('#password_register').val();
  if (!first_name_register || !last_name_register || !email_register || !phone_register || !password_register) {
    $('#registerModal #flash-message').show();
    $('#registerModal #flash-message .alert').text('Vui lòng nhập đầy đủ thông tin').removeClass('alert-success').addClass('alert-danger');
    if (!first_name_register) {
      $('#first_name_register').addClass('error-input');
    }
    if (!last_name_register) {
      $('#last_name_register').addClass('error-input');
    }
    if (!email_register) {
      $('#email_register').addClass('error-input');
    }
    if (!phone_register) {
      $('#phone_register').addClass('error-input');
    }
    if (!password_register) {
      $('#password_register').addClass('error-input');
    }
    return;
  }

  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/save',
    data: {
      first_name_register,
      last_name_register,
      email_register,
      phone_register,
      password_register,
    },
    success: function (response) {
      if (response.status) {
        $('#registerModal #flash-message').hide();
        setTimeout(() => {
          $('.btn-close').click();
        }, 1000);

        $('#first_name_register').val('');
        $('#last_name_register').val('');
        $('#email_register').val('');
        $('#phone_register').val('');
        $('#password_register').val('');
        $('#registerModal #flash-message').hide();
        $('#registerModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
      } else {
        $('#registerModal #flash-message').show();
        $('#registerModal #flash-message .alert').text(response.message).removeClass('alert-success').addClass('alert-danger');
        if (response.data.is_verified === '1') {
          $('#register_now').show();
          $('#active_now').hide();
        } else {
          $('#register_now').hide();
          $('#active_now').show();
        }
        dataResponseRegister = response.data;
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function onActiveCustomer() {
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/verify_from_portal',
    data: {
      data: dataResponseRegister.data,
      type: dataResponseRegister.type,
      verification_token: dataResponseRegister.verification_token,
    },
    success: function (response) {
      if (response.status) {
        $('registerModal #flash-message').show();
        $('registerModal #flash-message .alert').text(response.message).removeClass('alert-danger').addClass('alert-success');
        setTimeout(() => {
          $('.btn-close').click();
        }, 1000);
        $('registerModal #flash-message').hide();
        $('registerModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
      } else {
        $('registerModal #flash-message').show();
        $('registerModal #flash-message .alert').text(response.message).removeClass('alert-success').addClass('alert-danger');
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function onSigninCustomer() {
  let username_signin = $('#username_signin').val();
  let password_signin = $('#password_signin').val();
  if (!username_signin || !password_signin) {
    $('#signinModal #flash-message').show();
    $('#signinModal #flash-message .alert').text('Vui lòng nhập đầy đủ thông tin').removeClass('alert-success').addClass('alert-danger');
    if (!username_signin) {
      $('#username_signin').addClass('error-input');
    }
    if (!password_signin) {
      $('#password_signin').addClass('error-input');
    }
    return;
  }
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/sign-in',
    data: {
      username_signin,
      password_signin,
    },
    success: function (response) {
      if (response.status) {
        $('#signinModal #flash-message').show();
        $('#signinModal #flash-message .alert').text(response.message).removeClass('alert-danger').addClass('alert-success');
        setTimeout(() => {
          $('.btn-close').click();
          $('#signinModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
          $('#signinModal #flash-message').hide();

          $('.customer-profile').html(`<a data-bs-toggle="modal" data-bs-target="#profileModal" class="my-auto">
                            Xin chào <br />
                            ${response.data.first_name} ${response.data.last_name}
                        </a>`);
          if ($('#order_infor_full_name')) {
            $('#order_infor_full_name').val(response.data.first_name + ' ' + response.data.last_name);
            $('#fullname').val(response.data.first_name + ' ' + response.data.last_name);
          }
          if ($('#order_infor_email')) {
            $('#order_infor_email').val(response.data.email);
            $('#email').val(response.data.email);
          }
          if ($('#order_infor_phone')) {
            $('#order_infor_phone').val(response.data.phone);
          }
          if ($('#order_infor_address')) {
            $('#order_infor_address').val(response.data.address);
          }
        }, 1000);
      } else {
        $('#signinModal #flash-message').show();
        $('#signinModal #flash-message .alert').text(response.message).removeClass('alert-success').addClass('alert-danger');
        setTimeout(() => {
          $('#signinModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
          $('#signinModal #flash-message').hide();
        }, 1000);
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function onSignupCustomer() {
  let email = $('#email').val();
  let phone = $('#phone').val();
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/sign-out',
    data: {
      email,
      phone,
    },
    success: function (response) {
      if (response.status) {
        $('.btn-close').click();
        $('#profileModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
        $('#profileModal #flash-message').hide();
        $('.customer-profile').html(`<div class="customer-profile">
                        <a data-bs-toggle="modal" data-bs-target="#signinModal" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>`);
        $('#email').val('');
        $('#fullname').val('');
      } else {
        $('#profileModal #flash-message').show();
        $('#profileModal #flash-message .alert').text(response.message).removeClass('alert-success').addClass('alert-danger');
        setTimeout(() => {
          $('#profileModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
          $('#profileModal #flash-message').hide();
        }, 1000);
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}

function onClearNoti() {
  $('#signinModal #flash-message').hide();
  $('#registerModal #flash-message').hide();
}
