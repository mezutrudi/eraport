      formDefault();
  var formMethod;
  function formDefault()
  {
    formMethod = 'Simpan';
    $('#formAjax') [0].reset();
    $('#myModal').modal('hide');
  }

  $('#formAjax').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url:BASE_URL + 'Admin/simpankelas',
      data:FormData,
      type:'POST',
      processData:false,
      cache:false,
      contentType:false,
      success: function(data)
      {
        var jsData=(data).replace(/\s/g, " ");
        var result = eval('('+jsData+')');
        if (result.result == true) {
          formDefault();
          showMsgErrors(result.resultMsg)
        }else {
          formDefault();
          showMsgErrors(result.resultMsg)
        }
      }
    });
  });