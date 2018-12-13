$(document).ready(function() {
   $('.mdb-select').material_select();
   $('.tooltip-test').tooltip({ selector: "a" })
 });

 $(function () {
$('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target // newly activated tab
  e.relatedTarget // previous active tab
});
});
