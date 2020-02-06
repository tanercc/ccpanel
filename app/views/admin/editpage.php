<?php echo \core\error::display($error);?>

<form method='page' enctype='multipart/form-data'>

<p>Title<br><input type='text' name='pageTitle' value='<?php echo $data['row'][0]->pageTitle;?>'></p>
<p>Description<br><textarea name='pageDesc' rows='10' class='col-md-12'><?php echo stripslashes($data['row'][0]->pageDesc);?></textarea></p>
<p>Content<br><textarea name='pageCont' rows='10' class='col-md-12'><?php echo stripslashes($data['row'][0]->pageCont);?></textarea></p>
<p>Image<br><input type='file' name='image' value=''></p>

<p><input type='submit' name='submit' value='Submit'></p>
</form>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
