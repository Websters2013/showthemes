( function(){

    $(function () {

        //$('.sorting').click(function (e) {
        //
        //    var _isHeader = $(e.target).parent('li').html();
        //    if (_isHeader !== undefined)
        //        return false;
        //
        //    $('.sorting').toggleClass('active');
        //
        //    return false;
        //
        //});
        // Smooth Scrolling

        function filterPath(string) {
            return string
                .replace(/^\//, '')
                .replace(/(index|default).[a-zA-Z]{3,4}$/, '')
                .replace(/\/$/, '');
        }
        var locationPath = filterPath(location.pathname);
        var scrollElem = scrollableElement('html', 'body', 'document', 'window');

        $('a[href*=#]').each(function () {
            var thisPath = filterPath(this.pathname) || locationPath;
            if (locationPath == thisPath
                && (location.hostname == this.hostname || !this.hostname)
                && this.hash.replace(/#/, '')) {
                var $target = $(this.hash), target = this.hash;
                if (target) {
                    //console.log('Target: ' + target + ' offset: ' + targetOffset);
                    $(this).click(function (event) {
                        if ($target.offset()) {
                            var targetOffset = $target.offset().top;
                            event.preventDefault();
                            $(scrollElem).animate({
                                scrollTop: targetOffset
                            }, 1800, function () {
                                //console.log($(scrollElem).scrollTop());
                                location.hash = target;
                            });
                        }
                    });
                }
            }
        });

        // use the first element that is "scrollable"
        function scrollableElement(els) {
            for (var i = 0, argLength = arguments.length; i < argLength; i++) {
                var el = arguments[i],
                    $scrollElement = $(el);
                if ($scrollElement.scrollTop() > 0) {
                    return el;
                } else {
                    $scrollElement.scrollTop(1);
                    var isScrollable = $scrollElement.scrollTop() > 0;
                    //console.log(el + ': ' + $scrollElement.scrollTop());
                    $scrollElement.scrollTop(0);
                    if (isScrollable) {
                        return el;
                    }
                }
            }
            return 'body';
        }
        $('#main-menu').click(function () {
            if ($(window).width() < 769) {
                $('#mobile-menu').slideToggle();
                $('header').toggleClass('mobile-open');
            }
        });

        //$(function () {
        //    if ($('.themes').length > 0) {
        //        var $container = $('.themes');
        //        // initialize Isotope
        //        $container.isotope({
        //            itemSelector: '.column',
        //            // options...
        //            resizable: true // disable normal resizing
        //        });
        //    }
        //    // filter items when filter link is clicked
        //    $('.sorting a').click(function () {
        //        var selector = $(this).attr('data-filter');
        //        $container.isotope({
        //            filter: selector
        //        });
        //        return false;
        //    });
        //});

        $('.switcher-fix').each(function () {

            $(window).on("scroll", function () {
                var windowsScroll = $(window).scrollTop(),
                    scrollTop = $('.our-features').offset().top;

                if (windowsScroll > scrollTop) {
                    $('.switcher-fix').addClass('switcher-fix_show');
                } else {
                    $('.switcher-fix').removeClass('switcher-fix_show');
                }
            });

        });


        $('.facebook-chat-handler').on('click', function (e) {
            $('.facebook-chat .facebook-chat-container').toggle('slow', function () {
                if ($('.facebook-chat-container').is(':visible')) {
                    $('.facebook-chat-handler').html('Close Chat <span>X</span>');
                } else {
                    $('.facebook-chat-handler').html('Questions?');
                }
            });
            return false;
        });

        new sliderManager();

        $('.video_container').each(function () {
            new NeedEvent($(this));
        });

        // workaround for checkout checkboxes
        $('.checkout .form-row input[type=checkbox]').on('change', function (e) {
            khore_refresh_checkout_checkbox(this);
        });

        $('.checkout .form-row input[type=checkbox]').each(function (i, el) {
            khore_refresh_checkout_checkbox(el);
        });

        if (!$('#showcase-anchor').length) {
            $('a[href="#showcase-anchor"]').attr('href', 'http://www.showthemes.com/#showcase-anchor');
        }

        $('.cart .coupon__title').on('click', function (e) {
            e.preventDefault();
            var couponContainer = $(this).next('.coupon');
            if (couponContainer.is(':visible')) {
                couponContainer.slideUp('slow');
            } else {
                couponContainer.slideDown('slow');
            }
        });

        $('.slider-showcase li a').hover(function () {
            var title = $(this).attr('title');
            $(this).data('tipText', title).removeAttr('title');
            $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function () {
            // Hover out code
            $(this).attr('title', $(this).data('tipText'));
            $('.tooltip').remove();
        }).mousemove(function (e) {
            var mousex = e.pageX + 20; //Get X coordinates
            var mousey = e.pageY + 10; //Get Y coordinates
            $('.tooltip').css({top: mousey, left: mousex});
        });

        $.each( $( '.accordion' ), function () {
            new Accordion( $(this) );
        } );

        $.each( $( '.comparison-table' ), function () {
            new ComprasionSwiper( $(this) );
        } );

        $.each( $( '#theme-list' ), function () {
            new Sorting( $(this) );
        } );

        $.each( $( '#main-menu' ), function () {
            new Menu( $(this) );
        } );

    });

    var NeedEvent = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _btn = obj.find('.play'),
            _frame = _btn.data('video'),
            _opened = false,
            _popup = $('<div class="need-event__popup"/>').append('<a class="popup_close">Close</a>');

        //private methods
        var addEvents = function () {
                _btn.on({
                    click: function () {
                        _self.showPopup();

                        return false;
                    }
                });
                $('.popup_close').on({
                    click: function () {
                        if (_opened) {
                            _self.closePopup();
                        }
                    }
                });
            },
            appendPopup = function () {
                _obj.wrap = $('<div class="need-event__wrap"/>');
                _obj.wrap.append(_popup);
                _obj.append(_obj.wrap);

            },
            init = function () {
                appendPopup();
                addEvents();
            };

        _self.closePopup = function () {
            _popup.parent().removeClass('active');
            setTimeout(function () {
                _popup.find('iframe').remove();
                _opened = false;
            }, 500);
        };
        _self.showPopup = function () {
            _popup.append(_frame);
            _popup.parent().addClass('active');
            _opened = true;
        };
        init();
    };

    var sliderManager = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _swiperHappy = null,
            swiper = null;

        //private methods
        var addEvents = function () {
                $(window).on({
                    resize: function (e) {
                        updateTwitter();
                        updateIscroll();
                        updateHappy();
                        sliderHeight();
                    }
                });
            },
            createIscroll = function () {
                if ($('#showcase-slider').length && $(window).width() > 768) {

                    $("#scroller").mCustomScrollbar({
                        axis: "x", // horizontal scrollbar
                        setHeight: '239px',
                        scrollInertia: 150,
                        autoHideScrollbar: false,
                        autoExpandScrollbar: false,
                        alwaysShowScrollbar: 2
                    });

                }
            },
            updateIscroll = function () {
                if ($('#showcase-slider').length && $(window).width() > 768) {
                    $("#scroller").mCustomScrollbar({
                        axis: "x", // horizontal scrollbar
                        setHeight: '239px',
                        scrollInertia: 150,
                        autoHideScrollbar: false,
                        autoExpandScrollbar: false,
                        alwaysShowScrollbar: 2
                    });

                } else {
                    $("#scroller").mCustomScrollbar('destroy');
                }
            },
            createTwitter = function () {
                var slidesPerView = 1;
                if ($('.slider-tweets').length && $(window).width() > 768) {
                    slidesPerView = 3;
                }
                swiper = new Swiper('.slider-tweets', {
                    nextButton: '.slider__btn_next',
                    prevButton: '.slider__btn_prev',
                    slidesPerView: slidesPerView,
                    centeredSlides: false,
                    paginationClickable: false,
                    spaceBetween: 30,
                    speed: 600
                });
            },
            sliderHeight = function () {
                var _height = $('.happy-slide__text-wrap').height();
                $('.happy-slide_content').height(_height);
            },
            createHappy = function () {
                var perView = 5;
                if ($(window).width() < 1024 && $(window).width() > 768) {
                    perView = 3;
                } else if ($(window).width() <= 768) {
                    perView = 1;
                }
                _swiperHappy = new Swiper('.hcustomers__happy-slide', {
                    nextButton: '.slider__btn_happy_next',
                    prevButton: '.slider__btn_happy_prev',
                    loop: true,
                    slidesPerView: perView,
                    loopedSlides: 10,
                    centeredSlides: true,
                    watchSlidesVisibility: true,
                    paginationClickable: true,
                    speed: 400
                });

                if (_swiperHappy.on) {
                    _swiperHappy.on('slideChangeEnd', function (e) {
                        _swiperHappy.onResize();
                        _swiperHappy.update();
                        $('.happy-slide__text-wrap.active').removeClass('active');

                        var curIndex = $('.swiper-slide-active').data('swiper-slide-index');
                        $('.happy-slide__text-wrap').each(function (i, el) {
                            if ($(el).data('index') == curIndex) {
                                $(el).addClass('active');
                            }
                        })
                    });
                }
            },
            updateHappy = function () {
                if ($(window).width() > 1024) {
                    if (_swiperHappy.params.slidesPerView != 5) {
                        _swiperHappy.params.slidesPerView = 5;
                    }
                } else if ($(window).width() <= 1024 && $(window).width() > 768) {
                    if (_swiperHappy.params.slidesPerView != 3) {
                        _swiperHappy.params.slidesPerView = 3;
                    }
                } else {
                    if (_swiperHappy.params.slidesPerView != 1) {
                        _swiperHappy.params.slidesPerView = 1;
                    }
                }

            },
            updateTwitter = function () {
                if ($(window).width() <= 768) {
                    if (swiper.params.slidesPerView != 1) {
                        swiper.params.slidesPerView = 1;
                    }
                } else {
                    if (swiper.params.slidesPerView != 3) {
                        swiper.params.slidesPerView = 3;
                    }
                }
            },
            init = function () {
                addEvents();
                createIscroll();
                createTwitter();
                createHappy();
                sliderHeight();
            };

        init();
    };

    var Accordion = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _accordionItem = _obj.find('.accordion__item'),
            _accordionCaption = _accordionItem.find('.accordion__caption'),
            _accordionContent = _accordionItem.find('.accordion__content'),
            _window = $(window),
            _pos = 0,
            _clickFlag = true;

        //private methods
        var _closeAccordion = function ( curElem, nextElem ) {

                _accordionCaption.removeClass( 'similar' );
                curElem.removeClass( 'active' );
                curElem.css( {
                    'margin-bottom': ''
                } );
                nextElem.removeClass( 'visible' );

            },
            _onEvents = function () {

                _window.on( {
                    resize: function() {

                        if(  _accordionCaption.filter( '.active').length ) {

                            _setPosItems( _accordionCaption.filter( '.active' ), _accordionCaption.filter( '.active' ).next() );

                        }

                    }
                } );

                _accordionCaption.on( {

                    click: function () {

                        var curItem = $(this),
                            nextElem = curItem.next();

                        if( !( curItem.hasClass('active') ) ) {

                            if( _clickFlag ) {

                                _openAccordion( curItem, nextElem );

                            }

                        } else {

                            _closeAccordion( curItem, nextElem );

                        }

                        return false;

                    }

                } );

            },
            _openAccordion = function ( curElem, nextElem ) {

                _clickFlag = false;
                _accordionCaption.removeClass( 'active' );
                _accordionCaption.css( {
                    'margin-bottom': ''
                } );
                _accordionContent.removeClass( 'visible similar' );

                curElem.addClass( 'active' );

                _setPosItems( curElem, nextElem );
                nextElem.addClass( 'visible' );

                setTimeout( function() {

                    _clickFlag = true;

                }, 300 );

            },
            _init = function () {

                _obj[0].obj = _self;
                _onEvents();

            },
            _setPosItems = function ( caption, elem ) {

                caption.css( {
                    'margin-bottom': elem.innerHeight() + 20
                } );

                setTimeout( function() {

                    var elemPos = caption.position().top,
                        elemHeight = caption.outerHeight();

                    _pos = elemPos + elemHeight;

                    elem.css( {
                        'top': _pos
                    } );

                    //_accordionCaption.each( function() {
                    //
                    //    if( $(this).position().top == elemPos ) {
                    //
                    //        $(this).addClass( 'similar' );
                    //
                    //    } else {
                    //
                    //        $(this).removeClass( 'similar' );
                    //
                    //    }
                    //
                    //} );

                }, 310 );

            };

        _init();
    };

    var Menu = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _arrowBtn = _obj.find('.menu__arrow'),
            _window = $(window);

        //private methods
        var _closeAccordion = function (  ) {



            },
            _onEvents = function () {

                _window.on( {
                    resize: function() {


                    }
                } );

                _arrowBtn.on( {

                    click: function () {

                        var curItem = $(this),
                            subMenu = curItem.next();

                        if( curItem.hasClass('opened') ) {

                            curItem.removeClass('opened');
                            subMenu.removeClass('visible');

                        } else {

                            curItem.addClass('opened');
                            subMenu.addClass('visible');

                        }

                        return false;

                    }

                } );

            },
            _openAccordion = function (  ) {



            },
            _init = function () {

                _obj[0].obj = _self;
                _onEvents();

            };

        _init();
    };

    var Sorting = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _items = _obj.find('.sorting-wrap__item'),
            _list = _items.find('.sorting'),
            _labels = _obj.find('.sorting-labels'),
            _window = $(window),
            _themesBlock = _obj.find('.themes'),
            _hiddenInput = _obj.find('.sorts-name'),
            _request = new XMLHttpRequest(),
            _preloader = $('<div class="theme-list__preloader"></div>'),
            _data = {},
            _arr = [];

        //private methods
        var _addContent = function( msg ) {

                $.each( msg.items, function() {



                    if (!( this.new == undefined )) {
                        var newBlock = $( '<div class="column column1 hidden">\
                                        <img src="' +this.url1 +'" alt="Khore">\
                                        <a class="thumbnail" href="' +this.href1 +'">\
                                            <img src="' +this.url2 +'" alt="Khore">\
                                            <span class="new">' +this.new+ '</span>\
                                            <div>\
                                                <span class="btn btn_grey" href="' +this.permLink +'">FEATURES</span>\
                                            </div>\
                                        </a>\
                                        <div class="content">\
                                            <div>\
                                                <h3>\
                                                    <a title="' +this.title +'" href="' +this.href2 +'">' +this.title+ '</a>\
                                                </h3>\
                                                <a href="' +this.href3 +'" class="btn btn_red">DEMO</a>\
                                            </div>\
                                            ' +this.text +'\
                                        </div>\
                                        </div>' );

                    }else {
                        var newBlock = $( '<div class="column column1 hidden">\
                                        <img src="' +this.url1 +'" alt="Khore">\
                                        <a class="thumbnail" href="' +this.href1 +'">\
                                            <img src="' +this.url2 +'" alt="Khore">\
                                            <div>\
                                                <span class="btn btn_grey" href="' +this.permLink +'">FEATURES</span>\
                                            </div>\
                                        </a>\
                                        <div class="content">\
                                            <div>\
                                                <h3>\
                                                    <a title="' +this.title +'" href="' +this.href2 +'">' +this.title+ '</a>\
                                                </h3>\
                                                <a href="' +this.href3 +'" class="btn btn_red">DEMO</a>\
                                            </div>\
                                            ' +this.text +'\
                                        </div>\
                                        </div>' );
                    }

                    _themesBlock.append( newBlock );

                } );

                var newItems = _themesBlock.find( '.hidden' );

                setTimeout( function() {

                    newItems.each( function( i ) {
                        _showNewItems( $( this ), i );
                    } );

                }, 50 );



            },
            _createLabels = function( title ) {

                var label = $('<div class="sorting-label" title="'+title+'">' +
                        '<a href="#" class="sorting-label__close"></a>' +
                        '<span>'+title+'</span>' +
                    '</div>');

                _labels.append( label );

                _data[label.attr('title')] = label.attr('title');

                _writeInInput();

            },
            _onEvents = function () {

                _list.find('label').on( {
                    click: function() {
                        var curItem = $(this),
                            title = curItem.attr('title');


                        if( $('.sorting-label[title="'+title+'"]').length ) {
                            _removeLabels( title );
                        } else {
                            _createLabels( title );
                        }

                        if(_window.width()>=1024) {

                            _items.removeClass('visible');

                        } else {

                            _items.removeClass('visible');
                            _items.find('.sorting').slideUp();

                        }

                    }
                } );

                _items.on( {
                    click: function() {
                        var curItem = $(this);

                        if(_window.width()>=1024) {

                            if( curItem.hasClass('visible') ) {
                                curItem.removeClass('visible');
                            } else {
                                _items.removeClass('visible');
                                curItem.addClass('visible');
                            }


                        } else {
                            if( curItem.hasClass('visible') ) {
                                curItem.removeClass('visible');
                                curItem.find('.sorting').slideUp();
                            } else {
                                _items.removeClass('visible');
                                curItem.addClass('visible');

                                _items.find('.sorting').slideUp();
                                curItem.find('.sorting').slideDown();
                            }

                        }

                    }
                } );

                $(document).on(
                    "click",
                    ".sorting-label__close",
                    function(){
                        var curItem = $(this),
                            parent = curItem.parent(),
                            parentTitle = parent.attr('title');

                        delete _data[parent.attr('title')];

                        _writeInInput();

                        parent.remove();
                        _items.find('.nice-checkbox label[title="'+parentTitle+'"]').prev('input[type=checkbox]').prop( 'checked', false );

                        return false;
                    }
                );
            },
            _init = function () {

                _obj[0].obj = _self;
                _onEvents();

            },
            _removeLabels = function( title ) {

                delete _data[title];
                _writeInInput();

                $('.sorting-label[title="'+title+'"]').remove();

            },
            _requestContent = function () {

                _request.abort();

                _request = $.ajax( {
                    url: _obj.attr('data-action'),
                    data: {
                        input: _hiddenInput.val()
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (msg) {


                        setTimeout( function() {

                            _themesBlock.html( '' );
                            _addContent(msg);
                            _preloader.removeClass('visible');

                                setTimeout( function() {
                                    _preloader.remove();

                                }, 300 );



                        }, 300 );


                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            alert("ERROR!!!");
                        }
                    }
                } );

            },
            _showNewItems = function( item, index ){

                setTimeout( function() {
                    item.removeClass( 'hidden' );
                }, index * 50 );

            },
            _writeInInput = function() {

                _arr = [];

                for( var key in _data ) {

                    var item = _data[ key ];
                    _arr.push(item );
                }

                _hiddenInput.val( _arr );

                _obj.append(_preloader);
                setTimeout( function() {

                    _preloader.addClass('visible');

                }, 20 );

                _themesBlock.find('.column').addClass('hidden');

                _requestContent();

            };

        _init();
    };

    var ComprasionSwiper = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _window = $(window),
            _swiperMain,
            _swiperHeaders,
            _headers = _obj.find('.comparison-table__swiper .pricing-header'),
            _swiperContainerMain = _obj.find('.comparison-table__swiper'),
            _swiperContainerHeaders = _obj.find('.comparison-table__headers .swiper-container'),
            _clickFlag = true;

        //private methods
        var _onEvents = function () {

                _window.on( {
                    resize: function() {

                        _updateSwiperMain();

                    },
                    scroll: function() {

                        if(_window.width()<=768) {

                            if( _window.scrollTop() > _headers.height() + _headers.offset().top && _window.scrollTop() < _headers.offset().top + _obj.outerHeight() ) {
                                _swiperContainerHeaders.parent().addClass('visible');
                            }
                            else {
                                _swiperContainerHeaders.parent().removeClass('visible');
                            }

                        }

                        if(_obj.hasClass('comparison-table_2')) {
                            if( _window.scrollTop() > _headers.height() + _headers.offset().top && _window.scrollTop() < _headers.offset().top + _obj.outerHeight() ) {
                                _swiperContainerHeaders.parent().addClass('visible');
                            }
                            else {
                                _swiperContainerHeaders.parent().removeClass('visible');
                            }
                        }


                    },
                    load: function() {

                        setTimeout( function() {

                            _updateSwiperMain();

                        }, 500 );

                        if(_window.width()<=768) {

                            if( _window.scrollTop() > _headers.height() + _headers.offset().top ) {
                                _swiperContainerHeaders.parent().addClass('visible');
                            }
                            else {
                                _swiperContainerHeaders.parent().removeClass('visible');
                            }

                        }

                        if(_obj.hasClass('comparison-table_2')) {
                            if( _window.scrollTop() > _headers.height() + _headers.offset().top ) {
                                _swiperContainerHeaders.parent().addClass('visible');
                            }
                            else {
                                _swiperContainerHeaders.parent().removeClass('visible');
                            }
                        }


                    }
                } );

            },
            _init = function () {

                _obj[0].obj = _self;
                _onEvents();
                _initSwiperMain();

                //if( _window.width() < 1024 ) {
                _initSwiperHeders();
                //}

            },
            _initSwiperMain = function () {


                _swiperMain = new Swiper( _swiperContainerMain, {
                    slidesPerView: 7,
                    nextButton: _swiperContainerMain.find('.swiper-button-next')[0],
                    prevButton: _swiperContainerMain.find('.swiper-button-prev')[0],
                    breakpoints: {
                        1024: {
                            slidesPerView: 1
                        }
                    },
                    onSlideChangeStart: function( swiper ) {
                        var activeIndex = swiper.activeIndex;

                        _swiperHeaders.slideTo( activeIndex, 500, false );
                    }
                } );

            },
            _initSwiperHeders = function () {

                    _swiperHeaders = new Swiper( _swiperContainerHeaders, {
                        slidesPerView: 7,
                        nextButton: _swiperContainerHeaders.find('.swiper-button-next')[0],
                        prevButton: _swiperContainerHeaders.find('.swiper-button-prev')[0],
                        breakpoints: {
                            1024: {
                                slidesPerView: 1
                            }
                        },
                        onSlideChangeStart: function( swiper ) {
                            var activeIndex = swiper.activeIndex;

                            _swiperMain.slideTo( activeIndex, 500, false );
                        }
                    } );

            },
            _updateSwiperMain = function () {

                _swiperMain.update();
                _swiperHeaders.update();

            };

        _init();
    };

    function khore_refresh_checkout_checkbox(checkbox) {
        if ($(checkbox).is(':checked')) {
            $(checkbox).closest('.form-row').addClass('checked');
        } else {
            $(checkbox).closest('.form-row').removeClass('checked');
        }
    }

} )();