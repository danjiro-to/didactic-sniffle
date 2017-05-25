function searchq() {

  var searchTxt = $("input[name='search']").val();

  if(searchTxt == '') {
    $(".output").html('');
  } else {

  $.post("Core/search.php", {searchVal: searchTxt}, function(output){
    $(".output").html(output);
  });

}

}
