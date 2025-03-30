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

function onToastrSuccess(message, title = 'Administrator') {
  toastr.success(message ?? 'Thành công', title, configToastr);
}

function onToastrWarning(message, title = 'Administrator') {
  toastr.warning(message ?? 'Cảnh báo', title, configToastr);
}

function onToastrInfo(message, title = 'Administrator') {
  toastr.info(message ?? 'Thông báo', title, configToastr);
}

function onToastrError(message, title = 'Administrator') {
  toastr.error(message ?? 'Thất bại', title, configToastr);
}
