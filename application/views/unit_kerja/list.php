	<script type="text/javascript">
	$(document).ready(function() { 
	refreshtable();
	  $(function() {
		applyPagination();
		function applyPagination() {
		  $(".pages a").click(function() {
		   var url = $(this).attr("href");
		    var skkpd =$("#skkpd").val();
		   $.ajax({
			  type: "POST",
			  data: "skkpd="+skkpd,
			  url: url,
			  beforeSend: function() {
				$("#tabledata").html("<div class='loading_div'><img src='<?php echo base_url() ?>img/loading.gif'></div>");
			  },
			  success: function(msg) {
				$("#tabledata").html(msg);
 
			  }
			});
			 return false;
			});
		}
	  }); 
	});
	function refreshtable(){
			 
			 var skkpd =$("#skkpd").val();
			   $.ajax({
			  type: "POST",
			  data: "skkpd="+skkpd,
			  url: "<?php echo base_url()?>unit_kerja/search",
			  beforeSend: function() {
				$("#tabledata").html("<div class='loading_div'><img src='<?php echo base_url() ?>img/loading.gif'></div>");
			  },
			  success: function(msg) {
				$("#tabledata").html(msg);
	 
			  }
			});
			 return false;
	}
	function delete_data(id){
		$( "#infodlg" ).html("Anda Ingin Menghapus Data Ini ?");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true, buttons: {
					 "Ya": function(){
							  $.ajax({
									url:'<?php echo base_url(); ?>unit_kerja/delete/'+id,		 
									type:'POST',
									data:"",
									success:function(data){ 
										  refreshtable()
									}  
								});			
							  $(this).dialog("close");
					  } ,
				  "Tutup": function(){
			   $(this).dialog("close");
				}
		 }});		
	}
	</script>
 
<br>
	<div class="panel panel-primary">
 
  <a href="<?php echo base_url();?>unit_kerja/form" class="btn btn-success btn-sm pull-right" style="margin:5px"> 
   <i class="glyphicon glyphicon-plus"></i> Tambah</a>
   <div class="panel-heading">Data Direktorat

   </div>
  <div class="well" style="margin:0px">
  <input type="text" class="form-control input-sm" onchange="return refreshtable()" 
            id="skkpd" name="skkpd" placeholder="Nama Direktorat" style="width:300px">
	 <div id="tabledata">
	 </div>
 </div>
 </div>
