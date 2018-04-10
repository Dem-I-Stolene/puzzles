<form method="post">
	<select multiple name="categories[]">
		{categories}
			<option value="{gc_id}">{gc_name}</option>
		{/categories}
	</select>
	<br>
	<input type="submit" name="delete" value="Slet">
</form>