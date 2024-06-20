jQuery(document).ready(function($) {
//find scroll position
$(window).scroll(function() {
//init
var that = $(‘#InfiniteScroll’);
var page = $(‘#InfiniteScroll’).data(‘page’);
var newPage = page + 1;
var ajaxurl = $(‘#InfiniteScroll’).data(‘url’);
if($(window).scrollTop() == $(document).height() – $(window).height()) {
$.ajax({
url: ajaxurl,
type: ‘post’,
data: {
page: page,
action: ‘ajax_script_infinite_scroll’
},
error: function(response) {
log(response);
},
success: function(response) {
if(response == 0) {
if($(“#no-more”).length == 0) {
$(‘#ajax-content’).append(‘<div id=”no-more” class=”text-center”><h5>There are no more posts to load</h5></div>’);
}
$(‘#InfiniteScroll’).hide();
} else{
$(‘#InfiniteScroll’).data(‘page’, newPage);
$(‘#ajax-content’).append(response);
}
}
});
}
});
});