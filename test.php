<html>
<head>
	<title>Sample CKEditor Site</title>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>
<body>
  <form method="post" action="new01.php">
		<p>
			My Editor:<br />
			<textarea id="editor2" name="editor2"><p></p></textarea>
            <script>
CKEDITOR.replace( 'editor2',
{
	language : 'ar',
	width : '100%',
	toolbar :[
   ['Source','Bold','Italic','Underline','Strike','Save','NewPage','Preview','Templates','Cut','Copy','Paste','PasteText','PasteFromWord','Print','Undo','Redo','Find','Replace','SelectAll','RemoveFormat'],
    '/',
    ['-','Subscript','Superscript','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','BidiLtr', 'BidiRtl','Link','Unlink','Anchor','Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
    '/',
    ['Styles','Format','Font','FontSize','TextColor','BGColor','Maximize', 'ShowBlocks','About','Outdent','Indent','Blockquote','CreateDiv']
					]

});

</script>
		</p>
		<p>
			<input type="submit" />
		</p>
	</form>
     <hr>

	<form method="post">
		<p>
			My Editor:<br />
			<textarea id="editor1" name="editor1"><p>Initial value.</p></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
			</script>
		</p>
		<p>
			<input type="submit" />
		</p>
	</form>
</body>
</html>
