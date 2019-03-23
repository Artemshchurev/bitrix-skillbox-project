$(document).ready(function () {
    $('select.js_sort_event, select.js_quantity_event').on('change', function (e) {
        e.preventDefault();
        window.location.href = $(this).val();
		return false;
    });
});