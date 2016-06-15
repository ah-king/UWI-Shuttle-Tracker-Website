function deleteBook(id){

	if (confirm("Are you sure you want to delete this announcement? This cannot be undone.") == true) 
	{
       $.post("delete.php", {ID:id}, function(data){

			// $('#status').html(data);
			alert(data);
		});
    } 
    else {
        
    }
	
}

function deleteRoute(id){

	if (confirm("Are you sure you want to delete this route? This cannot be undone.") == true) 
	{
       $.post("delete.php", {IDR:id}, function(data){

			// $('#status').html(data);
			alert(data);
		});
    } 
    else {
        
    }
	
}