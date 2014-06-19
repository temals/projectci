(function($) {

    //dom ready
	$(function()
	{   
        //datePicker jqueryUI
		$( ".datePicker" ).datepicker({
			dateFormat : "yy-mm-dd",
            changeYear : true,
            changeMonth : true
		});
        
        //jquery Chosen
        //$("select").chosen();
		
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
        
        //cloning row
        $(".cloneRow").click(function()
        {
            //pilih baris mana yang akan di cloning
            objClone = $(".rowPrivilege").clone();
            //letakan setelah .displayPrivilege:last yang terakhir artinya ada banyak class displayPrivilege
            $("<tr class='displayPrivilege'>"+objClone.html()+"</tr>").insertAfter(".displayPrivilege:last").fadeIn();
        });
        
        
        //letakkan dataTable di baris akhir
        $(".table").dataTable();
	});
	

})(jQuery);