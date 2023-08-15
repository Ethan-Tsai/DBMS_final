function sortcom() {

    $.get("./sort/sort.php", { by: "good" }, function(data) {
        $("#display").html(data);
    });

    let b = document.getElementById("sort2");
    b.style.backgroundColor = "#B3DEE5";
    let a = document.getElementById("sort1");
    a.style.backgroundColor = "rgb(240, 240, 240)";
    let c = document.getElementById("sort3");
    c.style.backgroundColor = "rgb(240, 240, 240)";
}

function defaultsort() {

    $.get("./sort/sort.php", { by: "def" }, function(data) {
        $("#display").html(data);
    });
    let c = document.getElementById("sort1");
    c.style.backgroundColor = "#B3DEE5";
    let d = document.getElementById("sort2");
    d.style.backgroundColor = "rgb(240, 240, 240)";
    let a = document.getElementById("sort3");
    a.style.backgroundColor = "rgb(240, 240, 240)";

}


function sortlike() {

    $.get("./sort/sort.php", { by: "like" }, function(data) {
        $("#display").html(data);
    });
    let c = document.getElementById("sort3");
    c.style.backgroundColor = "#B3DEE5";
    let d = document.getElementById("sort2");
    d.style.backgroundColor = "rgb(240, 240, 240)";
    let a = document.getElementById("sort1");
    a.style.backgroundColor = "rgb(240, 240, 240)";

}


function sortcom2(str) {

    $.get("./sort/sort2.php", { by: "good", str: str }, function(data) {
        $("#display2").html(data);
    });

    let b = document.getElementById("sort2");
    b.style.backgroundColor = "#B3DEE5";
    let a = document.getElementById("sort1");
    a.style.backgroundColor = "rgb(240, 240, 240)";
    let c = document.getElementById("sort3");
    c.style.backgroundColor = "rgb(240, 240, 240)";
}

function defaultsort2(str) {

    $.get("./sort/sort2.php", { by: "def", str: str }, function(data) {
        $("#display2").html(data);
    });
    let c = document.getElementById("sort1");
    c.style.backgroundColor = "#B3DEE5";
    let d = document.getElementById("sort2");
    d.style.backgroundColor = "rgb(240, 240, 240)";
    let a = document.getElementById("sort3");
    a.style.backgroundColor = "rgb(240, 240, 240)";

}


function sortlike2(str) {
    // alert("a");
    $.get("./sort/sort2.php", { by: "like", str: str }, function(data) {
        $("#display2").html(data);
    });
    let c = document.getElementById("sort3");
    c.style.backgroundColor = "#B3DEE5";
    let d = document.getElementById("sort2");
    d.style.backgroundColor = "rgb(240, 240, 240)";
    let a = document.getElementById("sort1");
    a.style.backgroundColor = "rgb(240, 240, 240)";

}