<?= $this->extend('admin/Layouts/main_view.php'); ?>
<?= $this->section('content'); ?>
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-list-alt fa-fw "></i>
                <?= $title ?>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well">
                <input type="file" id="file_input_upload" multiple accept="image/*" style="display:none;" />
                <button type="button" id="btn_choose_file">
                    <i class="fa fa-upload"></i> Chọn ảnh
                </button>
                <div id="preview"></div>
            </div>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body">
                        <div class="gallery">
                            <?php foreach ($files as $file): ?>
                                <div class="img-box" data-name="<?= $file ?>">
                                    <button class="delete-btn">×</button>
                                    <img
                                        class="copy-image"
                                        src="<?= base_url('uploads/' . $file) ?>"
                                        data-url="<?= base_url('uploads/' . $file) ?>"
                                        alt="<?= $file ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.getElementById("btn_choose_file").onclick = () => {
        document.getElementById("file_input_upload").click();
    };

    document.getElementById("file_input_upload").addEventListener("change", async function() {
        const files = [...this.files];
        const maxSize = 150 * 1024; // 150KB
        const compressedFiles = [];

        for (const file of files) {
            if (!file.type.startsWith("image/")) {
                alert(`${file.name} không phải ảnh!`);
                continue;
            }

            // Nén ảnh xuống 150KB
            const compressed = await compressImageTo150KB(file, maxSize);
            compressedFiles.push(compressed);

            // Hiển thị preview
            previewImage(compressed);
        }

        // Sau khi nén xong → upload
        uploadImages(compressedFiles);
    });


    // =============================
    // 🔻 HÀM NÉN ẢNH XUỐNG <= 150KB
    // =============================
    function compressImageTo150KB(file, maxSize) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = (event) => {
                const img = new Image();
                img.src = event.target.result;

                img.onload = () => {
                    const canvas = document.createElement("canvas");
                    const ctx = canvas.getContext("2d");

                    const scale = Math.sqrt(maxSize / file.size);
                    canvas.width = img.width * scale;
                    canvas.height = img.height * scale;

                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    let quality = 0.9;

                    function compress() {
                        canvas.toBlob(
                            (blob) => {
                                if (blob.size > maxSize && quality > 0.1) {
                                    quality -= 0.1;
                                    compress(); // Tiếp tục giảm chất lượng
                                } else {
                                    resolve(blobToFile(blob, file.name));
                                }
                            },
                            "image/jpeg",
                            quality
                        );
                    }

                    compress();
                };
            };
        });
    }

    // Convert Blob → File
    function blobToFile(blob, fileName) {
        return new File([blob], fileName, {
            type: "image/jpeg"
        });
    }


    // =============================
    // 🔻 HIỂN THỊ PREVIEW
    // =============================
    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.style.width = "120px";
            img.style.margin = "5px";
            document.getElementById("preview").appendChild(img);
        };
        reader.readAsDataURL(file);
    }


    // =============================
    // 🔻 GỬI ẢNH LÊN BACKEND (PHP)
    // =============================
    function uploadImages(files) {
        const formData = new FormData();

        files.forEach((file, i) => {
            formData.append("images[]", file, file.name);
        });

        fetch("manager_file/upload_file", {
                method: "POST",
                body: formData,
            })
            .then((res) => res.text())
            .then((data) => console.log("Upload thành công:", data))
            .catch((err) => console.error("Upload lỗi:", err));
    }
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("copy-image")) {
            const url = e.target.getAttribute("data-url");
            navigator.clipboard.writeText(url).then(() => {
                onToastrSuccess("Đã copy link");
            });
        }
    });
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete-btn")) {
            const box = e.target.closest(".img-box");
            const fileName = box.getAttribute("data-name");
            if (!confirm("Bạn có chắc muốn xóa ảnh này?")) return;
            fetch("manager_file/delete_image", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "file_name=" + encodeURIComponent(fileName)
                })
                .then(res => res.text())
                .then(data => {
                    onToastrSuccess(data.message);
                    box.remove();
                })
                .catch(err => console.error(err));
        }
    });
</script>
<?= $this->endSection(); ?>