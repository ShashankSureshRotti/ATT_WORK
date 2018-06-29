
<!DOCTYPE html>
<html>

<head>
<title>Uploading Files</title>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="xlsx.full.min.js"></script>

</head>
<body>
	
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
   
	<form action="index.php" method="POST"  enctype="multipart/form-data" id="form1">
		<p><label>Upload orderwise files here</label><input class="btn btn-primary" type="file" name="file" id="file" /></p>
		<p><input class="btn btn-primary" type="submit" id="upload" name="upload"  value="Upload Excel File"/></p>
	</form>
	<a href="EFMS.docx">Click here to request</a>
	
   </div>
	<div id="div1"></div>
  </div>    
 </div>
 </div>
	

</body>
</html>