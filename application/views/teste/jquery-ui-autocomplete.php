<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Auto Complete Search Using Jquery UI - Tutsmake.com</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <style>
    .container{
    padding: 10%;
    text-align: center;
   } 
 </style>
</head>
<body>
 
<div class="container">
    <div class="row">
        <div class="col-12"><h2>Codeigniter 3 Auto Complete Search Using Jquery UI</h2></div>
        <div class="col-12">
            <div id="custom-search-input">
                <div class="input-group">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
      
    $( "#search" ).autocomplete({

        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "index.php/teste/search",
            data: {
                    term : request.term
                    
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data.value,function(obj){
                    return obj.nome + " - " + "R$" +obj.precovenda;
               }); 

               response(resp);
               
            }
            
        });
    },
    minLength: 3,
    delay: 1000
 
 });
});
 
</script>   
</body>
</html>