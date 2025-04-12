function onSubmitCreate(requestUrl) {
  let title = $('#title').val();
  let description = $('#description').val();
  let images = $('#images')[0].files;

  let formData = new FormData();
  formData.append('title', title);
  formData.append('description', description);
  for (let i = 0; i < images.length; i++) {
    formData.append('images[]', images[i]);
  }

  $.ajax({
    url: requestUrl,
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.status) {
        onToastrSuccess(response.message);
        formData = new FormData();
        $('#title').val('');
        $('#description').val('');
        $('#images').val('');
        $('#item_preview').html('');
      } else {
        onToastrError(response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    },
  });
}
