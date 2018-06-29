<?php 

if(isset($_POST['upload'])){
	$file=$_FILES['file'];
	$file_name=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];
	$file_tem_loc=$_FILES['file']['tmp_name'];
	$file_store="excel_files/".$file_name;
	setcookie('file_addr',$file_store,time()+100,"/");

	if($file_type=='application/vnd.ms-excel.sheet.macroEnabled.12'){
		move_uploaded_file($file_tem_loc,$file_store);
			unset($_FILES['file']);
		
	}
	else{
		echo "</br>";
		echo "Upload only RDS Files";
		echo "</br>";
	}

}else {
		header("upload2.php");
	}



$val="";
if(isset($_COOKIE['file_addr'])){
$val=$_COOKIE['file_addr'];
//echo $val;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>
Style Get data from excel sheet
</title>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="xlsx.full.min.js"></script>
</head>

<body>
<script>
var url=" <?php echo $file_store ?> ";
var oReq = new XMLHttpRequest();
oReq.open("GET", url, true);
oReq.responseType = "arraybuffer";
var star="";
oReq.onload= function(e){
	
	var arraybuffer=oReq.response;
	
	//convert data to binary string.
	var data =new Uint8Array(arraybuffer);
	var arr=new Array();
	for(var i=0; i!= data.length; ++i) arr[i]= String.fromCharCode(data[i]);
	var bstr=arr.join("");
	
	//call XLSX.
	var workbook=XLSX.read(bstr,{type:"binary"});
	//do something with workbook.
	var first_sheet_name= workbook.SheetNames[0];
	
	//Get worksheet
	if (typeof workbook.Sheets['Ports, PVCs, & Logical Channels'] == 'undefined'){
		window.alert("Upload Only RDS Files!");
		window.location.href = "upload2.php";
	}
	var worksheet=workbook.Sheets['Ports, PVCs, & Logical Channels'];
	
	
	/* get the range */
	var range = XLSX.utils.decode_range(worksheet['!ref']);
	/* skip n rows */
	range.s.r+= 21;
	if(range.s.r >= range.e.r) range.s.r = range.e.r;
	/* update range */
	worksheet['!ref'] = XLSX.utils.encode_range(range);
	//alert(range.s.r);
	const wb_has_macro = (wb) => !!wb.vbaraw || wb.SheetNames.map(n => wb.Sheets[n]).some(ws => ws && ws['!type'] == 'macro');
	
	//var star=XLSX.utils.sheet_to_html(worksheet);
	var star =JSON.stringify(XLSX.utils.sheet_to_json(worksheet,{defval:" "}));
	console.log(star);
	document.getElementById('formvar').value = star;
	document.getElementById("form1").submit();
	}
	oReq.send();

</script>



<form action="exp_db.php" id="form1" method="post">
<input type="hidden" name="formvar" id="formvar"> 
</form>


<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
   
	<form action="upload2.php" method="POST"  enctype="multipart/form-data" id="form1">
		<p><label>Upload orderwise files here</label><input class="btn btn-primary" type="file" name="file" id="file" /></p>
		<p><input class="btn btn-primary" type="submit" id="upload" name="upload"  value="Upload Excel File"/></p>
	</form>
	
   </div>
	<div id="div1"></div>
  </div>    
 </div>
 </div>




</body>


</html>
