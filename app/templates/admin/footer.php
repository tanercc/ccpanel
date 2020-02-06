
            </div>
            <!-- /.container-fluid -->

        </div>
</div>

<!-- JS -->
<?php
	helpers\assets::js(array(
		// <!-- jQuery -->
		helpers\url::template_path(). 'js/jquery.js',
		// <!-- Bootstrap Core JavaScript -->
		helpers\url::template_path(). 'js/bootstrap.min.js',
		// <!-- Morris Charts JavaScript -->
		helpers\url::template_path(). 'js/plugins/morris/raphael.min.js',
		helpers\url::template_path(). 'js/plugins/morris/morris.min.js',
		helpers\url::template_path(). 'js/plugins/morris/morris-data.js',
	))
?>

<?php if (isset($data['js'])) echo $data['js'];?>

</body>
</html>