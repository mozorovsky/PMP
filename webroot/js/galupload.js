		function ajaxFileUpload(action, fileId, returnDiv, deltanumber)
	{
		$("#picloading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:action,
				secureuri:false,
				fileElementId:fileId,				
				dataType: 'xml',
				data:{'data[delta]':deltanumber},
				success: function (data, status) {
					//alert(data.body.innerHTML);
					//$("#" + returnDiv).html(data.body.innerHTML);
					$("#" + returnDiv).html(data.body.innerHTML);
					//alert($("#" + returnDiv).find("#buttonUpload").attr("picid"));
					$("#pid" + deltanumber).val($("#" + returnDiv).find("#buttonUpload").attr("picid"));
					//alert(data.body.innerText);
					if(typeof(data.error) != 'undefined') {
						if(data.error != '') {
							alert(data.error);
						}else {
							alert(data.msg);
						}
					}
				},
				error: function (data, status, e)	{
					alert(e);
				}
			}
		)
		
		return false;

	}
