let dataResponseRegister = {};

function onRegisterCustomer() {
  let first_name = $('#first_name').val();
  let last_name = $('#last_name').val();
  let email = $('#email').val();
  let phone = $('#phone').val();
  let password = $('#password2').val();
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/save',
    data: {
      first_name,
      last_name,
      email,
      phone,
      password,
    },
    success: function (response) {
      if (response.status) {
        $('#registerModal #flash-message').hide();
        setTimeout(() => {
          $('.btn-close').click();
        }, 1000);

        $('#first_name').val('');
        $('#last_name').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#password').val('');
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
  let username = $('#username').val();
  let password = $('#password1').val();
  $.ajax({
    type: 'POST',
    url: baseURL + 'portal/customer-client/sign-in',
    data: {
      username,
      password,
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
        }, 1000);
      } else {
        $('#signinModal #flash-message').show();
        $('#signinModal #flash-message .alert').text(response.message).removeClass('alert-success').addClass('alert-danger');
        setTimeout(() => {
          $('#signinModal #flash-message .alert').text('').removeClass('alert-success').removeClass('alert-danger');
          $('#signinModal #flash-message').hide();
          $('.btn-close').click();
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
