$( window ).on({
    'load': function(){
        if($( '.hero-slider').length){
            $( '.hero-slider').each( function(){

                new Slider( $( this ) );
            } );
        }

    }
});

var Slider = function( obj ){
    this.obj = obj;
    this.action = false;
    this.active = 0;
    this.radius = 289;
    this.items = this.obj.find( '.slider__item' );
    this.btnNext = this.obj.find( '.slider__btn_next' );
    this.btnPrev = this.obj.find( '.slider__btn_prev' );
    this.duration = 2000;

    this.init();
};
Slider.prototype = {
    init: function(){
        var self = this;

        self.core = self.core();
        self.core.build();
    },
    core: function(){
        var self = this;

        return {
            build: function(){
                self.core.startView();
                self.core.controls();
            },
            startView: function(){
                var curIndex = self.active,
                    prevIndex = self.active - 1,
                    nextIndex = self.active + 1,
                    countItems = self.items.length,
                    i;

                self.deg = [];

                if( nextIndex == countItems ){
                    nextIndex = 0;
                }
                if( prevIndex == -1 ){
                    prevIndex = countItems - 1;
                }
                self.items.eq( curIndex ).css( { display: 'block' } );
                self.items.eq( prevIndex ).css( { display: 'block' } );
                self.items.eq( nextIndex ).css( { display: 'block' } );

                for( i = 0; i < countItems; i++ ){
                    self.deg[ i ] = {};
                    if( i == curIndex ){
                        self.deg[ i ].deg = 0;
                        self.core.drowItem( i , 0 );
                    } else if(  i == prevIndex ){
                        self.deg[ i ].deg = 270;
                        self.core.drowItem( i , 270 );
                    } else if(  i == nextIndex ){
                        self.deg[ i ].deg = 90;
                        self.core.drowItem( i , 90 );
                    } else {
                        self.deg[ i ].deg = 180;
                        self.core.drowItem( i , 180 );
                    }
                }
            },
            drowItem: function( index, deg ){
                var pos = {
                        x: 0,
                        y: 0,
                        z: 0,
                        scale: 0
                    },
                    newX = 0,
                    newZ = 0,
                    newBottom = 0;

                newX = Math.round( ( Math.sin( deg * Math.PI / 180 ) * self.radius ) * 100 ) / 100;
                newZ = Math.round( ( Math.cos( deg * Math.PI / 180 ) * self.radius ) * 100 ) / 100;

                newBottom = -((((newZ+self.radius)/(self.radius*2))*204)-204);

                pos.x = newX;

                pos.z = parseInt( newZ + self.radius ) + 1;

                self.items.eq( index ).css( {
                    '-webkit-transform': '-webkit-translate(' + pos.x + 'px,'+newBottom+'px)',
                    'transform': 'translate(' + pos.x + 'px,'+newBottom+'px)',
                    zIndex: pos.z
                } );

                $.each( self.items, function (){
                    if ( $(this).css('z-index') == '579'){
                        self.items.removeClass('active');
                        $(this).addClass('active');
                    }

                })



            },
            controls: function(){
                Hammer(self.obj).on("swipeleft", function(event) {
                    self.core.slideToNext( self.active + 1 );
                });
                Hammer(self.obj).on("swiperight", function(event) {
                    self.core.slideToPrev( self.active - 1 );
                });
                self.btnNext.on( {
                    click: function(){
                        self.core.slideToNext( self.active + 1 );

                        return false;
                    }
                } );
                self.btnPrev.on( {
                    click: function(){
                        self.core.slideToPrev( self.active - 1 );

                        return false;
                    }
                } );
                self.items.find( 'a' ).on( {
                    click: function(){
                        location.href = $( this).attr( 'href' );
                    }
                } );
                self.items.on( {
                    click: function(){
                        var curItem = $( this).index(),
                            countItems = self.items.length - 1;

                        if( curItem != self.active ){
                            if( curItem == 0 && self.active == countItems ) {
                                self.btnNext.trigger( 'click' );
                            } else if ( curItem == countItems && self.active == 0 ) {
                                self.btnPrev.trigger( 'click' );
                            } else if( curItem > self.active ){
                                self.btnNext.trigger( 'click' );
                            } else {
                                self.btnPrev.trigger( 'click' );
                            }
                        }

                        return false;
                    }
                } );
            },
            slideToPrev: function( index ){
                var countItems = self.items.length,
                    nextItem = 0,
                    pevItem;

                if( !self.action ){

                    self.action = true;

                    if( index  < 0  ){
                        index = countItems - 1;
                    }

                    nextItem = index - 1;

                    if( nextItem < 0 ){
                        nextItem = countItems - 1
                    }

                    pevItem = self.active + 1;

                    if( pevItem == countItems ){
                        pevItem = 0
                    }

                    self.tl = new TimelineMax( {
                        paused: true,
                        onComplete: function(){
                            self.action = false;
                            self.active = index;
                        }
                    } );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ self.active ], 1, {
                        deg: 0
                    }, {
                        deg: 90,
                        onUpdate: function(){
                            self.core.drowItem( self.active , self.deg[ self.active ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ index ], 1, {
                        deg: 270
                    }, {
                        deg: 360,
                        onUpdate: function(){
                            self.core.drowItem( index , self.deg[ index ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.items.eq( nextItem ).css( { display: 'block' } );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ nextItem ], 1, {
                        deg: 180
                    }, {
                        deg: 270,
                        onUpdate: function(){
                            self.core.drowItem( nextItem , self.deg[ nextItem ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ pevItem ], 1, {
                        deg: 90
                    }, {
                        deg: 180,
                        onUpdate: function(){
                            self.core.drowItem( pevItem , self.deg[ pevItem ].deg );
                        },
                        onComplete: function(){
                            self.items.eq( pevItem ).css( { display: 'none' } );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.play();
                }
            },
            slideToNext: function( index ){
                var countItems = self.items.length,
                    nextItem = 0,
                    pevItem;

                if( !self.action ){

                    self.action = true;

                    if( index == countItems ){
                        index = 0
                    }

                    nextItem = index + 1;

                    if( nextItem == countItems ){
                        nextItem = 0
                    }

                    pevItem = self.active - 1;

                    if( pevItem < 0 ){
                        pevItem = countItems - 1
                    }

                    self.tl = new TimelineMax( {
                        paused: true,
                        onComplete: function(){
                            self.action = false;
                            self.active = index;
                        }
                    } );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ self.active ], 1, {
                        deg: 360
                    }, {
                        deg: 270,
                        onUpdate: function(){
                            self.core.drowItem( self.active , self.deg[ self.active ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ index ], 1, {
                        deg: 90
                    }, {
                        deg: 0,
                        onUpdate: function(){
                            self.core.drowItem( index , self.deg[ index ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.items.eq( nextItem ).css( { display: 'block' } );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ nextItem ], 1, {
                        deg: 180
                    }, {
                        deg: 90,
                        onUpdate: function(){
                            self.core.drowItem( nextItem , self.deg[ nextItem ].deg );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.insert( new TweenMax.fromTo( self.deg[ pevItem ], 1, {
                        deg: 270
                    }, {
                        deg: 180,
                        onUpdate: function(){
                            self.core.drowItem( pevItem , self.deg[ pevItem ].deg );
                        },
                        onComplete: function(){
                            self.items.eq( pevItem ).css( { display: 'none' } );
                        },
                        ease: Cubic.easeIn
                    } ), 0 );

                    self.tl.play();
                }
            }
        };
    }
};


