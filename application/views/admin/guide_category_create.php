<form method="post">
	<label>Titel</label>
	<br>
	<input type="text" name="title">
	<br>
	<br>
	<label>Tekst</label>
	<br>
	<textarea name="content"></textarea>
	<br>
	<input type="submit" name="create" value="Opret">
</form>

<?php 

echo form_error();

 ?>