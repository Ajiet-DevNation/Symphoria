$.each($.data(this), function(i, e) {
    alert('name='+ i + ' value=' +e);
 });
 $.each($('#mydiv').data(), function (i, e) { alert(i + ":" + e); });