<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>
<p>Title<br><input type='text' name='catTitle' value='<?php if(isset($_POST['catTitle'])){ echo $_POST['catTitle'];}?>'></p>
<p><input type='submit' name='submit' value='Submit'></p>
</form>