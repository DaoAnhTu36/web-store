function onFeedback(productId) {
    let fullname = $('#fullname').val();
    let email = $('#email').val();
    let content = $('#content').val();
    if (!fullname || !email || !content) {
        return;
    }
    $.ajax({
        type: 'POST',
        url: baseURL + 'portal/customer-client/add-new-feedback',
        data: {
            fullname,
            email,
            content,
            productId
        },
        success: function (response) {
            if (response.status) {
                $('#fullname').val('');
                $('#email').val('');
                $('#content').val('');
                let htmlComment = `<div class="d-flex mb-2">
                                        <div class="" style="width: 100%;">
                                            <p class="mb-2" style="font-size: 14px;">`+ response.data.created_at + `</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>`+ response.data.created_by + `</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                </div>
                                            </div>
                                            <p style="width:100%; word-wrap: break-word;">`+ response.data.comment + `</p>
                                        </div>
                                    </div>`
                $('#comments').prepend(htmlComment);
            }
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        },
    });
}