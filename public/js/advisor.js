let activation = document.getElementById("activation");
let revenue = document.getElementById("revenue");
let customers = document.getElementById("customers");



$(document).ready(function () {
    $(".div_open").on("click", function () {
        var target = $(this).data("div");

        $('.indicater').removeClass('active');
        $('.details-container').removeClass('active');
        
        $(".indicater[data-div='" + target + "']").addClass('active');

        if(target == "div-1"){
            $("#activation").addClass('active');
        }else if(target == "div-2"){
            $("#revenue").addClass('active');
        }else if(target == "div-3"){
            $("#customers").addClass('active');
        }
    });

    $(".switch").on("click", function () {
            


    });

});