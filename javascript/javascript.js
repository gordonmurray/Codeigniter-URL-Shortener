$(document).ready(function(){

    $("#shorten_url").click(

        function(){

            var url=$("#url").val();

            if(url!='')
            {
                $.ajax({
                    type: "POST",
                    url: base_url + "index.php/shorten/create",
                    data: "url="+url,
                    cache:false,
                    success:
                    function(data){
                        $("#alias").html(data);
                    }
                });
            }

            return false;

        });


});