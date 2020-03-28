$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#drop").hide();
    
     // Ketika user mengganti atau memilih data provinsi
     $("#dropp").change(function(){ // Ketika user mengganti atau memilih data provinsi
        var drop = $("#dropp").val();
        if(drop = "dropshipper"){ 
        
        $("#drop").show(); // Tampilkan loadingnya
        
        }  
    });
      
  });