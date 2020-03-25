$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: "combobox/get_provinsi_drop.php",
    cache: false, 
    success: function(msg){
    $("#provinsidrop").html(msg);
    }
  });
$("#provinsidrop").change(function(){
  var provinsidrop = $("#provinsidrop").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kabupaten_drop.php",
        data: {provinsidrop: provinsidrop},
        cache: false,
        success: function(msg){
          $("#kabupatendrop").html(msg);
        }
    });
  });

  $("#kabupatendrop").change(function(){
  var kabupatendrop = $("#kabupatendrop").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kecamatan_drop.php",
        data: {kabupatendrop: kabupatendrop},
        cache: false,
        success: function(msg){
          $("#kecamatandrop").html(msg);
        }
    });
  });

  $("#kecamatandrop").change(function(){
  var kecamatandrop = $("#kecamatandrop").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kelurahan_drop.php",
        data: {kecamatandrop: kecamatandrop},
        cache: false,
        success: function(msg){
  $("#kelurahandrop").html(msg);
        }
});
});
$("#kelurahandrop").change(function(){
var kelurahandrop = $("#kelurahandrop").val();
var biayakirim = $("#biayakirim").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_biaya_drop.php",
        data: {kelurahandrop: kelurahandrop,biayakirim:biayakirim},
        cache: false,
        success: function(msg){
        
  $("#biayakirim").html(msg);
  
        }
    });
  });
$("#kelurahandrop").change(function(){
var kelurahandrop = $("#kelurahandrop").val();
var subtotal = $("#subtotal").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_total_drop.php",
        data: {kelurahandrop:kelurahandrop,subtotal:subtotal},
        cache: false,
        success: function(msg){
  $("#totalall").html(msg);
        }
    });
});
$("#kelurahandrop").change(function(){
var kelurahandrop = $("#kelurahandrop").val();
var subtotal = $("#subtotal").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_total2_drop.php",
        data: {kelurahandrop:kelurahandrop,subtotal:subtotal},
        cache: false,
        success: function(msg){
  $("#tot").html(msg);
        }
    });
  });
 
});