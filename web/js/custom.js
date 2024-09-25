$(document).ready(function() {
    $("#reset").on("click", function() {
        $("input").val("");
        $("select").val("");
    });
});