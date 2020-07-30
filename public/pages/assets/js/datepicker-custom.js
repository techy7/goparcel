$(document).ready(function () {
    var currentDate = new Date();
        currentDate.setDate(currentDate.getDate());
    $('#datepicker-component2').datepicker({
    format: "MM dd, yyyy (D)",
    clearBtn: true,
    todayBtn: "linked",
    todayHighlight: true,
    startDate: currentDate
    });
})
