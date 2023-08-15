<?php
 if (!(isset($_GET["content"]) && isset($_GET["id"]) && isset($_GET["pwh"]))){
 header ("Location: ./index.php?content=message&alert=hacker-alert");
 }
?>




<div class="container m-5">
  <div class="row">
   <div class="col-12 col-sm-6">
            
   <form action="./index.php?content=activeate_script" method="post">
 <div class="form-group">
    <label for="inputPassword">Kies een nieuw wachtwoord:</label>
    <input name="password" type="password" class="form-control" id="inputPassword"
    aria-describedby="passwordHelp">
    <small id="passwordHelp" class="form-text text-muted">Kies een veilig ..</small>
  </div>


  <form action="./index.php?content-activate_script" method="post">
 <div class="form-group">
    <label for="inputPassword">type het wachtwoord opnieuwe:</label>
    <input name="passwordCheck" type="password" class="form-control" id="inputPassword"
    aria-describedby="passwordHelp">
    <small id="passwordHelp" class="form-text text-muted">Ter controle voert u niogmaals uw wachtwoord in..</small>
  </div>

  <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
  <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">
                    
  
  <button type="submit" class="btn btn-success btn-lg btn-block">Activeer</button>
</form>
   </div>
   <div class="col-12 col-sm-6">
       <img src="img/amg.jpg" alt="" class="w-75 mx-auto d-block">
   </div>
  </div>
</div>