
var commander = document.getElementById('commander');
var modalcontainer = document.getElementById('modalcontainer');
var columns1 = ['N°','ISHURE','Nbre_Livres','PU','PT','Payer','DATE_P','Dette','Rembours','Date_Remb','Delete','Rembourser'];
   var newthead = $('<thead>  </thead>');

var tr  = $('<tr></tr>');
for( var i =0 ;i< columns1.length;i++){
  var th = $('<th> </th>').text(columns1[i]);
  tr.append(th);
}// for 
newthead.append(tr);
$('#data_tables').append(newthead);


$(document).ready(function() {
    
    /**
     * 
     * js manage table
     */
    // manage commande data table

managecommandeTable = $('#data_tables').DataTable({
    'ajax': './forms/fetch/fetchcommande.php',
    'order': []
});

commander.addEventListener('click',function(){
  modalcontainer.style.display='block';
  $("#addcommande")[0].reset();

 $("#payer").on('focus',function(){
   let pu =$("#pu").val(); 
   let qte =$("#qte").val();
   let total = pu*qte ;
   $(".total_message").html('<div class="tot">'+'<button style="border:none;"> A PAYE : '+total+' FBU</button>'+'</div>');
   $(".tot").delay(500).show(10, function() {
    $(this).delay(3000).hide(10, function() {
        $(this).remove();
    });
   });
 });
 $("#payer").keyup(function(){
    let pu =$("#pu").val(); 
    let qte =$("#qte").val();
    let total = pu*qte ;
   let payer = $("#payer").val();
   if(payer>total){
    $("#payer").val(total);
    $(".total_message").html('<div class="tot">'+'<button style="border:none;">'+'Veuillez PAYER :'+total+' FBU</button>'+'</div>');
    $(".tot").delay(500).show(10, function() {
     $(this).delay(3000).hide(10, function() {
         $(this).remove();
        
     });
    });
   }
  });

  $("#addcommande").unbind('submit').bind('submit', function(e) {
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
                    
  
                        $("#addcommande")[0].reset();


 $("html, body, div.modalcontainer, div.modalcontent,div.user_details").animate({scrollTop: '0'}, 100);
 // shows a successful message after operation
 $('#add-product-messages').html('<div class="alert alert-success">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
              '</div>');
                      // remove the mesages
                      $(".alert-success").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert
                        managecommandeTable.ajax.reload(null, false);

 }
                }

            });

        });
});
});// document.ready

/**
 * delete cmd function 
 */
   
function deletecmd(schoolID = null){
    // var schoolID = this.dataset.schoolid;
    // console.log(schoolID);
     $('.popup_box').css("display", "block");
 
     $('.btn1').click(function(){
 $('.popup_box').css("display", "none");
 });
     /**
      * delete button2 modal clicked 
      */
 $('.btn2').click(function(){
 $('.popup_box').css("display", "none");
         
     $.ajax({
        url:'./forms/delete/commande.php', 
        type:'post',
        data:{id:schoolID},
        dataType:'json',
        success: function(response){
         if(response.success == true){
             // remove success messages
             $(".remove-messages").html('<div class="alert alert-success">'+
         '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
         '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
       '</div>');
 
             // remove the mesages
          $(".alert-success").delay(500).show(10, function() {
                 $(this).delay(3000).hide(10, function() {
                     $(this).remove();
                 });
 
         });
 
         managecommandeTable.ajax.reload(null, false);
 
        }
     }
     });
 });
 }// function delete

/**
 * addremb function 
 */
  function addremb(schoolID = null){
  var addrembform = document.getElementById('addrembform');
  var modalcontainer8 = document.getElementById('modalcontainer8');
  modalcontainer8.style.display='block';

$("#addrembform")[0].reset();
  $.ajax({
    url:'./forms/fetch/fetchremb.php',
    type:'POST',
    data:{id:schoolID},
    dataType:'json',
    success: function(response){
       if(response.success=true){
        
        document.getElementById('dette').value= response.dette+'FBU';
       if(response.dette==0){
       // document.getElementById('payer').style.display='none';
        modalcontainer8.style.display='none';
       alert('Aucune dette !');
       }
        document.getElementById('cmdID').value= response.cmdID;
       }// success function 
    }


});//ajax function to fetch selected school

$("#addrembform").unbind('submit').bind('submit', function(e) {
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
                

                    $("#addrembform")[0].reset();


$("html, body, div.modalcontainer8, div.modalcontent8,div.user_details").animate({scrollTop: '0'}, 100);
// shows a successful message after operation
$('#add-product-messages1').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');
                  // remove the mesages
                  $(".alert-success").delay(500).show(10, function() {
                        $(this).delay(3000).hide(10, function() {
                            $(this).remove();
                        });
                    }); // /.alert
                    managecommandeTable.ajax.reload(null, false);
                     
}
            }

        });
    });

 }// function delete
modalcontainer.addEventListener('click',function(event){
    if(event.target===modalcontainer){
     modalcontainer.style.display='none';
    // location.reload();
    }
   });
   modalcontainer8.addEventListener('click',function(event){
    if(event.target===modalcontainer8){
     modalcontainer8.style.display='none';
    // location.reload();
    }
   });