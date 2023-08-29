var scrollLoad = true;

$(document).ready(function() {
    
    $(window).scroll(bindScroll);
    
    loadRevenueData();
    loadFollowersGainData();
    loadTopProductsData();

    loadEventsData();
});

function loadRevenueData(){
    $.ajax({
        method: "get",
        "url": "api/revenues",
        xhrFields: {
            withCredentials: true
        },
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        data: {'_token':$('#_token').val(), 'resp': 'html'},
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
        data: {'_token':$('#_token').val(), 'resp': 'html'},
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
        data: {'_token':$('#_token').val(), 'resp': 'html'},
        success: function(data){
            $('#top_data').removeClass('spinner-border');
            $('#top_data').html(data.html);
        }
    });
}

function loadEventsData(){
    $.ajax({
        method: "get",
        url: "api/events",
        xhrFields: {withCredentials: true},
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        data: {'_token':$('#_token').val(), 'resp': 'html', 'page': $('#_page').val()},
        success: function(data){

            $('#event_data').removeClass('spinner-border');
            $('#event_data').append(data.html);
            
            registerEventsDataCallBack();
        }
    });
}

function registerEventsDataCallBack(){
    $('#tbEvents').on('change', ':checkbox', function () {

        if ($(this).is(':checked')) {
            markAsReadEvent(this);
        } 

    });

    $(window).bind('scroll', bindScroll);

    scrollLoad = true;

    $('#_page').val(Number($('#_page').val()) + 1);
}

function markAsReadEvent(ele){
    $.ajax({
        method: "put",
        url: "api/updateProvider",
        xhrFields: {withCredentials: true},
        headers: {"X-XSRF-TOKEN": $.cookie('XSRF-TOKEN')},
        data: {'_token':$('#_token').val(), 'id': $(ele).attr("data-id"), 'type': $(ele).attr("data-type")},
        success: function(data){
            if ( data['data'] > 0 ){
                $(ele).attr("disabled", true);    
            }
        }
    });
}

function bindScroll(){
    var currentPage = $('#_page').val();

    if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 100) {
        scrollLoad = false;

        if ( currentPage > 1 ){
            $(window).unbind('scroll');
            loadEventsData();
        }
      }
}
