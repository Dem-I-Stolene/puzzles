<form method="post">
	{category}
		<label>Titel</label>
		<br>
		<input type="text" name="title" value="{gc_name}">
		<br>
		<br>
		<label>Beskrivelse</label>
		<br>
		<textarea name="content">{gc_desc}</textarea>
		<br>
		<input type="submit" name="update" value="Opdater">
	{/category}
</form>