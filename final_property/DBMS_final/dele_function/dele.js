function realy() {
    var message = "DO YOU WANT TO DELETE?? \nEnter \"delete\"→confirm!";
    var default_1 = "\"Any other\" to cancel";
    var result = prompt(message, default_1);
    if (result != "delete") {
        alert("Don't worry, it still there!");
        return false;
    }
}