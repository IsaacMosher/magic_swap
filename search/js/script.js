$(function(){

    $('#cardName').autocomplete('data.php?mode=sql', {
        width: 200,
        max: 5,
        formatItem: function(data) {
            return data[0];
        }
    }).result(function(event,data) {
        window.location.href = "cardResult.php?cardName1=" + data[0];
    });

});