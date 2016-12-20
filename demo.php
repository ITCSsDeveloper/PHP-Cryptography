<?php 
include('cryptography.php');
?>


<table>
	<tr>
		<td>
			<form>
				<label>Input Text To Encrypt</label><br>
				<input type="text" name="encrypt">
				<input type="text" name="secretKey" value="MySecretKey!@#$%^">
				<button type="submit">Submit</button>
			</form>
			<label>Output Encrypt : </label><br>
			<textarea cols="60" rows="20"><?php echo Encrypt(@$_GET['encrypt'], @$_GET['secretKey']); ?></textarea>
		</td>

		<td>
			<form>
				<label>Input Text To Decript</label><br>
				<input type="text" name="decrypt">
				<input type="text" name="secretKey"  value="MySecretKey!@#$%^">
				<button type="submit">Submit</button>
			</form>
			<label>Output Decript : </label><br>
			<textarea cols="60" rows="20"><?php echo Decrypt(@$_GET['decrypt'],@$_GET['secretKey']); ?></textarea>
		</td>
	</tr>
</table>


<br>
<label>Demo By ITCS's Devloper</label>
<label>PHP Cryptography by ITCS's Developer </label>
<label>Release At 8:36 PM 12/20/2016</label>
