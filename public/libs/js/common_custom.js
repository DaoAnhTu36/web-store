document.getElementById('images').addEventListener('change', function (event) {
  for (let index = 0; index < event.target.files.length; index++) {
    const element = event.target.files[index];
    if (element) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById(
          'previewImage'
        ).innerHTML += `<div class="item_preview"><div id="item_preview_button_x" onclick="removeImagePreview(${index})"><i class="fa fa-times" aria-hidden="true"></i></div><span>${
          index + 1
        }.</span><img src="${e.target.result}" style="width: 250px; margin: 5px;"></div>`;
      };
      reader.readAsDataURL(element); // Đọc file dưới dạng URL
    }
  }
});

function removeImagePreview(index) {
  const itemPreview = document.getElementsByClassName('item_preview');
  for (let index = 0; index < itemPreview.length; index++) {
    itemPreview[index].remove();
  }
}
