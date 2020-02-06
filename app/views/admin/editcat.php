<?php echo \core\error::display($error);?>

<form method='post' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='catTitle' value='<?php echo $data['row'][0]->catTitle;?>'></p>
<p><input type='submit' name='submit' value='Submit'></p>
</form>
