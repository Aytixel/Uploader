$(function(){
    load();

    setInterval(function(){load();}, 7500);

    function load () {
        var Id = $(".message-frame p:last").attr('id');
        $.ajax({
            url: "../php/load_message.php?id=" + Id,
            type: "GET",
            success : function(html){
                $(".message-frame").append(html);
            }
        });
    }

    $('#tchat-sub').click(function(e){
        e.preventDefault();

        var des_user = encodeURIComponent($('#tchat-des-message').val());
        var message = encodeURIComponent($('#tchat-message').val());

        if (des_user != "" && message != "" && message.length < 255) {
            $.ajax({
                url: "../php/post_message.php",
                type: "POST",
                data: "des_user=" + des_user + "&message=" + message
            });
        }
    })   
})
