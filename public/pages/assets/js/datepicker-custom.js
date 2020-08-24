$(document).ready(function () {
    var currentDate = new Date();
        currentDate.setDate(currentDate.getDate());

    $startDate = "+1d"
    var dt = new Date();
    var d = new Date().setHours(17,0,0,0);
    if(dt > d){
        $startDate = "+2d"
    }      

    $('#datepicker-component2').datepicker({
    format: "MM dd, yyyy (D)",
    clearBtn: true,
    todayHighlight: true,
    startDate: $startDate
    });
})
