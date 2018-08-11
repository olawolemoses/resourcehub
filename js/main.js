

$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[7];
                itemWidth = sampwidth / 5;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * 8 });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }










    $('.s1').click(function() {
            $('.s1').css("color","#ffc352");
            $('.s2, .s3, .s4, s5').css("color","#ddd");
            $('.rating').val(1);

        });

        $('.s2').click(function() {
            $('.s2, .s1').css("color","#ffc352");
            $('.s3, .s4, s5').css("color","#ddd");
            $('.rating').val(2);
        });


        $('.s3').click(function() {
            $('.s1, .s2, .s3').css("color","#ffc352");
            $('.s4, s5').css("color","#ddd");
            $('.rating').val(3);
        });

        $('.s4').click(function() {
            $('.s5').css("color","#ddd");
            $('.s2, .s3, .s4, s1').css("color","#ffc352");
            $('.rating').val(4);
        });

        $('.s5').click(function() {
            $('.s1, .s2, .s3, .s4, s5').css("color","#ffc352");
            $('.rating').val(5);
        });



        $('.forgotten').click(function() {
            $('.loginSplash').hide();
            $('.resetSplash').show();
        });

        $('.logging').click(function() {
            $('.resetSplash').hide();
            $('.loginSplash').show();
        });



        $('.selBar').click(function() {
            $(this).toggleClass("out");
            $('.sideBar').toggleClass("hider");
        });

});