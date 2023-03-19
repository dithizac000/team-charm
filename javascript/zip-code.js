$("#zip").on("onblur", function() {
    //get zip code from form
    let zip = $("#zip").val();
    console.log("hello");
    let url = "https://ziptasticapi.com/" + zip;
    $.getJSON(url, function (result){
        $("#city").val(result.city);
        $("#state").val(result.state);

    });
    return false;
});
