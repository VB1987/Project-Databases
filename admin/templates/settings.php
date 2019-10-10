		<form class="settings" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
					<fieldset>
						<legend>General settings</legend>
						<label>Titel: <input type="text" name="titel" value="<?=get_setting($db, 'title');?>"></label>
						<label>Locatie stylesheet: <input type="text" name="style" value="<?=get_setting($db, 'style');?>"></label>
						<label>Timezone: <input type="text" name="timezone" value="<?=get_setting($db, 'timezone');?>"></label>
					</fieldset>
					<fieldset>
						<legend>E-mail settings</legend>
						<label>E-mail adres: <input type="text" name="email" value="<?=get_setting($db, 'email');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Meta settings</legend>
						<label>Keywords: <input type="text" name="keywords" value="<?=get_setting($db, 'meta keywords');?>"></label>
						<label>Omschrijving: <input type="text" name="description" value="<?=get_setting($db, 'meta description');?>"></label>
						<label>Auteur: <input type="text" name="author" value="<?=get_setting($db, 'meta author');?>"></label>
						<label>Copyright: <input type="text" name="copyright" value="<?=get_setting($db, 'meta copyright');?>"></label>
						<label>Charset: <input type="text" name="charset" value="<?=get_setting($db, 'meta charset');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Index pagina settings</legend>
						<label>Hoofdstuk: <input type="text" name="header" value="<?=get_setting($db, 'header');?>"></label>
						<label>Paragraaf: <input type="text" name="paragraph" value="<?=get_setting($db, 'paragraph');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Folder settings</legend>
						<label>Log-bestand Numbers: <input type="text" name="log" value="<?=get_setting($db, 'log');?>"></label>
					</fieldset>
					<fieldset>
						<legend>COOKIE save settings</legend>
						<label>COOKIE Time: <input type="text" name="cookie" value="<?=get_setting($db, 'cookieTime');?>"></label>
					</fieldset>
						<input type="submit" id="submit" value="Versturen">
				</form>