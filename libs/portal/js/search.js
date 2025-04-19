
let timer;
function onSearchProduct() {
    const resultBox = document.getElementById('search-result');
    clearTimeout(timer);
    timer = setTimeout(() => {
        var keyword = document.getElementById("word-search").value;
        keyword = keyword.trim();
        if (keyword == "") {
            resultBox.innerHTML = '';
            resultBox.classList.add('d-none');
            return;
        }
        $.ajax({
            url: baseURL + 'portal/search-product',
            type: "POST",
            data: { keyword: keyword },
            success: function (response) {
                if (response.data.length == 0) {
                    resultBox.innerHTML = '<div class="text-center">Không có sản phẩm nào</div>';
                    resultBox.classList.remove('d-none');
                    return;
                } else {
                    resultBox.innerHTML = response.data.map(item =>
                        `<div class="search-item" onclick="window.location='${baseURL}/portal/chi-tiet-san-pham//${item.slug}.html'">
                          ${item.name} - ${item.category_name}
                        </div>`
                    ).join('');
                    resultBox.classList.remove('d-none');
                }
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
            }
        });
    }, 500); // ⏱ Delay 400ms
}