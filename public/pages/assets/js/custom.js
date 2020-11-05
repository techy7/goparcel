$(function(){
  $('#form-register').validate();
});

$('input:radio[name="radioPackage"]').change(function(){

    if ($(this).is(':checked') && $(this).val() == "Own Packaging") {
      $("#packageDimensions").show();
    }
    else{
        $("#packageDimensions").hide();
    }

});

$('#clear_data').click(function(){
    $('#senderInfo input').val("");
    $('#pickup_city').find('option[selected]').removeAttr('selected');
});

$('.parameter').change(function(){
  var chosenPackage =  $('input:radio[name="radioPackage"]:checked').val();
  var l = $('#package_length').val(); //length
  var w = $('#package_width').val(); //width
  var h = $('#package_height').val(); //height
  var aw = $('#actual_weight').val(); //height
  var cod = $('#cod').is(":checked");
  var charge_to = $('#charge_to').is(":checked");
  var item = $('#item_amount').val();
  if(typeof chosenPackage === "undefined") {
    chosenPackage = null;
  }
  $.get('computeTotal', {l:l, w:w, h:h,aw:aw,package:chosenPackage,cod:cod,charge_to:charge_to, item:item},function(data){
 

    $("#service_fee").html(data['service_fee'].toFixed(2));
    $("#item_fee").html(data['item_amount'].toFixed(2));
    $("#additional_fee").html(data['additional_fee'].toFixed(2));
    $("#total_amount").html(data['total_amount'].toFixed(2));
    });
});

var max =  $('#additional_instruction').attr('maxLength')

function countChar(val) {
  var len = val.value.length;
    $('#charNum').text((max - len));
};


$('#receiver_city').change(function () {
  var selectedOption = $('#receiver_city option:selected');
  var label = selectedOption.closest('optgroup').attr('label');
  $('#receiver_state').val(label);

});
$('#pickup_city').change(function () {
  var selectedOption = $('#pickup_city option:selected');
  var label = selectedOption.closest('optgroup').attr('label');
  $('#pickup_state').val(label);

});