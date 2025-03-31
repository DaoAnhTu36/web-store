$files = $this->request->getFiles();
$check_validate_files = get_validate_upload_file($files);
$rules = $this->categoryModel->validationRules;
$messages = $this->categoryModel->validationMessages;
if (!empty($check_validate_files)) {
$rules['images'] = $check_validate_files;
$messages['images'] = get_message_error_file();
}

if (!$this->validate($rules, $messages)) {
return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
}


<?= view("admin/Layouts/group_button_action_form_view.php", ['function' => 'onSubmitCreate()', 'label' => 'Lưu']) ?>
<td>
    <?= view(
        "admin/Layouts/button_active_index_view.php",
        [
            'is_active' => $item['is_active'],
            'id' => $item['id'],
        ]
    ) ?>
</td>
<td class="action-icons">
    <?= view(
        "admin/Layouts/group_button_action_index_view.php",
        [
            'uri_update' => site_url('admin/category/detail/' . $item['id']),
            'uri_delete' => site_url('admin/category/delete/' . $item['id']),
        ]
    ) ?>
</td>

<?= view(
    "admin/Layouts/group_button_action_form_view.php",
    [
        'type_button' => "submit",
        'label' => 'Lưu'
    ]
) ?>
<?= view(
    "admin/Layouts/group_button_action_form_view.php",
    [
        'type_button' => "submit",
        'label' => 'Cập nhật'
    ]
) ?>

description_

$rules = $this->accountModel->validationRules;
$messages = $this->accountModel->validationMessages;

if (!$this->validate($rules, $messages)) {
return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
}

function onSubmitCreateAccount() {
let full_name = $("#full_name").val();
let user_name = $("#user_name").val();
let password = $("#password").val();
let email = $("#email").val();
let phone = $("#phone").val();
let address = $("#address").val();
let role_id = $("#role_id").val();
$.ajax({
url: '<?= base_url('admin/account/create') ?>',
type: 'POST',
data: {
full_name,
user_name,
password,
email,
phone,
address,
role_id,
},
success: function(response) {
if (response.status) {
onToastrSuccess(response.message);
} else {
onToastrError(response.message);
}
},
error: function(xhr, status, error) {
console.log('Error:', error);
}
});
}