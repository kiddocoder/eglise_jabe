
var managestudentTable ;
var modalbtn = document.getElementById('modalbtn');
var modalcontainer = document.getElementById('modalcontainer');
var data_tables  = document.getElementById('data_tables');
var modalcontainer4 = document.getElementById('modalcontainer4');
var effectiftotal= document.getElementById('effectiftotal');

$(document).ready(function() {
    
    /**
     * 
     * js manage table
     */
    // manage students data table
    //data_tables.clear().destroy();

 managestudentTable = $('#data_tables').DataTable({
    'ajax': './forms/fetch/fetchallstudents.php',
    'order': []
});


modalbtn.addEventListener('click',function(){
      modalcontainer.style.display='block';
      document.getElementById('numero_error').style.display='none';
	  $("#addstudent")[0].reset();
/**
 * phone number verification *
 */

$("#numero").on('blur',function(){
    numberformate();
    //hideerror();
});
$("#numero").keyup(function(){
   //hideerror();
       // delete all space 
    var numero =document.getElementById("numero").value; 
    numero=numero.replace(/\s/g,'');
// add space between 2 number
numero= numero.replace(/(\d{2})(?=\d)/g,"$1 ");
   document.getElementById('numero_error').style.display='none';
   document.getElementById("numero").value=numero; 
});


function numberformate(){
    var numero =document.getElementById("numero").value;
    var indicatif=document.getElementById("indicatif").value;
    var regex;
    
    if(indicatif==="+257"){
   // regex=/^\d{8}$/;
   regex=/^(\d{2}\s){3}\d{2}$/;
   var regexv=regex.test(numero);
    
    
    if(!regexv){
        //showerror();
        document.getElementById('numero_error').style.display='block';
    }else{
        //hideerror();
             
        document.getElementById('numero_error').style.display='none';
    }
}
    
}
/**
 * phone number verification 
 */
	  $("#addstudent").unbind('submit').bind('submit', function(e) {
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

	  
							$("#addstudent")[0].reset();


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
                            managestudentTable.ajax.reload(null, false);

                                // remove text-error 
                            $(".text-danger").remove();
                           // remove from-group error
                         $(".form-group").removeClass('has-error').removeClass('has-success');
                       }// if response == true 
					}//if success function 

				});//ajax function 
          

            
			}); // form submit button reased
    });// modal btn clicked

    $('#school').on('change',function() {
        
        var schoolId = $(this).val(); // Obtenez l'ID de l'école sélectionnée
         var totals = new XMLHttpRequest();
         totals.open('GET','./forms/fetch/fetchselectedstudent.php?id='+schoolId,true); 
         totals.onreadystatechange = function() {
            if (totals.readyState === 4 && totals.status === 200) {
                var effectif = JSON.parse(totals.responseText);
               // console.log(effectif[0].total);
                var students = 'Students'
                $('#effectiftotal').remove();
                $('#boxeffectif').html('<div class="text" id="effectiftotal"> </div><i style="color:white;" class="fa-solid fa-user-graduate"></i>');
                $('#effectiftotal').html('<h2 class="topic-heading">'+effectif[0].total+'</h2>'+'<h2 class="topic">'+students+'</h2>');
                
            }
        };
        totals.send();

managestudentTable.clear().destroy();

managestudentTable = $('#data_tables').DataTable({
    'ajax': './forms/fetch/fetchstudents.php?id='+schoolId,
    'order': []
});

  

    });// onchange function school select 

    $('#categories').on('change',function(){
        var categories = $(this).val();
         var totals = new XMLHttpRequest();
         totals.open('GET','./forms/fetch/fetchselectedcategorie.php?categorie='+categories,true); 
         totals.onreadystatechange = function() {
            if (totals.readyState === 4 && totals.status === 200) {
                var effectif = JSON.parse(totals.responseText);
               // console.log(effectif[0].total);
                var students = 'Students';
                $('#effectiftotal').remove();
                $('#boxeffectif').html('<div class="text" id="effectiftotal"> </div><i style="color:white;" class="fa-solid fa-user-graduate"></i>');
                $('#effectiftotal').html('<h2 class="topic-heading">'+effectif[0].total+'</h2>'+'<h2 class="topic">'+students+'</h2>');
                
            }
        };
        totals.send();
        
        managestudentTable.clear().destroy();

        managestudentTable = $('#data_tables').DataTable({
            'ajax': './forms/fetch/fetchcategories.php?categorie='+categories,
            'order': []
        });
    });// onchange function categories select 


});// document ready function 


/**
delete js
*/
   
function deletestudent(schoolID = null){
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
        url:'./forms/delete/student.php', 
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
 
         managestudentTable.ajax.reload(null, false);
 
        }
     }
     });
 });
 }// function delete


 
/**
 * update function 
 */
function updatestudent(schoolID = null){
    modalcontainer4.style.display='block';
    /**
 * phone number verification *
 */

$("#numero2").on('blur',function(){
    numberformate();
    //hideerror();
});
$("#numero2").keyup(function(){
   //hideerror();
       // delete all space 
    var numero =document.getElementById("numero2").value; 
    numero=numero.replace(/\s/g,'');
// add space between 2 number
numero= numero.replace(/(\d{2})(?=\d)/g,"$1 ");
   document.getElementById('numero_error2').style.display='none';
   document.getElementById("numero2").value=numero; 
});

function numberformate(){
    var numero =document.getElementById("numero2").value;
    var indicatif=document.getElementById("indicatif").value;
    var regex;
    
    if(indicatif==="+257"){
   // regex=/^\d{8}$/;
   regex=/^(\d{2}\s){3}\d{2}$/;
   var regexv=regex.test(numero);
    
    
    if(!regexv){
        //showerror();
        document.getElementById('numero_error2').style.display='block';
    }else{
        //hideerror();
             
        document.getElementById('numero_error2').style.display='none';
    }
}
    
}
/**
 * phone number verification 
 */
    $.ajax({
        url:'./forms/fetch/fetchselectedstudent1.php',
        type:'post',
        data:{id:schoolID},
        dataType:'json',
        success: function(response){
           if(response.success=true){
            $("#nomelev").val(response.name);
            $("#studentID").val(response.studentID);
            $("#schoolID").val(response.schoolID);
            $("#surname").val(response.surname);
            $("#numero2").val(response.telephone);
            $("#street").val(response.street);
            $("#street_number").val(response.street_number);
            $("#commune").val(response.commune);
            $("#quarter").val(response.quarter);
            $("#age2").val(response.date_naissance);
           }// success function 
        }


    });//ajax function to fetch selected school
    
$("#updatestudent").unbind('submit').bind('submit', function(e) {
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
                    
  
                        $("#updatestudent")[0].reset();


 $("html, body, div.modalcontainer4, div.modalcontent4,div.user_details").animate({scrollTop: '0'}, 100);
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
                        managestudentTable.ajax.reload(null, false);

 }
                }

            });

        });

  

    
}//function update student


    
modalcontainer4.addEventListener('click',function(event){
    if(event.target===modalcontainer4){
     modalcontainer4.style.display='none';
    }
   });