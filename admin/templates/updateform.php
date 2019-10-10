		<form class="settings" action="<?= $_SERVER['PHP_SELF'].'?id='.$id ?>" method="POST" enctype="multipart/form-data">
					<fieldset>
						<legend>Nieuwe gegevens</legend>
						<label>Naam: <input type="text" name="name"></label>
						<label>Wachtwoord: <input type="password" name="password"></label>
						<label>Selecteer een avatar: <input type="file" name="bestand"></label>
						<input type="submit" name="submit">
					</fieldset>
					<p>Klik <a href="../users.php">hier</a> om terug te gaan</p>
				</form>
