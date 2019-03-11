<!DOCTYPE html>
<html lang="en">
<head>
  <title>Session Progress</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center" style="padding-top: 5px;padding-bottom: 10px;display: block;">
  <h1 id="divTime"></h1>
</div>
<div class="container">
  <div class="row" id="divResponse">
    
  </div>
</div>
<script src="index.js"></script>

</body>
<script type="text/javascript">
	$(document).ready(function(){
    var $el = $(".table-responsive");
    $el.hide();
  });
</script>
</html>
