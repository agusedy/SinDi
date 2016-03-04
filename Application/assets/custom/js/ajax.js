$(document).ready(function() { 

    
    $("#selectGuru").change(function(){
         /*dropdown post */
        $.ajax({
        url:"../../admin/selectguru",    
        data: {nip: $(this).val()},
        // dataType:"json",
        type: "POST",																																																
        success: function(data){
            $("#nmaGuru") .html(data);  
        	}
        });
    });

    $("#validWaliKel").change(function(){
      
        $.ajax({   
        url:"../../validasi/chekwali",    
        data: {
            nip: $("#selectGuru").val(),
            kelas: $("#kelas").val(), 
            ruang: $("#ruang").val(), 
            thn_ajaran: $("#thn_ajaran").val()
        },
        
        // dataType:"json",
        type: "POST",                                                                                                                                                                                               
        success: function(data){
           	$("#WaliSudahAda") .html(data);  
            // $('button').prop('disabled', true);
            }
        });
    });

    $("#-thn_ajaran").change(function(){
      
        $.ajax({   
        url:"../admin/selectsiswa",    
        data: {
            nip: $("#selectGuru").val(),
            kelas: $("#kelas").val(), 
            ruang: $("#ruang").val(), 
            thn_ajaran: $("#thn_ajaran").val()
        },
        
        // dataType:"json",
        type: "POST",                                                                                                                                                                                               
        success: function(data){
           	$("#ListNamaSiswa") .html(data);  
            // $('button').prop('disabled', true);
            }
        });
    });

    $("#===--=-carisiswa").keyup(function(){
      
        $.ajax({   
        url:"../admin/carisiswa",    
        data: {
            carisiswa: $("#carisiswa").val()/*,
            kelas: $("#kelas").val(), 
            ruang: $("#ruang").val(), 
            thn_ajaran: $("#thn_ajaran").val()*/
        },
        
        // dataType:"json",
        type: "POST",                                                                                                                                                                                               
        success: function(data){
           	$("#tablesiswa") .html(data);  
            // $('button').prop('disabled', true);
            }
        });
    });


});