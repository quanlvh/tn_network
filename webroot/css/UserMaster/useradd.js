$('#first-select').bind("change keyup", function() {
  var id= $(#first-select").val();
  $("change-select").load( "./getOptions/"+id);
});

