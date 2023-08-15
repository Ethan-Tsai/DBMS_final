function cart(book, mid) {



    $.get("../tran_saction/cart.php", { book: book, mid: mid }, function(data) {
        $('#load_cart').html(data);
        $.get("../tran_saction/cartnum.php", {}, function(data) {
            $('#cart_num').html(data);

        });
    });
    // setTimeout(0.5);
    // $.get("../tran_saction/cartnum.php", {}, function(data) {
    //     $('#cart_num').html(data);
    //     alert("aa");
    // });


}