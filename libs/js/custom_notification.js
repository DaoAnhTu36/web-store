$(document).ready(function () {
  setTimeout(function () {
    $('.flash-message').fadeOut('slow');
  }, 2500);
});

let configToastr = {
  timeOut: 2000,
  closeButton: true,
  // progressBar: true,
};

function onToastrSuccess(message, title = 'Administrator', callback = null) {
  if (!message || message.trim() === '') {
    message = 'Thành công';
  }
  toastr.success(message, title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrWarning(message, title = 'Administrator', callback = null) {
  if (!message || message.trim() === '') {
    message = 'Cảnh báo';
  }
  toastr.warning(message, title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrInfo(message, title = 'Administrator', callback = null) {
  if (!message || message.trim() === '') {
    message = 'Thông báo';
  }
  toastr.info(message, title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrError(message, title = 'Administrator', callback = null) {
  if (!message || message.trim() === '') {
    message = 'Thất bại';
  }
  toastr.error(message, title, configToastr);
  if (callback) {
    callback();
  }
}
