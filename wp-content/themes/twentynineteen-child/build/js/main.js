$ = jQuery.noConflict();

$(".form-to-cpt").on("submit", function (e) {
  e.preventDefault();

  var form_data = $(this);

  $("#saveForm").prop("disabled", true);

  // This does the ajax request
  $.ajax({
    url: dgworks_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
    type: "POST",
    data: { action: "dgworks_ajax_request", form_data: form_data.serialize() },
    success: function (data) {
      // This outputs the result of the ajax request
      console.log(data);
      if (data !== "" && data.success === true) {
        $("#showmodalresponse p").html(data.data);
        $("#showmodalresponse").modal("show");
        document.getElementById("formToCPT").reset();
        $("#saveForm").prop("disabled", false);
      } else if (data !== "" && data.success === false) {
        $("#saveForm").prop("disabled", false);
        $("#showmodalresponse p").html(data.data.data);
        $("#showmodalresponse").modal("show");
      }
    },
    error: function (errorThrown) {
      console.log(errorThrown);
    },
  });
});
