
var data_tables = document.getElementById('data_tables');  
    var newthead = $('<thead></thead>');
    var columns1 ;
    var columns2;
    var columns1 = ['N°',	'ISHURE',	'Abashitsi','Ababwiye ubutumwa abandi','Abagendereye abarwayi','Abagendereye abafunzwe','Abizera fashije abandi',	'abize indwi','	gusengera mu muryango','Abatanze',	'Appeller'];
   

    var tr  = $('<tr></tr>');
    for( var i =0 ;i< columns1.length;i++){
      var th = $('<th> </th>').text(columns1[i]);
      tr.append(th);
    }// for 
    newthead.append(tr);
    $('#data_tables').append(newthead);


$.ajax({
   url: './forms/fetch/fetchschoolappel.php', // Le script PHP qui retourne les données
   dataType: 'json',
   data: {},
   success: function(data) {
      
     var table =$('#data_tables').DataTable({
      
       data: data, // Utilisez les données retournées
       columns: [
          { data: "numero"},
         { data: "nom" },
 {data:"visitor"},
 {data:"total_prayer"},
 {data:"visitor_seek"},
 {data:"visitor_prison"},
 {data:"total_gift"},
 {data:"student_week"},
 {data:"family_prayer"},
 {data:"commende"},
 {data:"checkbox"}
       ]
     });
   }
});

$("#formappels").unbind('submit').bind('submit', function(e) {
   e.preventDefault();

   var form = $(this);
   var formData = new FormData(this);
 
             $.ajax({
                 url : form.attr('action'),
                 type: form.attr('method'),
                 data: formData,
                 dataType: 'json',
                 cache: false,
                 contentType: false,
                 processData: false,
                 success:function(response) {
 
                     if(response.success == true) {
                     
   
                        $("#formappels")[0].reset();
 
 
  // shows a successful message after operation
  $('#add-product-messages2').html('<div class="alert alert-success">'+
                 '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                 '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
               '</div>');
                       // remove the mesages
                       $(".alert-success").delay(500).show(10, function() {
                             $(this).delay(3000).hide(10, function() {
                                 $(this).remove();
                             });
                         }); // /.alert
                        
 
  }
                 }
 
             });
 
         });


$(document).ready(function() {
    // Écouter les changements sur le select
    $('#school').on('change', function() {
      var schoolId = $(this).val(); // Obtenez l'ID de l'école sélectionnée
      var totals = new XMLHttpRequest();
      totals.open('GET','./forms/fetch/fetchselectedstudent.php?id='+schoolId,true); 
      totals.onreadystatechange = function() {
         if (totals.readyState === 4 && totals.status === 200) {
             var effectif = JSON.parse(totals.responseText);
            // console.log(effectif[0].total);
             var formappels = document.getElementById('formappels');
             formappels.action = './forms/save/save_appel.php?id='+schoolId+'&&total='+effectif[0].total;  
         }
     };
     totals.send();
 
          $("#absbtn1").val(schoolId);
       //show loading button 
       
           
           $("#absbtn2").val(schoolId);
      
        //show loading button 
    
          
          $("#absbtn3").val(schoolId);
    
       //show loading button 
    
           $("#absbtn4").val(schoolId);
      
        //show loading button 
      
          
          $("#absbtn5").val(schoolId);
      
       //show loading button 
      
           
           $("#absbtn6").val(schoolId);
      
           $('#data_tables').DataTable().clear().destroy();
           $('#data_tables thead').remove();
      //  requête Ajax pour obtenir les données des élèves
      $.ajax({
        url: './forms/fetch/fetchappel.php', // Le script PHP qui retourne les données
        type: 'POST',
        dataType: 'json',
        data: { id: schoolId },
        success: function(data) {
         table = $('#data_tables').DataTable({
            
            data: data, // Utilisez les données retournées
            columns: [
               {data:"schoolID",title:''},
               {data:"studentID",title:''},
               { data: "numero",title:'N°'},
              { data: "nom",title:'Nom' },
              { data: "prenom",title:'Surnom'},
              { data: 'Appel',title:'Appel' } 
            ]
          });
          $("#absbtn1").css('display','block');
          $("#absbtn2").css('display','block');
          $("#absbtn3").css('display','block');
          $("#absbtn4").css('display','block');
          $("#absbtn5").css('display','block');
          $("#absbtn6").css('display','block');
         
        },
      });
      $("#absbtn1").click(function(){
         window.location ='abscence.php?id='+schoolId ;
      });
      $("#absbtn2").click(function(){
         window.location ='imprimerelev.php?id='+schoolId ;
      });
      $("#absbtn3").click(function(){
        window.location ='imprimerfiche1.php?id='+schoolId ;
     });
     $("#absbtn4").click(function(){
        window.location ='imprimerfiche2.php?id='+schoolId ;
     });
     $("#absbtn5").click(function(){
        window.location ='imprimerfiche3.php?id='+schoolId ;
     });
     $("#absbtn6").click(function(){
        window.location ='imprimerfiche4.php?id='+schoolId ;
     });
    });
  });






