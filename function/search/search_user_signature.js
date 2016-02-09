
jQuery(document).ready(function(){
    jQuery("#search_form").submit(function() {
    var url = "../../functions/search/search_user_in_signature.php";
    
jQuery.ajax({
           type: "POST",
           url: url,
           data: jQuery("#search_form").serialize(), 
           success: function(data)
           {
               jQuery("#search_result").html(data); 
	       
jQuery("#search_result").find("script").each(function(i) {
                    eval(jQuery(this).text());
                });
           }
         });
    return false; 
});
}); 
