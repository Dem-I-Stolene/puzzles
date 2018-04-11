<form method="post">
	{guide}
		<label>Titel</label>
		<br>
		<input type="text" name="title" value="{g_name}">
		<br>
		<br>
		<label>Indhold</label>
		<br>
		<textarea name="content">{g_content}</textarea>
	{/guide}
	<br>
	<input type="submit" name="update" value="Opdater">
</form>