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
  toastr.success(message ?? 'Thành công', title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrWarning(message, title = 'Administrator', callback = null) {
  toastr.warning(message ?? 'Cảnh báo', title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrInfo(message, title = 'Administrator', callback = null) {
  toastr.info(message ?? 'Thông báo', title, configToastr);
  if (callback) {
    callback();
  }
}

function onToastrError(message, title = 'Administrator', callback = null) {
  toastr.error(message ?? 'Thất bại', title, configToastr);
  if (callback) {
    callback();
  }
}
