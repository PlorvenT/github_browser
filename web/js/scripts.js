$(function() {
    "use strict";

    $("#searchclear").click(function () {
        $("#searchbox").val('');
    });

    $(".btn.btn-default.like-btn").click(function (e) {
        e.preventDefault();

        var likeLink = $(this);
        var likeStatus = likeLink.attr("liked");
        $.ajax({
            url: '/like/process-like',
            type: 'post',
            data: {
                objectId : likeLink.attr("id"),
                likeType : likeLink.attr("like-type"),
                likeStatus : likeLink.attr("liked"),
                _csrf: csrfVar
            },
            success: function (data) {

                $( "#greatphoto" ).attr( "title", "Photo by Kelly Clark" );

                if (likeStatus == 2){
                    likeLink.attr( "liked", 1);
                    likeLink.html('Unlike');
                } else {
                    likeLink.attr( "liked", 2);
                    likeLink.html('Like');
                }
            }
        });
    });
});