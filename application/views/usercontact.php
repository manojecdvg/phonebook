<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php 
include("include.php");
include("include1.php");
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/client/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/client/template.css" type="text/css"/>
<script src="<?php echo base_url();?>js/client/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>js/client/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
</script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <style>
.ui-autocomplete {
max-height: 200px;
max-width: 475px;
overflow-y: auto;
/* prevent horizontal scrollbar */
overflow-x: hidden;
z-index:1000;
}
 .ui-autocomplete-loading {
background: white url('<?php echo base_url();?>img/ui-anim_basic_16x16.gif') right center no-repeat;
}
/* IE 6 doesn't support max-height
* we use height instead, but this forces the menu to always be this tall
*/
* html .ui-autocomplete {
height: 100px;
}

<!--
display:hover, tr.selected {
    background-color: #FFCF8B
}


.ui-dialog .ui-state-error {
	padding: .5em;
	display: block;
}

.validateTips {
	border: 1px solid transparent;
	padding: 0.3em;
}


.ui-tabs-vertical {
	width: 100%;
}

.ui-tabs-vertical .ui-tabs-nav {
	padding: .2em .1em .2em .2em;
	float: left;
	width: 15em;
}

.ui-tabs-vertical .ui-tabs-nav li {
	clear: left;
	width: 100%;
	border-bottom-width: 1px !important;
	border-right-width: 0 !important;
	margin: 0 -1px .2em 0;
}

.ui-tabs-vertical .ui-tabs-nav li a {
	display: block;
}

.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active {
	padding-bottom: 0;
	padding-right: .1em;
	border-right-width: 1px;
	border-right-width: 1px;
}

.ui-tabs-vertical .ui-tabs-panel {
	padding: 1em;
	float: left;
	width: 70em;
}
li.ui-state-default.ui-state-hidden[role=tab]:not(.ui-tabs-active) {
    display: none;
  }

-->
</style>
<script type="text/javascript" charset="utf-8">
		var asInitVals = new Array();
			$(document).ready(function() {
				
	 function updateTips(id, t ,o) {
id.text( t ).addClass( "ui-state-highlight" );
o.val(t)
o.addClass( "ui-state-error" );
o.focus()
setTimeout(function() {
id.removeClass( "ui-state-highlight", 1500 );
o.removeClass( "ui-state-error" );
o.val('')
}, 2000 );
}

 $('#month').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'MM yy',
maxDate: "-1M",
   viewMode: "months", 
   minViewMode: "months",
    onClose: function () {
      var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();

      var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

      $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
      $(this).datepicker('refresh');
    },

    beforeShow: function () {
      if ((selDate = $(this).val()).length > 0) 
      {
        iYear = selDate.substring(selDate.length - 4, selDate.length);

        iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), $(this).datepicker('option', 'monthNames'));

        $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
      }
    }
  });

   $("#month").focus(function () {
      $(".ui-datepicker-calendar").hide();
      $("#ui-datepicker-div").position({
          my: "center top",
          at: "center bottom",
          of: $(this)
      });
   });

   $("#month").blur(function () {
     $(".ui-datepicker-calendar").hide();
   });	

 function split( val ) {
return val.split( /,\s*/ );
}
function extractLast( term ) {
return split( term ).pop();
}

	
		
		


	
	
	



 
//$( "#dob" ).datepicker();	
	
	
									   
				var oTable = $('#phonebook').dataTable( {
			
					"sDom": 'RC<"clear">rtip',
					//"sScrollY": $(window).height()-190,
					  "sScrollX": "100%",
        			"sScrollXInner": "100%",
        			"bScrollCollapse": true,
					// "bInfo" : false,
					"iDisplayStart": 0,
					"iDisplayLength":10,
					"bDestroy":true,
					"responsive": true,
					"sPaginationType": "full_numbers",
					"bFilter": true,
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": true,
					"bDeferRender": true,
					"sServerMethod": "POST",
				    "aLengthMenu": [10, 15],
					"aaSorting": [[ 5, "desc" ],[ 6, "asc" ]],
					"sAjaxSource": '<?php echo base_url();?>index.php/phonebook/userContactAjax/'+<?php echo $uid; ?>,
					"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
			            /* Append the grade to the default row class name */

	//oTablefile.fnSetColumnVis( 2,false);
	//if(iDisplayIndex==2)
	//hiderow(oTablefile,nRow)
									//alert()
									
	$( "#dialog-form-success-file1" ).dialog({
					autoOpen: false,
					height: 150,
					width: 250,
					title:"PhoneBook",
					modal: true,
					buttons: {
						
						"Ok": function() {
							$( this ).dialog( "close" );
							
							//var current_index = $("#tabs").tabs("option","active");
							//	$("#tabs").tabs('load',current_index);
							
						oTablefile.fnDraw();
						//$('#file').dataTable().fnStandingRedraw();
					},
						"Close": function() {
							$( this ).dialog( "close" );
								oTablefile.fnDraw();
						//	var current_index = $("#tabs").tabs("option","active");
								//$("#tabs").tabs('load',current_index);
							
						}
					},
					close: function() {
						$("#file").dataTable().fnDraw();
					}
				});								
						
			$('td:eq(1)', nRow).html( '<a href="#" class="viewEdit" id="'+aData[1]+'"><img name="Edit" src="<?php echo base_url() ?>img/edit.jpg" width="20" height="20" alt="Edit" /></a>'  );						
	
	//$('td:eq(6)', nRow).html( '<font color="blue" size="2px"><b>Global</b></font>' );

			        },
				    "aoColumns": [
							{"sClass": "center","bVisible": true, "bSortable": false},
							
							{"sClass": "center","bVisible": true, "bSortable": false},
							{"sClass": "center","bVisible": true, "bSortable": false},
							{"sClass": "left","bVisible": true, "bSortable": true},	
							{"bVisible": true, "bSortable": true},
							{"bVisible": true, "bSortable": true},	
							{"bVisible": true, "bSortable": true},				
				              ]
				} );
				
					$( "#check" )
					.button({
icons: {
primary: "ui-icon-document"
}})
					.click(function() {
						
						$( "#frmaddcontact")[0].reset()
								

	



					$( "#dialog-form-add-contact" ).dialog( "open" );  
						
						});
						
											$( document ).on( "click", "#phonebook tbody tr", function() {	
																				  
			
					
			var values = $('.checkbox').map(function(i,el){
			
    if($(el).is(':checked')){
		
		$(this).closest('tr').addClass("selected"); 
		
        return $(el).val()
    }else {
        $(this).closest('tr').removeClass("selected");
	}
}).get();		

$('#idsCheck').val(values)

//});
	
					
    } );
	
						
						$( document ).on( "click", "#phonebook .viewEdit", function() {

										uid=this.id
										
											

$.ajax({
	type: "POST",
	dataType:"json",

	data:{'id': uid},
	url: "<?php echo base_url()?>index.php/phonebook/getUserContact",
	success: function(data)
	{
		//alert(data.notify_start);
		
	    $('#frmedit #firstName').val(data.firstName);
	    $('#frmedit #lastName').val(data.lastName);
	   $('#frmedit #email').val(data.email);
  $('#frmedit #mobileNo').val(data.mobileNo);
	    //$("#listsEdit").val(data.campaign_list_id.split('@'));
	    //$("#listsEdit").refresh();
	}});
$( "#dialog-form-edit" ).data('uid',uid).dialog( "open" );


																			   });
						
						
						$( "#approve" )
					.button({
icons: {
primary: "ui-icon-arrowreturn-1-w"
}})
					.click(function() {
						
					
									
		
									
						if($('#idsCheck').val()=='')			
						{
						$( "#dialog-form-success #dvmess" ).html("Select Records to update")
						$( "#dialog-form-success" ).dialog( "open" );	
						}else{
						$.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'ids': $('#idsCheck').val()},
						        url: "<?php echo base_url()?>index.php/phonebook/deleteUserContact",
						      success: function(data)
						        {  
								 $( "#dialog-form-success #dvmess" ).html(data.msg)
								 
			
								// oTable.fnDraw();
								 
									//$('unSentCheck').dataTable({ "bRetrieve": true }).fnDraw();
							 		$( "#dialog-form-success" ).dialog( "open" );
								}
			   				})		
						}
							
	
						
						
						});		
						
						
						
				$( "#reject" )
					.button({
icons: {
primary: "ui-icon-arrowreturn-1-w"
}})
					.click(function() {
						
					
									
		
									
						if($('#idsCheck').val()=='')			
						{
						$( "#dialog-form-success #dvmess" ).html("Select Records to update")
						$( "#dialog-form-success" ).dialog( "open" );	
						}else{
						$.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'ids': $('#idsCheck').val()},
						        url: "<?php echo base_url()?>index.php/phonebook/deleteUserContact",
						      success: function(data)
						        {  
								 $( "#dialog-form-success #dvmess" ).html(data.msg)
								 
			
								// oTable.fnDraw();
								 
									//$('unSentCheck').dataTable({ "bRetrieve": true }).fnDraw();
							 		$( "#dialog-form-success" ).dialog( "open" );
								}
			   				})		
						}
							
	
						
						
						});		
												
						
						
					
						
						
				
				
			





$("#dialog-confirm").dialog({
     autoOpen: false,
     modal: true,
	 
	
     buttons : {
          "Yes" : function(event) {
                    
					
					 $( "#dialog-confirm").dialog( "close" );
					
				
				   $.blockUI({ message: '<h2><img src="<?php echo base_url()?>/img/ajax-loader_2.gif" />Your file is being generated, please wait...</h2>' });  
							$("#dialog-form-add .validateTips").html('Please Wait .... Generating Report')
							event.preventDefault();
							$.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'form': $("#frmadd").serialize()},
						        url: "<?php echo base_url()?>index.php/research/generate",
						        success: function(data)
						        {   
						          
							        	      if(data.response==1){
								oTable.fnDraw();
							        	   $( "#dialog-form-add").dialog( "close" );
									
										    $( "#dialog-form-success #dvmess" ).html(data.msg)
										   $( "#dialog-form-success" ).dialog( "open" );
							        	   
							           }
									    else if(data.response==2){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 $( "#dialog-form-add" ).dialog( "close" );
								 $( "#dialog-form-error #dvmess" ).html(data.msg)
											  $( "#dialog-form-error" ).dialog( "open" );
							           }
									   
							           else								      
							        	  {
											// 
									
  oTable.fnDraw();
											 o=$('#dialog-form-add #'+data.field+'')
									   		  $("#frmadd #"+data.field).focus();
							  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
											  
										  } 	

						        }, error: function () {
									$("#dialog-form-add .validateTips").html('Unable To Connect Server, Please Contact System Administrator') 

  }
						    });
						
				   
				   	
					
					
					
					
					
					
					
					
					
					 
          },
          "No" : function() {
            $(this).dialog("close");
          }
        }
      });


	

	
				
var forms='';
				
			
			
			
	$( "#dialog-form-error" ).dialog({
					autoOpen: false,
					height: 175,
					width: 375,
					title:"PhoneBook",
					modal: true,
					buttons: {
						
						"Ok": function() {
							$( this ).dialog( "close" );
							//location.reload();
							//oTable.fnDraw();
						}
					},
					close: function() {
						//location.reload();
						//oTable.fnDraw();
					}
				});
		
			$( "#dialog-form-success" ).dialog({
					autoOpen: false,
					height: 175,
					width: 270,
					title:"PhoneBook",
					modal: true,
					buttons: {
						
						"Ok": function() {
							$( this ).dialog( "close" );
						oTable.fnDraw();
					
						}
					},
					close: function() {
						$( this ).dialog( "close" );
	

					}
				});
		
		
		
		
			
		
		
		
		
			var extra_data = "";
		$(document).ajaxStop($.unblockUI);	
			$( "#dialog-form-add" ).dialog({
					autoOpen: false,
					height: 375,
					width: 375,
					modal: true,
			
					zIndex: 1000 ,
					show: {
				  		effect: "scale",
				  		duration: 600
				  		},
				  hide: {
				  effect: "explode",
				  duration: 600
				  },
					title:"Add User",
					modal: true,
					buttons: [
						{
               text: "Submit",
               "class": 'submitButton',
               click: function(event) {
				   $.blockUI({ message: '<h2><img src="<?php echo base_url()?>/img/ajax-loader_2.gif" />Your file is being generated, please wait...</h2>' });  
							$("#dialog-form-add .validateTips").html('Please Wait ....')
							event.preventDefault();
							$.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'form': $("#frmadd").serialize()},
						        url: "<?php echo base_url()?>index.php/phonebook/addUserContact",
						        success: function(data)
						        {   
						          
							        	      if(data.response==1){
								oTable.fnDraw();
							        	   $( "#dialog-form-add").dialog( "close" );
										    $( "#dialog-form-success #dvmess" ).html(data.msg)
										   $( "#dialog-form-success" ).dialog( "open" );
							        	   
							           }
									    else if(data.response==2){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 $( "#dialog-form-add" ).dialog( "close" );
								 $( "#dialog-form-error #dvmess" ).html(data.msg)
											  $( "#dialog-form-error" ).dialog( "open" );
							           }
									     else if(data.response==3){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 //$( "#dialog-form-add" ).dialog( "close" );
							
											  $( "#dialog-confirm" ).dialog( "open" );
							           }
							           else								      
							        	  {
											// 
									
  oTable.fnDraw();
											 o=$('#dialog-form-add #'+data.field+'')
									   		  $("#frmadd #"+data.field).focus();
							  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
											  
										  } 	

						        }, error: function () {
									$("#dialog-form-add .validateTips").html('Unable To Connect Server, Please Contact System Administrator') 

  }
						    });
						
				   
				   }
						},
							{
               text: "Cancel",
               "class": 'cancelButton',
               click: function() {
				
				$("#frmadd")[0].reset()
							$( this ).dialog( "close" );
					
						
				   
				   }
							}
					],
					close: function() {
						$("#frmadd")[0].reset()
				
						//allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});
	
	
	
	
	
	
	var extra_data = "";
		$(document).ajaxStop($.unblockUI);	
			$( "#dialog-form-edit" ).dialog({
					autoOpen: false,
					height: 375,
					width: 375,
					modal: true,
			
					zIndex: 1000 ,
					show: {
				  		effect: "scale",
				  		duration: 600
				  		},
				  hide: {
				  effect: "explode",
				  duration: 600
				  },
					title:"Edit User",
					modal: true,
					buttons: [
						{
               text: "Submit",
               "class": 'submitButton',
               click: function(event) {
				   $.blockUI({ message: '<h2><img src="<?php echo base_url()?>/img/ajax-loader_2.gif" />Your file is being generated, please wait...</h2>' });  
							$("#dialog-form-add .validateTips").html('Please Wait ....')
							event.preventDefault();
							$.ajax({
						        type: "POST",
								dataType:"json",
						     data:{'uid': $( "#dialog-form-edit" ).data("uid"),'form': $("#frmedit").serialize()},
						        url: "<?php echo base_url()?>index.php/phonebook/editUserContact",
						        success: function(data)
						        {   
						          
							        	      if(data.response==1){
								oTable.fnDraw();
							        	   $( "#dialog-form-edit").dialog( "close" );
										    $( "#dialog-form-success #dvmess" ).html(data.msg)
										   $( "#dialog-form-success" ).dialog( "open" );
							        	   
							           }
									    else if(data.response==2){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 $( "#dialog-form-edit" ).dialog( "close" );
								 $( "#dialog-form-error #dvmess" ).html(data.msg)
											  $( "#dialog-form-error" ).dialog( "open" );
							           }
									     else if(data.response==3){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 //$( "#dialog-form-add" ).dialog( "close" );
							
											  $( "#dialog-confirm" ).dialog( "open" );
							           }
							           else								      
							        	  {
											// 
									
  oTable.fnDraw();
											 o=$('#dialog-form-edit #'+data.field+'')
									   		  $("#frmedit #"+data.field).focus();
							  jQuery("#frmedit #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
											  
										  } 	

						        }, error: function () {
									$("#dialog-form-edit .validateTips").html('Unable To Connect Server, Please Contact System Administrator') 

  }
						    });
						
				   
				   }
						},
							{
               text: "Cancel",
               "class": 'cancelButton',
               click: function() {
				
				$("#frmadd")[0].reset()
							$( this ).dialog( "close" );
					
						
				   
				   }
							}
					],
					close: function() {
						$("#frmadd")[0].reset()
				
						//allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});
	
	
	
	
	
	
	
	var extra_data = "";
		$(document).ajaxStop($.unblockUI);	
			$( "#dialog-form-add-contact" ).dialog({
					autoOpen: false,
					height: 375,
					width: 375,
					modal: true,
			
					zIndex: 1000 ,
					show: {
				  		effect: "scale",
				  		duration: 600
				  		},
				  hide: {
				  effect: "explode",
				  duration: 600
				  },
					title:"Add User Contact",
					modal: true,
					buttons: [
						{
               text: "Submit",
               "class": 'submitButton',
               click: function(event) {
				   $.blockUI({ message: '<h2><img src="<?php echo base_url()?>/img/ajax-loader_2.gif" /> please wait...</h2>' });  
							$("#dialog-form-add-contact .validateTips").html('Please Wait ....')
							event.preventDefault();
							$.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'form': $("#frmaddcontact").serialize()},
						        url: "<?php echo base_url()?>index.php/phonebook/addUserContact",
						        success: function(data)
						        {   
						          
							        	      if(data.response==1){
								oTable.fnDraw();
							        	   $( "#dialog-form-add-contact").dialog( "close" );
										    $( "#dialog-form-success #dvmess" ).html(data.msg)
										   $( "#dialog-form-success" ).dialog( "open" );
							        	   
							           }
									    else if(data.response==2){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 $( "#dialog-form-add-contact" ).dialog( "close" );
								 $( "#dialog-form-error #dvmess" ).html(data.msg)
											  $( "#dialog-form-error" ).dialog( "open" );
							           }
									     else if(data.response==3){
											oTable.fnDraw();
										//  jQuery(".ui-dialog-buttonpane button:contains('Generate')").attr("disabled", true).addClass("ui-state-disabled");
										//  $("#frmadd #"+data.field).focus();
							//  jQuery("#frmadd #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
							 //$( "#dialog-form-add" ).dialog( "close" );
							
											  $( "#dialog-confirm" ).dialog( "open" );
							           }
							           else								      
							        	  {
											// 
									
  oTable.fnDraw();
											 o=$('#dialog-form-add-contact #'+data.field+'')
									   		  $("#frmadd #"+data.field).focus();
							  jQuery("#frmaddcontact #"+data.field).validationEngine('showPrompt', data.msg, 'error', true)
											  
										  } 	

						        }, error: function () {
									$("#dialog-form-add-contact .validateTips").html('Unable To Connect Server, Please Contact System Administrator') 

  }
						    });
						
				   
				   }
						},
							{
               text: "Cancel",
               "class": 'cancelButton',
               click: function() {
				
				$("#frmadd")[0].reset()
							$( this ).dialog( "close" );
					
						
				   
				   }
							}
					],
					close: function() {
						$("#frmadd")[0].reset()
				
						//allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});		
			
			
			
		$( "#dialog-form-csv" ).dialog({
					autoOpen: false,
					height: 270,
					width: 620,
					title:"Download CSV",
					modal: true,
					buttons: {
					
						"Close": function() {
							$( this ).dialog( "close" );
								oTable.fnDraw();
							//location.reload();
						}
					},
					close: function() {
						//allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});	
				
			
			
			
			/*	$('#frmadd #ProcessName').on('change', function() {
	
		
		
	
 $.ajax({
						        type: "POST",
								dataType:"json",
						        data:{'productid': $(this).val()},
						        url: "<?php echo base_url()?>index.php/accounts/getCompany",
						        success: function(data)
						        {   
								//alert($(this).val());
							
								$("#dvcompany").html(data.company);


						        }
						    }); 
});*/

			

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
			$( "#footocmc #search_date" ).datepicker();
			
			$( "#footocmc #search_sdate" ).datepicker();
					$("#footocmc input").keyup( function () {
					/* Filter on the column (the index) of this element */
					//alert($("#footocmc input").index(this))
					oTable.fnFilter( this.value, $("#footocmc input").index(this) );
				} );
					
				$( "#footocmc #search_date" ).change(function () {
					/* Filter on the column (the index) of this element */
					$( "#footocmc #search_date" ).val(this.value)
					oTable.fnFilter( this.value, $("#footocmc input").index(this) );
				} );	
					
				$( "#footocmc #search_sdate" ).change(function () {
					/* Filter on the column (the index) of this element */
					$( "#footocmc #search_sdate" ).val(this.value)
					oTable.fnFilter( this.value, $("#footocmc input").index(this) );
				} );	
					
					
					
				 
				$("#footocmc input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("#footocmc input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("#footocmc input").blur( function () {
					var $parent=$(this).closest('#footocmc');	
					 var index=$parent.find('input').index(this);					
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("#footocmc input").index(this)];
					}
				} );

				
			} );


			$(function() {
    $('.checkall').on('click', function () {
$('input:checkbox').not(this).prop('checked', this.checked);
if(this.checked)
$('#idsCheck').val('All')
else
$('#idsCheck').val('')
    });
	
					
					





	



				$( "#create" )
					.button({
icons: {
primary: "ui-icon-document"
}})
					.click(function() {
									 
					
					window.location.href = '<?php echo base_url() ?>'
	
					});





				

});

				
				jQuery(document).ready(function(){
		
	
	jQuery("#frmadd").validationEngine({autoHidePrompt:true});
	jQuery("#frmaddcontact").validationEngine({autoHidePrompt:true});
			  	
		});
		</script>
</head>
<body>






<div id="dialog-confirm" title="Rerun Benchmark?" style="display:none">
  Are You Sure You Want to Rerun Benchmark?
</div>







<div id="dialog-form-error" style="display: none">
		<p>
  <div id="dvmess">Message</div>
		</p>
</div>
    
    
    
    
    
    
    
    
<div id="dialog-form-success" style="display: none">
		<p>
  <div id="dvmess">Message</div>
		</p>
</div>
    
    
    
    
        

    
    
    
    
    
    
    
    
    
    
    
    
    
    
<div id="dialog-form-add" style="display:none" >


		<form id='frmadd' name="frmadd" class="formular validationEngineContainer">
     
    <input name="uid" id="uid" type="hidden" style="display:none" readonly>
	
		<label for="first_name">First Name<font color="#FF0000"> *</font>
		  <input type="text" name="firstName" id="firstName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft">
		</label>
          
         <label for="last_name">Last Name<font color="#FF0000"> *</font>
		  <input type="text" name="lastName" id="lastName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>  
          
          <label for="mobile_no">Contact Number<font color="#FF0000"> *</font>
		  <input type="text" name="mobileNo" id="mobileNo"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>
        
        
       <label for="email_id">Email ID<font color="#FF0000"> *</font>
		  <input type="text" name="email" id="email"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label> 
        
        
		</form>
</div>


<div id="dialog-form-edit" style="display:none" >


		<form id='frmedit' name="frmedit" class="formular validationEngineContainer">
     
    
	
		<label for="first_name">First Name<font color="#FF0000"> *</font>
		  <input type="text" name="firstName" id="firstName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft">
		</label>
          
         <label for="last_name">Last Name<font color="#FF0000"> *</font>
		  <input type="text" name="lastName" id="lastName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>  
          
          <label for="mobile_no">Contact Number<font color="#FF0000"> *</font>
		  <input type="text" name="mobileNo" id="mobileNo"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>
        
        
       <label for="email_id">Email ID<font color="#FF0000"> *</font>
		  <input type="text" name="email" id="email"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label> 
        
        
		</form>
</div>





<div id="dialog-form-add-contact" style="display:none" >


		<form id='frmaddcontact' name="frmaddcontact" class="formular validationEngineContainer">
     
    <input name="uid" id="uid" type="hidden" style="display:none" value="<?php echo $uid; ?>" readonly>
	
		  <label for="first_name">First Name<font color="#FF0000"> *</font>
		  <input type="text" name="firstName" id="firstName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft">
		</label>
          
         <label for="last_name">Last Name<font color="#FF0000"> *</font>
		  <input type="text" name="lastName" id="lastName"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>  
          
          <label for="mobile_no">Contact Number<font color="#FF0000"> *</font>
		  <input type="text" name="mobileNo" id="mobileNo"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label>
        
        
       <label for="email_id">Email ID<font color="#FF0000"> *</font>
		  <input type="text" name="email" id="email"  class="validate[required] select ui-widget-content ui-corner-all" style="width:305px;" autocomplete="off" data-prompt-position="topLeft" >
		</label> 
        
        
		</form>
</div>





















	
<div id="dialog-form-upload-file"  style="display: none">
<iframe id='uploadiframe-file' src=""></iframe> 
</div>      
    
<div id="dialog-form-xls"  style="display: none">
<iframe id='xlsiframe' src=""></iframe> 
</div> 	
<br>
<button id="create"  class="submitButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">Back</button>
<button id="check" class="submitButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" >Add Contact</button>
<button id="reject" class="cancelButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" >Delete</button>


<br>
	<br>
<input name="idsCheck" id="idsCheck" type="hidden" style="display:none">
<table cellpadding="1" cellspacing="1" border="0" class="display"
		id="phonebook" width="100%">
		<thead>
			<tr>

	<th width="4%" align="center"><input name="checkAll" id="checkAll"  class="checkall" type="checkbox" value=""></th>
    			<th width="6%">Edit</th>
    			<th width="5%">Sl.No.</th>
				<th width="22%">First Name</th>
				<th width="21%">Last Name</th>
				<th width="23%">Contact Number</th>
				<th width="19%">Email ID</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
		<tfoot id="footocmc">
			<tr>

			<th><input type="hidden" name="search_engine"
					value="Search By Vacancy" class="search_init" /></th>
			<th><input type="hidden" name="search_edit"
					value="Search By Vacancy" class="search_init" /></th>
			<th><input type="hidden" name="search_vae" value="Search By Vacancy"
					class="search_init" /></th>
                    <th><input name="search_Code" type="text" class="search_init" 
					value="" /></th>
				<th><input name="search_name2" type="text" class="search_init" 
					value="" /></th>
				<th><input name="search_name" type="text" class="search_init" 
					value="" /></th>
				<th><input name="search_name3" type="text" class="search_init" 
					value="" /></th>
			</tr>
		</tfoot>
	</table>

</body>
</html>