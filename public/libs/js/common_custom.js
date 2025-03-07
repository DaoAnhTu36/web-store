// document.getElementById('images').addEventListener('change', function (event) {
//   for (let index = 0; index < event.target.files.length; index++) {
//     const element = event.target.files[index];
//     if (element) {
//       const reader = new FileReader();
//       reader.onload = function (e) {
//         document.getElementById(
//           'previewImage'
//         ).innerHTML += `<div class="item_preview"><div id="item_preview_button_x" onclick="removeImagePreview(${index})"><i class="fa fa-times" aria-hidden="true"></i></div><span>${
//           index + 1
//         }.</span><img src="${e.target.result}" style="width: 250px; margin: 5px;"></div>`;
//       };
//       reader.readAsDataURL(element); // Đọc file dưới dạng URL
//     }
//   }
// });

function removeImagePreview(index) {
  // const itemPreview = document.getElementsByClassName('item_preview');
  // for (let index = 0; index < itemPreview.length; index++) {
  //   itemPreview[index].remove();
  // }
}
document.getElementById('images').addEventListener('change', function () {
  updateFileList();
});

function updateFileList() {
  const input = document.getElementById('images');
  const files = Array.from(input.files); // Chuyển FileList thành mảng
  const fileListContainer = document.getElementById('item_preview');

  fileListContainer.innerHTML = ''; // Xóa danh sách cũ

  files.forEach((file, index) => {
    const listItem = document.createElement('div');
    listItem.textContent = file.name;

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Xóa';
    removeButton.onclick = function () {
      removeFile(index);
    };

    listItem.appendChild(removeButton);
    fileListContainer.appendChild(listItem);
  });
}

function removeFile(indexToRemove) {
  const input = document.getElementById('images');
  const files = Array.from(input.files); // Chuyển FileList thành mảng

  const dataTransfer = new DataTransfer(); // Tạo đối tượng DataTransfer
  files.forEach((file, index) => {
    if (index !== indexToRemove) {
      dataTransfer.items.add(file); // Thêm lại các file không bị xóa
    }
  });

  input.files = dataTransfer.files; // Gán danh sách file mới vào input
  updateFileList(); // Cập nhật lại danh sách hiển thị
}
