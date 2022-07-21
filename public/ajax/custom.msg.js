function showMsgErrors(textMsg)
{
	swal({
		type:'error',
		title:textMsg,
		showConfirmButton:false,
		timer:3000
	})
}
function showMsgSuccess(textMsg)
{
	swal({
		type:'success',
		title:textMsg,
		showConfirmButton:false,
		timer:3000
	})
}