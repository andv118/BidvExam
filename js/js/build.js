$(document).ready(function () {
    $('.van-ban ul').slick({
        rows: 7,
        prevArrow: '<button type="button" class="btn btn-sm left slick-prev"><span class="glyphicon glyphicon-menu-left"></span>Trước</button>',
        nextArrow: '<button type="button" class="btn btn-sm right slick-next">Sau<span class="glyphicon glyphicon-menu-right"></span></button>'
    })

    $("#divAdLeft").sticky({ topSpacing: 40 });
    $("#divAdRight").sticky({ topSpacing: 40 });
});
jQuery(document).ready(function () {
    jQuery('.tabs .tab-links a').on('click', function (e) {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});