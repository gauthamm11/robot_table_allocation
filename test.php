<script>
$(document).ready(function () {
var lodSpin = '<center class="mt-3 mb-3"><div class="spinner-grow text-muted mr-sm-5"></div><div class="spinner-grow text-primary mr-sm-5"></div><div class="spinner-grow text-success mr-sm-5"></div><div class="spinner-grow text-info mr-sm-5"></div><div class="spinner-grow text-warning mr-sm-5"></div><div class="spinner-grow text-danger mr-sm-5"></div><div class="spinner-grow text-secondary mr-sm-5"></div><div class="spinner-grow text-dark"></div></center>';
$(".viewc").click(function () {
var pid = $(this).attr('data-value1');
var title = $(this).attr('data-value2');
$("#view").modal();
$('#conthead').html('<i class="fas fa-building fa-fw text-info"></i>&nbsp;<span class="text-info">' + title + '</span>');
$('#viewbody').html(lodSpin);
// ajax open
$.ajax({
    type: "GET",
    url: 'details.php',
    data: { pid: pid },
    success: function (data) {
      $('#conthead').html('<i class="fas fa-building fa-fw text-info"></i>&nbsp;<span class="text-info">' + title + '</span>');
      $("#viewbody").html(data);
   // $("#viewbody").html(pid);
}
});
// ajax close
});
return false;
});
</script>