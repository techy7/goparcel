$(document).ready(function () {
    var currentDate = new Date();
        currentDate.setDate(currentDate.getDate());
    $('#datepicker-component2').datepicker({
    format: "MM dd, yyyy (D)",
    clearBtn: true,
    todayHighlight: true,
    startDate: '+2d'
    });
})
