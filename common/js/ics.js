(function($) {

	$(function()
	{
		$(".table").dataTable();
		
		$(".deleteData").click(function(e)
		{
			con = confirm("Yakin Ingin Menghapus data ini"); 
			if(con == true)
			{
				return true;
			}
			else
			{
				alert("batal menghapus data");
				return false;
				
			}
		});
	});
	

})(jQuery);