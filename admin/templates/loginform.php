		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<fieldset>
				<legend>Inloggen</legend>
				<label>
					<span>Gebruikersnaam</span>
					<input type="text" name="user" required pattern="[a-zA-Z]+">
					<span>Verplicht veld niet ingevuld!</span>
				</label>
				<label>
					<span>Wachtwoord</span>
					<input type="password" name="pass" required>
					<span>Verplicht veld niet ingevuld!</span>
				</label>
				<input type="submit" value="Inloggen">
			</fieldset>
		</form>
