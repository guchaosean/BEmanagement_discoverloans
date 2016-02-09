
jQuery(document).ready(function(){
    jQuery("#tfnewsearch").submit(function() {

    var url = "../../functions/search/search.php"; // the script where you handle the form input.

    jQuery.ajax({
           type: "POST",
           url: url,
           data: jQuery("#tfnewsearch").serialize(), // serializes the form's elements.
           success: function(data)
           {
               jQuery("#ajax_content").html(data); // show response from the php script.
			   jQuery("#ajax_content").find("script").each(function(i) {
                    eval(jQuery(this).text());
                });
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
    

});
 

function senddatatosearch(value){
	
	   var url = "../../functions/search/search.php"; // the script where you handle the form input.
       var dt = "from_alph" ;
	    
       jQuery.ajax({
           type: "POST",
           url: url,
           data:'data_type='+ dt+'&data_want='+value  , // serializes the form's elements.
		    
           success: function(data)
           {
               jQuery("#ajax_content").html(data); // show response from the php script.
			   jQuery("#ajax_content").find("script").each(function(i) {
                    eval(jQuery(this).text());
                });
           }
         });
	
	}
