(function($) {

    //dom ready
	$(function()
	{   
		var BASE_URL = "http://localhost/project/projectci_2/";
	
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
		
        //check apakah location exists
        locExists = $(".masterlocation").attr("data-value");
        
        var i = 1;
        var getnames = Array();
        var data_value = Array();
        $(".masterlocation").each(function()
          { 
              data_value[i] = $(this).attr("data-value");
              getnames[i] = $(this).attr("name");
              
              if(parseInt(data_value[i]) > 1)
              {
                  $(this).getExistsLocation(getnames[i],data_value[i]);
              }
              
              i = parseInt(i) + 1;
           
          });
        
        
		//getLocation
		$(".masterlocation").change(function(e)
		{
            getval = $(this).val();
            gettag = $(this).attr("tag");
            getname = $(this).attr("name");
            childtag = parseInt(gettag) + 1;
            
			$.ajax({
				url : BASE_URL+"index.php/ajaxcontent/getsublocation",
				type : "post",
				data : {callback:"html",parent_id:getval,name:getname,tag:childtag},
				success : function(data)
				{   
                 
                    $(".masterlocation[tag='"+childtag+"'][name='"+getname+"']").remove();
                    $(data).insertAfter(".masterlocation[tag='"+gettag+"'][name='"+getname+"']");
				}
			});
			
			e.preventDefault();
		});
	});
    
    $.fn.getExistsLocation = (function(name,value)
    {
        var BASE_URL = "http://localhost/project/projectci_2/";
        
        $.ajax({
            url : BASE_URL+"index.php/ajaxcontent/getExistsLocation",
            type : "post",
            data : {callback:"html",value:value,name:name},
            success : function(data)
            {
                $(".masterlocation[name='"+name+"']").parent().html(data);
                //$(".masterlocation[name='"+getname+"']").parent().html(getname);
            }
        });
    });

})(jQuery);