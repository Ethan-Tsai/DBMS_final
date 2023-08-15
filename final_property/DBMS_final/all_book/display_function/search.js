function clear_sear() {

    $.get("./display_function/clear.php", {}, function(data) {
        $("#browse_book").html(data);
    });


}