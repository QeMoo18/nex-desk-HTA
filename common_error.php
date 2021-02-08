	,
	            // for selected
	            "fnDrawCallback": function(){
	                  $('table#mytable2 td').bind('mouseenter', function () { $(this).parent().children().each(function(){$(this).addClass('datatablerowhighlight');}); });
	                  $('table#mytable2 td').bind('mouseleave', function () { $(this).parent().children().each(function(){$(this).removeClass('datatablerowhighlight');}); });
	            }







            // for responsive
            responsive: true,
            scrollY: true,
            scrollX: true,
            scroller: true,
            deferRender:true,



            var url = "<?= base_url()?>Customer/CMC_Link_Service";
                            window.location.href = url;



                            function cancel()
    {
        var url = "<?= base_url()?>Customer/CMC_Link_Service";
        window.location.href = url;
    }

    <center>

    $("html, body").animate({ scrollTop: 0 }, "slow");