$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: "combobox/get_provinsi.php",
    cache: false, 
    success: function(msg){
    $("#provinsi").html(msg);
    }
  });
$("#provinsi").change(function(){
  var provinsi = $("#provinsi").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kabupaten.php",
        data: {provinsi: provinsi},
        cache: false,
        success: function(msg){
          $("#kabupaten").html(msg);
        }
    });
  });

  $("#kabupaten").change(function(){
  var kabupaten = $("#kabupaten").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kecamatan.php",
        data: {kabupaten: kabupaten},
        cache: false,
        success: function(msg){
          $("#kecamatan").html(msg);
        }
    });
  });

  $("#kecamatan").change(function(){
  var kecamatan = $("#kecamatan").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_kelurahan.php",
        data: {kecamatan: kecamatan},
        cache: false,
        success: function(msg){
  $("#kelurahan").html(msg);
        }
});
});
$("#kelurahan").change(function(){
var kelurahan = $("#kelurahan").val();

    $.ajax({
      type: 'POST',
        url: "combobox/get_biaya.php",
        data: {kelurahan: kelurahan},
        cache: false,
        success: function(msg){
  $("#biayakirim").html(msg);
  
        }
    });
  });
$("#kelurahan").change(function(){
var kelurahan = $("#kelurahan").val();
var subtotal = $("#subtotal").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_total.php",
        data: {kelurahan:kelurahan,subtotal:subtotal},
        cache: false,
        success: function(msg){
  $("#totalall").html(msg);
        }
    });
});
$("#kelurahan").change(function(){
var kelurahan = $("#kelurahan").val();
var subtotal = $("#subtotal").val();
    $.ajax({
      type: 'POST',
        url: "combobox/get_total2.php",
        data: {kelurahan:kelurahan,subtotal:subtotal},
        cache: false,
        success: function(msg){
  $("#tot").html(msg);
        }
    });
  });
 
});