$(document).ready(function() {
    loadRevenueData();
    loadFollowersGainData();
    loadTopProductsData();
});

function loadRevenueData(){
    $.ajax({
        method: "get",
        "url": "api/revenues",
        xhrFields: {
            withCredentials: true
        },
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        beforeSend: function() {

        },
        success: function(data){
            $('#revenue_data').removeClass('spinner-border');
            $('#revenue_data').html(data.html);
        }
    });
}

function loadFollowersGainData(){
    $.ajax({
        method: "get",
        "url": "api/followersGain",
        xhrFields: {
            withCredentials: true
        },
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        beforeSend: function() {

        },
        success: function(data){
            $('#followers_data').removeClass('spinner-border');
            $('#followers_data').html(data.html);
        }
    });
}

function loadTopProductsData(){
    $.ajax({
        method: "get",
        "url": "api/topProducts",
        xhrFields: {
            withCredentials: true
        },
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        beforeSend: function() {

        },
        success: function(data){
            $('#top_data').removeClass('spinner-border');
            $('#top_data').html(data.html);
        }
    });
}