document.addEventListener("click", function(event) {
    let navbarCollapse = document.getElementById("navbarCollapse");
    let navbarToggler = document.querySelector(".navbar-toggler");
    if (!navbarCollapse.contains(event.target) && !navbarToggler.contains(event.target)) {
        let bsCollapse = new bootstrap.Collapse(navbarCollapse, {
            toggle: false
        });
        bsCollapse.hide();
    }
});
$(document).ready(function() {
    $('input').on('keyup', function() {
        if ($(this).attr('required') !== undefined) {
            if ($(this).val().trim() === '') {
                $(this).addClass('error-input');
            } else {
                $(this).removeClass('error-input');
            }
        }
    });
});
$(document).ready(function() {
    $('.input-type-email').on('keyup', function() {
        if ($(this).attr('required') !== undefined) {
            if ($(this).val().trim() === '') {
                $(this).addClass('error-input');
            } else {
                $(this).removeClass('error-input');
            }
        }
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if($(this).val().trim() !== '' && !regex.test($(this).val())) {
            $(this).addClass('error-input');
            $(this).addClass('error-input-email');
        }
    });
});