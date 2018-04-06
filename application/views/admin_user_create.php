<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="formEmail">E-Mail</label>  
  <div class="col-md-4">
  <input id="formEmail" name="formEmail" value="<?php echo set_value('formEmail'); ?>" type="text" placeholder="Email" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="formPassword">Password</label>
  <div class="col-md-4">
    <input id="formPassword" name="formPassword" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="formPasswordRepeat">Repeat Password</label>
  <div class="col-md-4">
    <input id="formPasswordRepeat" name="formPasswordRepeat" type="password" placeholder="Repeat Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="formSubmit"></label>
  <div class="col-md-4">
    <button id="formSubmit" name="formSubmit" class="btn btn-primary">Create Admin</button>
  </div>
</div>

</fieldset>
</form>
