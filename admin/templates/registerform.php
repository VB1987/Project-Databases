		<form class="settings" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Registreren</legend>
				<label>
					<label>Gebruikersnaam: 
					<input type="text" name="user" required pattern="[a-zA-Z]+"></label>
				</label>
				<label>
					<label>Wachtwoord: 
					<input type="password" name="pass" required></label>
				</label>
					<label>Selecteer een avatar: <input type="file" name="bestand"></label>
				<input type="submit" id="reg" value="Registreren">
			</fieldset>
		</form>
