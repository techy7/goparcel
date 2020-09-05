$(document).ready(function () {
    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate());
    //alert(currentDate);
    startDate = "+1d"
    var dt = new Date();
    var d = new Date().setHours(17,0,0,0);
    if(dt > d){
         dt.setDate(dt.getDate()+2);
    } 
    else{
         dt.setDate(dt.getDate()+1);
    }
   
    console.log(dt);
    
    $('#datepicker-component2').datepicker({
      format: "yyyy-mm-dd",
      clearBtn: true,
      todayHighlight: true,
      startDate: dt,
    });

})
