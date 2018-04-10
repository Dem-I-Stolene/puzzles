<form method="post">
	<label>Titel</label>
	<br>
	<input type="text" name="title">
	<br>
	<br>
	<label>Indhold</label>
	<br>
	<textarea name="content"></textarea>
	<br>
	<br>
	<label>Kategori</label>
	<br>
	<select name="category">
		{categories}
			<option value="{gc_id}">{gc_name}</option>
		{/categories}
	</select>
	<br>
	<input type="submit" name="create" value="Opret">
</form>