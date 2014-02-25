tinymce.init({
	    selector: "textarea",
	    plugins: [
	        "advlist autolink lists link image charmap preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});

	function addToSite (guid) {
		var row = $("tr[data-guid='"+guid+"']");
		var title = row.find('.title').text();
		var content = tinyMCE.get('content-'+guid).getContent();
		var image = row.find(".image").attr("href");
		var tags = row.find(".tags").val();
		var categoryIds = row.find("#cat").val().toString();

		$.ajax({
			type: 'POST',
			url: 'addnewpost.php',
			data: {
				title: title,
				content: content,
				image: image,
				tags: tags,
				categoryIds: categoryIds
			},
			success: function(response){
				if(response=="OK")
				{
					row.remove();
				}else{
					console.log(response);
				}
			}

		});

		return false;
	}