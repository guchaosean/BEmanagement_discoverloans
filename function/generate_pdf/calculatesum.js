jQuery(document).ready(function(){ 
  jQuery("input").blur(function(){
 
	 jQuery('#inputincomesum').val(  parseInt(jQuery('#inputincome1').val())+  parseInt(jQuery('#inputincome2').val())+parseInt(jQuery('#inputincome3').val()));
 
	 jQuery('#inputtotal_expenses').val( parseInt(jQuery('#inputmortgage_monthly').val())+ parseInt(jQuery('#inputrent_monthly').val())+ parseInt(jQuery('#inputliving_expenses').val())+ parseInt(jQuery('#inputcredit_card').val())+ parseInt(jQuery('#inputother_finance').val())+ parseInt(jQuery('#inputother_expenses').val())+ parseInt(jQuery('#inputthis_commitment').val()));   
  
	 jQuery('#inputSurplus').val( parseInt(jQuery('#inputincomesum').val())- parseInt(jQuery('#inputtotal_expenses').val()));
	 
	 
  });
});