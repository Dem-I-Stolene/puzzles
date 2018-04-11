<form method="post">
	{categories}
		<label>Kategori: {gc_name}</label>
		<br>
		<select name="guides[]" multiple>
			{guides}
				<option value="{g_id}">{g_name}</option>
			{/guides}
		</select>
		<br>
		<br>
	{/categories}
	<input type="submit" name="delete" value="Slet">
</form>