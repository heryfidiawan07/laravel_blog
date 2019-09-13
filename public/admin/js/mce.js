var editor_config = {
	path_absolute : "/",
	selector: "#body_mce",
	plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table paste codesample"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link codesample image media | removeformat",
	content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tiny.cloud/css/codepen.min.css'
	],
	relative_urls: false,
	file_browser_callback : function(field_name, url, type, win) {
		var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
		var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
		if (type == 'image') {
			cmsURL = cmsURL + "&type=Images";
		} else {
			cmsURL = cmsURL + "&type=Files";
		}
		tinyMCE.activeEditor.windowManager.open({
			file : cmsURL,
			title : 'Filemanager',
			width : x * 0.8,
			height : y * 0.8,
			resizable : "yes",
			close_previous : "no"
		});
	}
};
tinymce.init(editor_config);
