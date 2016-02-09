
jQuery(document).ready(function(){
 
	    jQuery("#tfhomesearch_1").submit(function() {

    var url = "../../functions/search/search_home.php"; // the script where you handle the form input.

    jQuery.ajax({
           type: "POST",
           url: url,
           data: jQuery("#tfhomesearch_1").serialize(), // serializes the form's elements.
           success: function(data)
           {
               jQuery("#show_part").html(data); // show response from the php script.
			   jQuery("#show_part").find("script").each(function(i) {
                    eval(jQuery(this).text());
                });
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
    jQuery("#tfhomesearch_2").submit(function() {

    var url = "../../functions/search/search_home.php"; // the script where you handle the form input.

    jQuery.ajax({
           type: "POST",
           url: url,
           data: jQuery("#tfhomesearch_2").serialize(), // serializes the form's elements.
           success: function(data)
           {
               jQuery("#show_part").html(data); // show response from the php script.
			   jQuery("#show_part").find("script").each(function(i) {
                    eval(jQuery(this).text());
                });
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
    jQuery("#tfnewsearch").submit(function() {

    var url = "../../functions/search/search_app.php"; // the script where you handle the form input.

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
    jQuery("#tfnewsearch2").submit(function() {

    var url = "../../functions/search/search_app.php"; // the script where you handle the form input.

    jQuery.ajax({
           type: "POST",
           url: url,
           data: jQuery("#tfnewsearch2").serialize(), // serializes the form's elements.
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
 