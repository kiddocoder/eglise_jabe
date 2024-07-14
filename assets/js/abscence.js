var managearchiveTable;
var archivebtn= document.getElementById('viderarchive');

function deletearchive(schoolID = null){
    // var schoolID = this.dataset.schoolid;
     console.log(schoolID);
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
        url:'./forms/delete/archive.php', 
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
 
        // managearchiveTable.ajax.reload(null, false);
 
        }
     }
     });
 });
 }// function delete

