function validemail(){
    jQuery.ajax({
        url: "include/signup.php",
        data: 'uemail=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#user-status2").html(data);
        },
        error: function() {console.log("error");
        }
    });
}

function validphone(){
    num = $('#number').val();
    if(num.length < 10 || num.length > 10){
        $("#user-status1").html("Number Must Be 10 Digit"); 
       $('#nextBtn').prop('disabled',true);  
    }else{
        $("#user-status1").html(""); 
        $('#nextBtn').prop('disabled',false);  
    }
}
