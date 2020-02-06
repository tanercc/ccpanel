<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='pageTitle' value='<?php if(isset($_POST['pageTitle'])){ echo $_POST['pageTitle'];}?>'></p>
<p>Description<br><textarea name='pageDesc' rows='10' class='col-md-12'><?php if(isset($_POST['pageDesc'])){ echo $_POST['pageDesc'];}?></textarea></p>
<p>Content<br><textarea name='pageCont' rows='10' class='col-md-12'><?php if(isset($_POST['pageCont'])){ echo $_POST['pageCont'];}?></textarea></p>
<p>Image<br><input type='file' name='image' value=''></p>

<p><input type='submit' name='submit' value='Submit'></p>
</form>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
