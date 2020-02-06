<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='postTitle' value='<?php if(isset($_POST['postTitle'])){ echo $_POST['postTitle'];}?>'></p>
<p>Description<br><textarea name='postDesc' rows='10' class='col-md-12'><?php if(isset($_POST['postDesc'])){ echo $_POST['postDesc'];}?></textarea></p>
<p>Content<br><textarea name='postCont' rows='10' class='col-md-12'><?php if(isset($_POST['postCont'])){ echo $_POST['postCont'];}?></textarea></p>
<p>Image<br><input type='file' name='image' value=''></p>

<p>Category<br>
	<select name='catID'>
		<option selected disabled>Select</option>
		<?php if($data['cats']){
			foreach($data['cats'] as $crow){
				if($_POST['catID'] == $crow->catID){
					$sel = "selected='selected'";
				} else {
					$sel = null;
				}
				echo "<option value='$crow->catID' $sel>$crow->catTitle</option>";
			}
		}
		?>
	</select>
</p>

<p><input type='submit' name='submit' value='Submit'></p>
</form>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
