function sortlike() {

    $.get("sort.php", { by: "good" }, function(data) {
        $("#browse_book").html(data);
    });

    let b = document.getElementById("sort2");
    b.style.backgroundColor = "#B3DEE5";
    let a = document.getElementById("sort1");
    a.style.backgroundColor = "rgb(240, 240, 240)";
}

function defaultsort() {

    $.get("sort.php", { by: "def" }, function(data) {
        $("#browse_book").html(data);
    });
    let c = document.getElementById("sort1");
    c.style.backgroundColor = "#B3DEE5";
    let d = document.getElementById("sort2");
    d.style.backgroundColor = "rgb(240, 240, 240)";

}