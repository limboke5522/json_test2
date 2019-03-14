$(function(){
    var defaultOption = '<option value=""> ------- เลือก ------ </option>';
    // var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
    // Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
    $('#selectgeo').change(function() {
        $("#selectpro").html(defaultOption);
        $("#selectamp").html(defaultOption);
        $("#selecttumbon").html(defaultOption);
        // Perform an asynchronous HTTP (Ajax) request.
        $.ajax({
            // A string containing the URL to which the request is sent.
            url: "json_data.php",
            // Data to be sent to the server.
            data: ({ nextList : 'province', geographyID: $('#selectgeo').val() }),
            // The type of data that you're expecting back from the server.
            dataType: "json",
            // beforeSend is called before the request is sent
            // beforeSend: function() {
            //     $("#waitProvince").html(loadingImage);
            // },
            // success is called if the request succeeds.
            success: function(json){
                $("#waitProvince").html("");
                // Iterate over a jQuery object, executing a function for each matched element.
                $.each(json, function(index, value) {
                    // Insert content, specified by the parameter, to the end of each element
                    // in the set of matched elements.
                     $("#selectpro").append('<option value="' + value.PROVINCE_ID + 
                                            '">' + value.PROVINCE_NAME + '</option>');
                });
            }
        });
    });
    
    $('#selectpro').change(function() {
        $("#selectamp").html(defaultOption);
        $.ajax({
            url: "json_data.php",
            data: ({ nextList : 'amphur', provinceID: $('#selectpro').val() }),
            dataType: "json",
            // beforeSend: function() {
            //     $("#waitTumbon").html(loadingImage);
            // },
            success: function(json){
                $("#waitAmphur").html("");
                $.each(json, function(index, value) {
                     $("#selectamp").append('<option value="' + value.AMPHUR_ID + 
                                            '">' + value.AMPHUR_NAME + '</option>');
                });
            }
        });
    });

    $('#selectamp').change(function() {
        $("#selecttumbon").html(defaultOption);
        $.ajax({
            url: "json_data.php",
            data: ({ nextList : 'tumbon', amphurID: $('#selectamp').val() }),
            dataType: "json",
            // beforeSend: function() {
            //     $("#waitTumbon").html(loadingImage);
            // },
            success: function(json){
                $("#waittumbon").html("");
                $.each(json, function(index, value) {
                     $("#selecttumbon").append('<option value="' + value.DISTRICT_ID + 
                                            '">' + value.DISTRICT_NAME + '</option>');
                });
            }
        });
    });



});