var GS = GS ? GS : {};

GS.gnb = (function () {

    var _gnbset = function () {

        // 셀렉터
        var $select = {
            body: $('html'),
            header: $('header'),
            gnb: $('header .gnb'),
            h1: $('.area_main_nav h1'),
            btn_login: $('.btn_login a'),
            main_nav: $('.area_main_nav'),
            nav: $('.area_main_nav nav'),
            menu: $('nav > ul > li > a'),
            menu_list: $('.menu_list, header .bg'),
            visual_btn: $('#container'),
            burger: $('header .burger'),
            btn_close: $('header .btn_close')
        };

        // 디바이스 상태 체크
        var device;

        // 로그인 버튼 텍스트 상태
        var login_text;

        // 디바이스 너비 체크
        var _deviceWidth = function () {

            var _device = function () {
                var width_check = $select.body.width()
                device = width_check <= 1024 ? "mobile" : "desktop";
                //console.log(width_check, device);
            };

            $(window).on("resize", function () {
                _device();
            });

            _device();
        };//_deviceWidth

        // 데스크톱 GNB 관련 함수
        var _gnbappDesktop = function () {

            // 마우스 온
            var _menuOn = function () {

                if (device == "desktop") {
                    $select.menu_list.show();
                    //$select.btn_close.show();
                }
            };

            // 마우스 아웃
            var _menuOff = function () {
                if (device == "desktop") {
                    $select.menu_list.hide();
                    $select.btn_close.hide();                    
                }
            };

            //마우스 이벤트
            var _mouseEvent = function () {
                var _mouseact = function () {
                    $select.menu.mouseenter(_menuOn);
                    $select.header.mouseleave(_menuOff);
                };
                return _mouseact();
            }//_mouseevent

            // 탭키 이벤트
            var _tabEvent = function () {
                $select.menu.keydown(function () {
                    _menuOn();
                    $select.btn_close.show();
                });                
               
                $select.btn_close.on('click focusout', function (e) {
                    switch (e.type) {                       
                        case 'click':
                            if ($(".lnb").length > 0) {
                                $(".lnb").focus();                                
                            } else {
                                $("#main_visual").focus();                                
                            }
                            break;
                        case 'focusout':
                            _menuOff();
                            break;
                    }
                });
                //$select.btn_close.keydown(_menuOff);
            };

            //실행
            var _init = function () {
                $("#container").attr("tabindex", "0");
                _mouseEvent();
                _tabEvent();
            };

            return _init();

        } //_gnbappDesktop

        // 모바일 GNB 관련 함수
        var _gnbappMobile = function () {

            // 브라우져 상태
            var brs;

            // 브라우져 상태 체크 함수
            var _browserCheck = function () {
                var agent = navigator.userAgent, match;

                if ((match = agent.match(/MSIE ([0-9]+)/)) || (match = agent.match(/Trident.*rv:([0-9]+)/))) brs = 'Internet Explorer';
                else if (match = agent.match(/Chrome\/([0-9]+)/)) brs = 'Chrome';
                else if (match = agent.match(/Firefox\/([0-9]+)/)) brs = 'Firefox';
                else if (match = agent.match(/Safari\/([0-9]+)/)) brs = 'Safari';
                else if ((match = agent.match(/OPR\/([0-9]+)/)) || (match = agent.match(/Opera\/([0-9]+)/))) brs = 'Opera';
                else brs = 'Unknown';

                //if(app !== 'Unknown') version = match[1];
            };

            // 모바일 전환시 gnb link 이벤트 취소
            var _gnbLink = function () {
                $select.menu.on("touch click", function (e) {
                    if (device == "mobile") {
                        e.preventDefault(); //1depth_link_cancel
                        $(this).blur();
                        if ($(this).parent().find('.menu_list').css('display') == "block") {
                            $(this).parent().find('.menu_list').slideUp(300);
                        } else {
                            $select.menu_list.slideUp(300);
                            $(this).parent().find('.menu_list').slideDown(300);
                        }                        
                    }
                });
            };//_mobile_link

            // 햄버거 버튼 제어 함수
            var _burgerAct = function () {
                $select.burger.on("touch click", function () {
                    $select.body.css('overflowY', 'hidden');
                    $select.gnb.animate({ left: "0" });
                    $select.btn_close.css('display', 'block');                    
                })
            };//_burgerAct

            // GNB 닫기
            var _gnbClose = function () {
                $select.btn_close.on("touch click", function () {
                    $select.menu_list.slideUp(300);
                    $select.gnb.animate({ left: "-100%" });
                    $select.body.css('overflowY', 'visible');
                    $select.btn_close.hide();
                })
            };//_gnbClose

            // 실행
            var _init = function () {
                _browserCheck();
                _gnbLink();
                _burgerAct();
                _gnbClose();
            };//_init

            return _init();

        };//_gnbappMobile

        // 디바이스별 h1태그 이동 함수
        var _elMove = function () {
            if ($(window).width() <= 1024) {
                $select.header.prepend($select.h1);
                $select.gnb.prepend($select.btn_close);
            } else {
                $select.main_nav.prepend($select.h1);
                $select.nav.append($select.btn_close);
            }
        };//_elMove

        // 로그인 텍스트 교체 함수
        var _loginTxt = function () {

            login_text = $select.btn_login.html();

            var txt = ["로그인", "여기를 눌러 로그인 하세요"]

            if ($(window).width() <= 1024) {
                if (login_text == txt[0]) $select.btn_login.html(txt[1]);
            } else {
                if (login_text == txt[1]) $select.btn_login.html(txt[0]);
            }

        };

        // GNB 리셋 함수
        var _gnbappReset = function () {

            //console.log(device)
            //console.log("리셋")

            var menu_length = $select.menu_list.length;

            if (device == "desktop") {
                /*for (var i = 0; i < menu_length; i++) {
                    if ($select.menu_list.eq(i).css('display') == "block") {
                        $select.menu_list.eq(i).hide();
                        $select.gnb.css({ left: "-100%" });
                        $select.body.css('overflowY', 'visible');
                    }
                }*/
                $select.menu_list.hide();
                $select.gnb.css({ left: "-100%" });
                $select.body.css('overflowY', 'visible');
                $select.btn_close.hide();
            } else if (device == "mobile") {

                for (var i = 0; i < menu_length; i++) {
                    if ($select.menu_list.eq(i).css('display') == "block") {
                        $select.menu_list.eq(i).hide();
                    }
                }

                if ($select.gnb.css('left', '0px')) {
                    $select.gnb.css({ left: "-100%" });
                    $select.body.css('overflowY', 'visible');
                    $select.btn_close.hide();
                }
            }

        };//_gnbappReset

        // 실행
        var _init = function () {
            _deviceWidth();
            _gnbappDesktop();
            _gnbappMobile();

            var resize = function () {
                _gnbappReset();
                _elMove();
                _loginTxt();
            };

            $(window).on("resize", resize);
            resize();
        };

        return _init();

    };

    return {

        init: _gnbset

    }

})();

GS.mainmotion = (function () {

    var _motionSet = function (img_box) {

        var img;

        var _zoom = function () {

            img = $(this).find('span');

            TweenMax.to(img, 4.0, { scale: 1.1, skewX: 0.1 });

        }

        var _put = function () {

            TweenMax.to(img, 1.0, { scale: 1, skewX: 0.1 });
        }

        var motionAct = function () {

            img_box.hover(_zoom, _put);

        }

        return motionAct();

    }

    var _init = function () {

        var $select = {

            img_box: $('.img_box'),
            img: $('.img_box span')

        }

        _motionSet($select.img_box)
    }

    return {

        init: _init

    }


})();

GS.inputBox = (function () {

    var _inputSet = (function () {

        var _labelAct = function (type) {

            var inputLength = type.length;

            if (inputLength <= 0) return;

            //alert(inputLength);

            for (var i = 0; i < inputLength; i++) {

                if (!type.eq(i).hasClass("valon") && type.eq(i).val().length > 0) { //valon 클래스를 제외한 인풋박스의 텍스트 초기화

                    type.val("");

                }
            }

            var inputVal;

            type.on("mousedown", function (e) { // 우클릭시 플레이스홀더 제거

                var mouseState = e.which;

                if (mouseState == 3) $(this).parent().find('label, span').hide();

            });

            type.on("keyup blur", function () { // 키업 또는 포커스 아웃시 밸류값 체크 후 이벤트 실행

                inputVal = $(this).val();

                //console.log(inputVal);
                if (!$(this).val() == "") {

                    $(this).parent().find('label, span').hide();

                } else {

                    $(this).parent().find('label, span').show();
                }

            });

            var placeholder = type.parent().find("span");
            placeholder.on("click", function (){               
                $(this).hide();
                $(this).parent().find("input").focus();
            });            
        };

        return {

            init: function (type) { _labelAct(type); }

        }

    })();

    var _phoneSet = function () {

        var inputLength = $('#phone').length;

        if (inputLength <= 0) return;

        var _phoneNum = function () {
            $('#phone').keyup(function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        }

        var _autohypen = function (str) {
            str = str.replace(/[^0-9]/g, '');
            var tmp = '';
            if (str.length < 4) {
                return str;
            } else if (str.length < 7) {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3);
                return tmp;
            } else if (str.length < 11) {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 3);
                tmp += '-';
                tmp += str.substr(6);
                return tmp;
            } else {
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 4);
                tmp += '-';
                tmp += str.substr(7);
                return tmp;
            }
            return str;
        }

        var _autohypenact = function () {
            var cellPhone = document.getElementById('phone');
            cellPhone.onkeyup = function (event) {
                event = event || window.event;
                var _val = this.value.trim();
                this.value = _autohypen(_val);
            }
        }

        var _init = function () {
            _phoneNum();
            //_autohypenact();
        }

        return _init();

    }

    var _init = function () {

        var input = $('.input_box input'),
            txtarea = $('.input_box textarea');

        //_phoneSet();
        _inputSet.init(input);
        _inputSet.init(txtarea);

    }

    return {

        init: _init,

    }

})();

GS.tab = (function () {

    var tabAct = function (tab, con, btn, cont) {
        var hidden_tit = $(".remote_tabtit"),
            remote_txt = $(".tab_linetype").find("a.on").text();

        if (hidden_tit.length > 0) {
            hidden_tit.text(remote_txt);
            }
        tab.on("click", function (e) {
            var thistxt = $(this).text();
            if (hidden_tit.length > 0) {
                hidden_tit.text(thistxt);
            }
            var idx = $(this).index(),
                button = $(this).find(' > a');
            con.hide();
            btn.removeClass('on');
            button.addClass('on');
            cont.eq(idx).show();

            //console.log(cont.eq(idx))

        });

    };

    var tabResize = function (tab, wrap) {

        var tab_length = tab.length,
            wrap_width = wrap.width(),
            tab_width = wrap_width / tab_length,
            percent = (tab_width / wrap_width) * 100;

        tab.width(percent + "%");

    }

    var _init = function () {

        var $select = {

            wrap: $('.tab_boxtype'),
            tab: $('.tab_boxtype > li'),
            content: $('.tab_content'),
            button: $('.tab_boxtype > li > a'),
            container: $('.tab_container > div'),
            unit_tab: $('.tab_linetype > li'),
            unit_content: $('.unit_content > li'),
            unit_button: $('.tab_linetype > li > a')

        }

        tabAct($select.tab, $select.content, $select.button, $select.container); //개발 완료 후 삭제
        tabAct($select.unit_tab, $select.unit_content, $select.unit_button, $select.unit_content);  //개발 완료 후 삭제

        tabResize($select.tab, $select.wrap);

    };

    return {

        init: _init

    };

})();

GS.tabChoose = (function () {

    var _chooseAct = function (btn_choose, choose_tab) {

        btn_choose.on("click", function (e) {

            e.preventDefault();

            if (choose_tab.css('display') == "none") {

                choose_tab.slideDown();

            } else {

                choose_tab.slideUp();

            }

        });
    }

    var _displaySet = function (choose_tab) {

        choose_tab.css('display', 'block');

    }

    var _init = function () {

        var url = location.search.substr(1),
            btn_choose = $('.btn_choose'),
            choose_tab = $('.area_choose');

        if (url.indexOf('pageCount') == 0) _displaySet(choose_tab);

        _chooseAct(btn_choose, choose_tab);

        $(window).resize(function () {

            if ($(window).width() >= 640) choose_tab.show();

        });

    }

    return {

        init: _init

    }

})();

GS.modalPop = (function () {

    var popSet = function (popup, btn_pop, body, first_focus, btn_close, pop_content, btn_complex) {

        var reSize = function (el, height) {

            if (el.length == true) el.height(height);

        }
        
        $(".btn_modalpop").each(function (index, poptype) {
            var poptype = $(this).attr('data-poptype');
            $(this).attr("data-popnum", index);
            $(this).attr("data-poptype", poptype);
        });

        btn_pop.on("click", function (e) {
            //e.preventDefault();
            //console.log("팝업버튼클릭")

            var poptype = $(this).attr('data-poptype'),
                pop = $('.modalpop[data-poptype=' + poptype + ']'),
                pop_con = pop.find('.pop_content'),
                pop_num = $(this).attr("data-popnum");

            pop.fadeIn(function () {
                pop_con.focus();
                pop.attr("data-popnum", pop_num);
                var pop_height = pop_con.height() + 100;                
                if ($(window).width() >= 640) {

                    pop_con.css({ marginTop: -pop_height / 2, top: "50%" });
                    TweenMax.to(pop_con, 0.5, { opacity: 1, delay: 0.2 });

                } else {

                    pop_con.css({ marginTop: "10%", top: 0 });
                    TweenMax.to(pop_con, 0.5, { opacity: 1, delay: 0.2 });

                }

                var video = $('.video_box'),
                    map_box = $('.map_box'),
                    videoWidth = video.width(),
                    videoHeight = videoWidth * 0.5625,
                    mapWidth = map_box.width();


                $(function () {

                    pop_height = pop_con.height() + 100;

                    videoWidth = video.width(),
                    videoHeight = videoWidth * 0.5625,
                    mapWidth = map_box.width();

                    reSize(video, videoHeight);
                    reSize(map_box, mapWidth * 0.61818);

                });

                $(window).on("resize", function () {

                    pop_height = pop_con.height() + 100;

                    videoWidth = video.width(),
                    videoHeight = videoWidth * 0.5625,
                    mapWidth = map_box.width();

                    reSize(video, videoHeight);
                    reSize(map_box, mapWidth * 0.61818);

                });

            });

            //body.css('overflow', 'hidden');
            //first_focus.focus();

        });


        btn_close.on("click", function (e) {                      
            e.preventDefault();
            popup.fadeOut();
            pop_content.css('opacity', 0);
            var thispop = $(this).parent().parent().parent(),
                poptype = thispop.attr("data-poptype"),
                current = thispop.attr("data-popnum");
            $("body").find('.btn_modalpop[data-poptype=' + poptype + '][data-popnum=' + current + ']').focus();            
            //body.css('overflow', 'visible');            
        });

        /*btn_close.blur(function () {

            first_focus.focus();

        });*/

    };

    var _listClose = function () {

        var $select = {
            body: $('body, html'),
            popup: $('.modalpop'),
            btn_pop: $('.btn_modalpop'),
            btn_close: $('.modalpop .btn_close'),
            btn_complex: $('.complex_list li'),
            pop_content: $('.pop_content'),
            first_focus: $('.first-focus')

        }

        $select.btn_complex.on("click", function (e) {

            e.preventDefault();
            //$select.first_focus.val('');
            $select.popup.fadeOut();
            $select.pop_content.css('opacity', 0)

        });

        $select.btn_close.blur(function () {

            first_focus.focus();

        });

    };

    var _init = function () {

        $(document).ready(function () {

            var $select = {
                body: $('body, html'),
                popup: $('.modalpop'),
                btn_pop: $('.btn_modalpop'),
                btn_close: $('.modalpop .btn_close'),
                btn_complex: $('.complex_list li'),
                pop_content: $('.pop_content'),
                first_focus: $('.first-focus')

            }

            popSet($select.popup, $select.btn_pop, $select.body, $select.first_focus, $select.btn_close, $select.pop_content, $select.btn_complex);

            //console.log($select.btn_pop)

        });
    };


    var _

    return {

        init: _init,
        listclose: _listClose

    };

})();
/*
GS.selectAttr = (function () {

    var selectSet = function () {

        var $select = {

            type: $('.customer_type option')

        };

        var attr_get = location.search.substr(1),
            select_opt = $('option[' + attr_get + ']');

        select_opt.attr('selected', 'selected');

    };

    var _init = function () {
        selectSet();
    };

    return {

        init: _init

    };

})();
*/
GS.percentCircle = (function () {

    var _cicleSet = function (bar, per, circle) {

        TweenMax.set(bar, { strokeDasharray: 249, strokeDashoffset: 249 });
        TweenMax.to(bar, 2.0, { strokeDashoffset: 249 - per, ease: Power0.easeNone });

    };

    var _pertxtSet = function (span, percent) {

        var counter = { value: 0 };

        var _countUp = function () {

            span.html(Math.ceil(counter.value));

        };

        TweenMax.to(counter, 2.0, { value: percent, onUpdate: _countUp });
        //console.log(span, percent)

    };

    var _motionAct = function (motion) {

        var circle = $('.percent_circle svg'),
            act_circle = $('.percent_circle[active-motion=true]'),
            act_length = act_circle.length;

        for (var i = 0; i < act_length; i++) {
            var percent = act_circle.eq(i).attr('percent-value'),
                percentage = (percent / 100) * 249,
                act_target = act_circle.eq(i),
                state_bar = act_target.find('.state_bar'),
                per_txt = act_target.find('strong > span');

            _cicleSet(state_bar, percentage, circle);
            _pertxtSet(per_txt, percent);

            act_circle.eq(i).attr('active-motion', motion);
        };
    };

    var _init = function (motion) {

        _motionAct(motion);

    };

    return {

        init: _init
    };

})();

GS.xicast = (function () {

    var _init = function () {
        var cast_box = $('.sns_box, .photo_box'),
            title_box = $('.title_box, .txt_box');

        var mouseOn = function () {
            $(this).find(title_box).show();
        };

        var mouseOver = function () {
            title_box.hide();
        };

        //cast_box.hover(mouseOn, mouseOver);      
        cast_box.on('mouseenter focusin mouseleave focusout', function (e) {
            switch (e.type) {
                case 'mouseenter':                        
                case 'focusin': 
                    $(this).find(title_box).show();                        
                    break;
                case 'focusout':
                case 'mouseleave':
                    title_box.hide();                                                
                    break;
            }
        });

    };

    return {

        init: _init

    };

})();

GS.ajaxSet = (function () { //공사중 단지 상세페이지 데이터 제어 스크립트

    var _dataLoad = (function () {
        /* var _dataLoad = function () {

             $.ajax({
 
                 url: '/Content/json/build.json',
                 dataType: 'json',
                 success: function (data) {
 
                     _setData(data);
                     GS.percentCircle.init(true);
 
                 }
             });
         }*/
        var data = "";
        var _setData = function (data) {
            data = data;
            if (data !== null && typeof (data) !== "undefined" && data !== "") {
                var circle = $('.percent_circle[active-motion=true]'),
                    circle_length = circle.length - 1,
                    box = $('.box');

                box.eq(0).find('h4').text(data.totalBox.date);
                circle.eq(0).attr('percent-value', data.totalBox.percent);

                /*
                for (var i = 0; i < circle_length; i++) {
                    circle.eq(i + 1).attr('percent-value', data.detailBox[i].percent);
                    box.eq(i + 1).find('pre').text(data.detailBox[i].txt);
                }*/

                //건축공사
                circle.eq(1).attr('percent-value', data.detailBox[0].percent);
                box.eq(1).find('pre').text(data.detailBox[0].txt);

                //전기공사
                circle.eq(2).attr('percent-value', data.detailBox[2].percent);
                box.eq(2).find('pre').text(data.detailBox[2].txt);

                //토목공사
                circle.eq(3).attr('percent-value', data.detailBox[1].percent);
                box.eq(3).find('pre').text(data.detailBox[1].txt);

                //설비공사
                circle.eq(4).attr('percent-value', data.detailBox[3].percent);
                box.eq(4).find('pre').text(data.detailBox[3].txt);
            }
        }

        var _tabClick = function (tab) {

            tab.on("click", function () {
                // _dataLoad();
                _setData(data);
                GS.percentCircle.init(true);
            });

        }

        var _LoadAct = function () {

            var tab = $('ul.list li a');
            _tabClick(tab);
            //tab.trigger('click');

        }

        return {
            setData: function (data) { _LoadAct(); _setData(data); }
        }

    })();

    var _dateTab = function () {

        var cnt = 0;

        var _tabsizeSet = function (wrap, tab, length, wrapSize, tabSize) {

            tab.width(tabSize);
            wrap.width(wrapSize);

            //console.log("탭사이즈 : " + tabSize, "컨테이너 사이즈 : " + wrapSize, "탭 length : " + length)

        };

        var _motionAct = function (wrap, moveSize) {

            TweenMax.to(wrap, 0.5, { x: -moveSize });

        };

        var _moveAct = function (wrap, idx, tabSize, maxSize) {

            var index = idx <= 0 ? 0 : idx - 1,
                max = Math.floor(maxSize),
                move = Math.floor(tabSize * idx)
            moveSize = move > max ? maxSize : move == max ? tabSize * index : tabSize * index,
            thisTab = $(this);

            if ($(window).width() >= 640 && wrap.width() >= tabSize * 5) {

                _motionAct(wrap, moveSize);

            } else if ($(window).width() <= 640 && wrap.width() >= tabSize * 3) {

                _motionAct(wrap, moveSize);

            } else {

                _motionAct(wrap, 0);

            }

            //console.log(move, max)

        };

        var _indTab = function (tab) {

            tab.siblings().removeClass('on');
            tab.addClass('on');

        };

        var _tabClick = function (button, wrap, tabSize, maxSize, conSize) {

            var _tabClickAct = function (idx, thisTab) {

                _moveAct(wrap, idx, tabSize, maxSize);

            };

            var _tabClick = function () {

                button.on("click", function (e) {

                    e.preventDefault();

                    var idx = $(this).index(),
                        thisTab = $(this);

                    //console.log("idx Val : " + idx);
                    //console.log(thisTab);

                    _indTab(thisTab);
                    _tabClickAct(idx, thisTab);

                    cnt = idx;

                });

            };

            return _tabClick();

        };

        var _nextbtnClick = function (btn, tab, length) {

            btn.on("click", function (e) {

                e.preventDefault();

                var idx = cnt >= length - 1 ? length - 1 : cnt + 1,
                    thisTab = tab.eq(idx),
                    ajax_btn = thisTab.find('a');

                //thisTab.trigger('click');
                ajax_btn.trigger('click');

            });
        };

        var _prevbtnClick = function (btn, tab) {

            btn.on("click", function (e) {

                e.preventDefault();

                var idx = cnt <= 0 ? 0 : cnt - 1,
                    thisTab = tab.eq(idx),
                    ajax_btn = thisTab.find('a');

                //thisTab.trigger('click');
                ajax_btn.trigger('click');

            });
        };

        var _datetabAct = function () {

            var $select = {

                list_container: $('.list_container'),
                tab: $('.list_container .list li'),
                tab_Wrap: $('.list_container .list'),
                btn_prev: $('.tab_date a.btn_prev'),
                btn_next: $('.tab_date a.btn_next')

            };

            var tab_length = $select.tab.length;

            var _TabAct = function () {

                var container_width = $select.list_container.width(),
                    tab_width = $(window).width() <= 640 ? container_width / 3 : container_width / 5,
                    wrap_size = tab_width * tab_length,
                    maxSize = wrap_size - container_width;

                _tabsizeSet($select.tab_Wrap, $select.tab, tab_length, wrap_size, tab_width);
                _tabClick($select.tab, $select.tab_Wrap, tab_width, maxSize, wrap_size);

            };

            $(function () {

                _TabAct();

            });

            $(window).on("resize", function () {

                _TabAct();
                $select.tab.eq(cnt).trigger('click');

            });

            _nextbtnClick($select.btn_next, $select.tab, tab_length);
            _prevbtnClick($select.btn_prev, $select.tab);

        };

        return _datetabAct();

    };

    var _init = function () {

       
        _dateTab();

    }

    return {
        init: _init,
        
    };

})();

GS.imgSize = (function () { //단지리스트 이미지 사이즈 제어 스크립트

    var _autoSize = function () {

        var img = $('.complex_img'),
            img_box = $('.complex_img'),
            imgWidth = img.width(),
            imgHeight = imgWidth * 0.6618;

        img_box.height(imgHeight);

    };

    var _storyimgSize = function () {

        $(function () {

            var img = $('.story_box'),
                img_box = $('.story_box .img'),
                imgWidth = img.width(),
                imgHeight = imgWidth * 0.5635;

            img_box.height(imgHeight);

            //console.log(imgWidth, imgHeight)

        });

        $(window).on("load resize", function () {

            var img = $('.story_box'),
                img_box = $('.story_box .img'),
                imgWidth = img.width(),
                imgHeight = imgWidth * 0.5635;

            img_box.height(imgHeight);

            //console.log(imgWidth, imgHeight)

        });

    };

    var _cusImgSize = function (cont, img) {

        var img = img,
            img_box = cont,
            imgWidth = img.width(),
            imgHeight = imgWidth * 0.5635;

        img.height(imgHeight);

        //console.log(img, imgWidth, imgHeight)

        //console.log(cont, img)

        $(window).on("resize", function () {

            imgWidth = img.width(),
            imgHeight = imgWidth * 0.5635;

            img.height(imgHeight);

            //console.log(img, imgWidth, imgHeight)

        });

    };

    var _click = function (btn, cont, img) {

        var btnState = "off";

        btn.on("click", function () {

            if (btnState != "off") return;

            _cusImgSize(cont, img)
            btnState = "on";
        });
    };

    var _init = function () {

        $(window).on("load resize", function () {

            _autoSize();

        });

    }

    return {

        init: _init,
        story: _storyimgSize,
        click: _click,
        custom: _cusImgSize

    }


})();

GS.thumTab = (function () { //공사중 단지 공정이미지 탭 제어 스크립트

    var _thumTab = function () {

        var cnt = 0;

        var _tabsizeSet = function (wrap, tab, length, wrapSize, tabSize) {

            tab.width(tabSize);
            wrap.width(wrapSize);

            //console.log("탭사이즈 : " + tabSize, "컨테이너 사이즈 : " + wrapSize, "탭 length : " + length)

        };

        var _motionAct = function (wrap, moveSize) {

            TweenMax.to(wrap, 0.5, { x: -moveSize });

        };

        var _moveAct = function (wrap, idx, tabSize, maxSize) {

            var index = idx <= 0 ? 0 : idx - 1,
                max = Math.floor(maxSize),
                move = Math.floor(tabSize * idx),
                moveSize = move > max ? maxSize : move == max ? tabSize * index : tabSize * index,
                thisTab = $(this);

            if ($(window).width() >= 640 && wrap.width() >= tabSize * 8) {

                _motionAct(wrap, moveSize);

            } else if ($(window).width() <= 640 && wrap.width() >= tabSize * 3) {

                _motionAct(wrap, moveSize);

            }

            //console.log(move, max)

        };

        var _indTab = function (tab) {

            tab.siblings().removeClass('on');
            tab.addClass('on');

        };

        var _tabClick = function (button, wrap, tabSize, maxSize, conSize) {

            var _tabClickAct = function (idx, thisTab) {

                _moveAct(wrap, idx, tabSize, maxSize);

            };

            var _tabClick = function () {


                button.on("click", function (e) {

                    e.preventDefault();

                    var idx = $(this).index(),
                        thisTab = $(this);

                    _indTab(thisTab);
                    _tabClickAct(idx, thisTab);

                    cnt = idx;

                });

            };

            return _tabClick();

        };

        var _nextbtnClick = function (btn, tab, length) {

            btn.on("click", function (e) {

                e.preventDefault();

                var idx = cnt >= length - 1 ? length - 1 : cnt + 1,
                    thisTab = tab.eq(idx),
                    ajax_btn = thisTab.find('a');

                thisTab.trigger('click');
                ajax_btn.trigger('click');

                //console.log("next실행")

            });
        };

        var _prevbtnClick = function (btn, tab) {

            //console.log(btn, tab)

            btn.on("click", function (e) {
                //console.log("prev실행")

                e.preventDefault();

                var idx = cnt <= 0 ? 0 : cnt - 1,
                    thisTab = tab.eq(idx),
                    ajax_btn = thisTab.find('a');

                thisTab.trigger('click');
                ajax_btn.trigger('click');

            });
        };

        var _datetabAct = function () {

            var $select = {

                list_container: $('.thum_con'),
                tab: $('.thum_con > ul > li'),
                tab_Wrap: $('.thum_con > ul'),
                btn_prev: $('.thum_list a.btn_prev'),
                btn_next: $('.thum_list a.btn_next')

            };

            var tab_length = $select.tab.length;

            var _TabAct = function () {

                var container_width = $select.list_container.width(),
                    tab_width = $(window).width() <= 640 ? container_width / 3 : $(window).width() <= 1024 ? container_width / 6 : container_width / 8,
                    wrap_size = tab_width * tab_length,
                    maxSize = wrap_size - container_width;

                _tabsizeSet($select.tab_Wrap, $select.tab, tab_length, wrap_size, tab_width);
                _tabClick($select.tab, $select.tab_Wrap, tab_width, maxSize, wrap_size);

            };

            $(window).on("load", function () {

                _TabAct();

            });

            $(window).on("resize", function () {

                _TabAct();
                $select.tab.eq(cnt).trigger('click');

            });

            _nextbtnClick($select.btn_next, $select.tab, tab_length);
            _prevbtnClick($select.btn_prev, $select.tab);

        };

        return _datetabAct();

    };

    var _init = function () {

        _thumTab();

    };

    return {

        init: _init

    };


})();

GS.videoResize = (function () { //아이프레임 video 비율 제어 스크립트


    var resize = function (video, height) {

        video.height(height)

    }

    var resizeAct = function () {

        var video = $('.video_box'),
            container = $('.tab_container, .video_content'),
            width = container.width(),
            height = width * 0.5625;

        $(window).on("load resize", function () {

            width = container.width(),
            height = width * 0.5625;

            //console.log("비디오사이즈 : " + width)

            if ($(window).width() <= 1280) {

                resize(video, height);

                //console.log(width)

            } else {

                video.height(390);

            };

        });

    }

    var _init = function () {

        if ($('.video_box').length == true) resizeAct();
        //console.log($('.video_box'))
    }

    return {

        init: _init

    }

})();

GS.saleBox = (function () { // 메인페이지 캘린더 제어 스크립트

    var cnt = 0, con_width;

    var boxAct = function (box, size) {

        TweenMax.to(box, 1.5, { left: cnt * -size, ease: Circ.easeOut });

        //console.log(size)

    };

    var thisSize = function (cont) {

        con_width = cont.width();

    };

    var btnPrev = function (btn, box, cont, length) {

        btn.on("click", function (e) {

            e.preventDefault();

            cnt = cnt <= 0 ? 0 : --cnt;

            thisSize(cont);
            boxAct(box, con_width);

            //console.log(cnt)

        });

    };

    var btnNext = function (btn, box, cont, length) {

        btn.on("click", function (e) {

            e.preventDefault();

            cnt = cnt >= length ? length : ++cnt;

            thisSize(cont);
            boxAct(box, con_width);

            //console.log(cnt)

        });
    };

    var resizeAct = function (box, cont) {

        thisSize(cont);

        boxAct(box, con_width);

        //console.log(cnt, con_width)

    }

    var _init = function () {

        var $select = {

            container: $('.area_xiinfo'),
            schedule_box: $('.schedule_box'),
            box: $('.sale_list'),
            btn_prev: $('.area_xiinfo .btn_set a.btn_prev'),
            btn_next: $('.area_xiinfo .btn_set a.btn_next')

        };


        var boxLength = $select.box.length - 1

        btnPrev($select.btn_prev, $select.schedule_box, $select.container, boxLength);
        btnNext($select.btn_next, $select.schedule_box, $select.container, boxLength);

        $(window).on("resize", function () {

            if ($(window).width() <= 640) resizeAct($select.schedule_box, $select.container);

        });
    }

    return {

        init: _init

    }

})();

GS.noticeBox = (function () {

    var cnt = 0;

    var touchX = 0,
        boxX = 0,
        con_width = 0,
        box_width = 0,
        margin = 0,
        rowX = 0;

    var touchSta;

    var _moveAct = function (cnt, list, size) { //박스 이동 모션

        TweenMax.to(list, 1.0, { left: cnt * -size, ease: Circ.easeOut });

    };

    var _indAct = function (cnt, ind) { //인디케이터 on/off

        ind.removeClass('on');
        ind.eq(cnt).addClass('on');

    }

    var _linkAct = function (box) { //링크실행

        var link = box.find('a').attr('href');

        location.href = link;

    };

    var _tabAct = function (box) { //touchSta 상태가 tab일 경우 linkAct 실행

        if (touchSta == "tab") {

            var thisBox = box.eq(cnt);

            _linkAct(thisBox);


        }

    };

    var _touchAct = function (cont, list, box, ind) { // 터치이벤트 시작

        cont.on("touchstart", function (e) {

            var win_width = $(window).width();

            touchX = event.touches[0].pageX - list.offset().left;
            con_width = list.width();
            //box_width = box.width()+40;
            box_width = box.width();
            margin = win_width - box_width;

            touchSta = "tab"; // 탭

        });

        cont.on("touchmove", function (e) {

            rowX = event.touches[0].pageX;

            var startX = touchX - rowX,
                moveX = startX <= 0 ? 0 : startX >= con_width - box_width ? con_width - box_width : startX;

            TweenMax.to(list, 0.3, { left: -moveX });

            touchSta = "move"; // 이동

        });

        cont.on("touchend", function (e) {

            var box_length = box.length - 1;

            if (touchSta == "move" && rowX <= box_width * 0.5) {

                cnt = cnt <= -1 ? 0 : cnt >= box_length ? box_length : ++cnt;

                _moveAct(cnt, list, box_width);

                _indAct(cnt, ind);

                rowX = 0;

            } else if (touchSta == "move" && rowX >= box_width * 0.6) {

                cnt = cnt <= 0 ? 0 : --cnt;

                _moveAct(cnt, list, box_width);

                _indAct(cnt, ind);

            } /*else if (touchSta == "tab") {

                _tabAct(box);

            }*/ else {

                _moveAct(cnt, list, box_width);

            }

        });

    };

    var _init = function () {

        var $select = {

            cont: $('.notice_container'),
            list: $('.notice_list'),
            box: $('.notice_list li.box'),
            ind: $('.area_notice .title .ind li')

        }

        _indAct(0, $select.ind);
        _touchAct($select.cont, $select.list, $select.box, $select.ind);
        var $noticebox = $('.notice_list li a');
            $noticebox.on('mouseenter focusin mouseleave focusout', function (e) {           
            switch (e.type) {
                case 'mouseenter':
                case 'focusin':
                    TweenLite.to($(this).find('.link_box'), 0, { css: { 'opacity': 1 }, ease: Cubic.easeOut });
                    break;
                case 'focusout':
                case 'mouseleave':
                    TweenLite.to($(this).find('.link_box'), 0, { css: { 'opacity': 0 }, ease: Cubic.easeOut });
                    break;
            }
           
        });


    };

    return {

        init: _init

    }

})();

GS.mainSlider01 = (function () {

    var cnt = 0,
        interval,
        list_length,
        move_size = 0;

    var btn;

    var autoState = "off"
    var prevDev, curDev;            // 이전 디바이스 종류, 현재 디바이스 종류

    //터치이벤트용 변수 start

    var touchTab = 0,
        touchX = 0,
        boxX = 0,
        con_width = 0,
        box_width = 0,
        margin = 0,
        rowX = 0,
        moveState = 0;

    var touchState1 = "on",
        touchState2 = "tab";

    //터치이벤트용 변수 end

    var _indSet = function ( ind, length ) {

        if (length == 1) {

            ind.parent().hide();

        }

    };

    var _moveAct = function (cnt, cont, size, speed) {

        if (touchState1 == "off") return;

        var move = cnt * size;

        if (cnt >= list_length + 1) { // 슬라이더 length +1

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else if (cnt <= 0) { // 루프시 실행

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size * list_length });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else {

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    touchState1 = "on";
                    //console.log(touchState1)

                }
            });
            //console.log(list_length)
            //console.log(cnt)
        }

    };

    var _indOn = function (cnt, ind) {

        ind.removeClass('on');
        ind.eq(cnt).addClass('on');

    };

    var _indAct = function (ind, cont, size) {

        ind.on("click", function () {

            var idx = $(this).index();

            _indOn(idx, ind)

            cnt = idx;

            _moveAct(idx + 1, cont, size, 4.0);

            if (autoState == "on") _clearPlay();

        })

    };

    var _cloneAct = function (list, indWrap) {

        list.last().clone().prependTo(indWrap);
        list.first().clone().appendTo(indWrap);

    };

    var _sizeSet = function (list, cont, width) {

        list.css('width', width);
        cont.css('width', width * (list_length + 2));

    };

    var _contSet = function (cont, size) {

        TweenMax.set(cont, { left: -size });

    };

    var _autoPlay = function (cont, ind, length) {

        if (autoState == "on") return;

        if (length == 1) return;

        var count = 0;

        btn.removeClass('fa-play-circle');
        btn.addClass('fa-pause-circle');

        var _autoAct = function () {

            count += 1;
            if (count == 240) {

                cnt = cnt >= list_length ? 0 : cnt <= -1 ? list_length - 1 : ++cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 4.0);
                    _indOn(0, ind);

                } else {

                    _moveAct(cnt + 1, cont, move_size, 4.0);
                    _indOn(cnt, ind);

                }

                count = 0;

            };
            interval = window.requestAnimationFrame(_autoAct);
        };

        interval = window.requestAnimationFrame(_autoAct);

        autoState = "on";


    }

    var _clearPlay = function () {

        if (autoState == "off") return;

        window.cancelAnimationFrame(interval);
        btn.removeClass('fa-pause-circle');
        btn.addClass('fa-play-circle');
        autoState = "off";

    };



    var _tabPlay = function (slider, tab, cont, size, ind, visualSibling, tabSibling) {

        tab.on("click", function () {

            GS.mainSlider02.pause();
            GS.mainSlider03.pause();
            visualSibling.fadeOut(300);
            slider.fadeIn(600);
            tabSibling.removeClass('on');
            tab.addClass('on');
            _autoPlay(cont, ind);

        });

    };

    var _btnPlay = function (cont, size, ind) {

        btn.on("click touch", function () {

            if (autoState == "on") {

                _clearPlay();

            } else if (autoState == "off") {

                _autoPlay(cont, ind);

            }

        });

    };

    var _hoverAct = function (list, cont, size, ind) {

        list.mouseenter(function () {

            _clearPlay()

        });

    }

    //터치이벤트 start

    var _touchAct = function (visual, cont, list, ind) {

        if (list.length <= 1) return;

        var _touchMove = function (cont, move_size) {

            TweenMax.to(cont, 0.3, { left: -move_size });

        };

        visual.on("touchstart", function (e) {

            _clearPlay();

            if (cnt >= list_length) cnt = 0;
            if (cnt <= -1) cnt = list_length - 1;

            //console.log("totlal : " + list_length)
            //console.log("cnt : " + cnt)

            var wid_width = $(window).width();

            touchTab = event.touches[0].pageX;
            touchX = event.touches[0].pageX - cont.offset().left;
            con_width = cont.width();
            box_width = list.width();
            margin = wid_width - box_width;

            _clearPlay();

            touchState2 = "tab"; // 탭

            //console.log("터시치작")
            //console.log(touchTab - event.touches[0].pageX)

        });

        visual.on("touchmove", function (e) {

            if (touchState1 == "on") {

                rowX = event.touches[0].pageX;
                moveState = touchTab - event.touches[0].pageX;

                var startX = touchX - rowX,

                moveX = startX <= 0 ? 0 : startX >= con_width - box_width ? con_width - box_width : startX;

                touchState2 = "move"; // 이동

                _touchMove(cont, moveX)

                //console.log("터치중")
                //console.log(touchTab - event.touches[0].pageX)

            }
        });

        visual.on("touchend", function (e) {

            if (touchState2 == "move" && moveState >= 40) {

                ++cnt;
                //console.log("totlal : " + list_length)
                //console.log("cnt : " + cnt)
                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);
                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);
                    touchState1 = "off";

                }


            } else if (touchState2 == "move" && moveState <= -40) {

                cnt = cnt >= list_length ? 1 : --cnt;
                //console.log("totlal : " + list_length)
                //console.log("cnt : " + cnt)
                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);

                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);

                    touchState1 = "off";

                }


            } else {

                _moveAct(cnt + 1, cont, move_size, 0.5);

            }

        });

    };

    //터치이벤트 end

    // 웹&태블릿, 모바일 이미지 교체
    var _deviceImgChange = function (cont, obj) {
        var $cont = cont,
            $list = $cont.find(".visual_01");

        if (obj.status) {       // 디바이스가 바뀌는 시점에서만 이미지 교체하도록
            if (obj.curDev === "mobile") {                // mobile
                $list.each(function (i) {
                    var src = $(this).data("mobile");
                    $(this).css("background-image", "url('" + src + "')");
                });
            } else {                                    // pc & tablet
                $list.each(function (i) {
                    var src = $(this).data("pc");
                    $(this).css("background-image", "url('" + src + "')");
                });
            }
        }
    };

    // 디바이스 체크 및 변화 감지
    var _checkStatus = function (cont) {
        var wWidth = $(window).width(),
            mobileWidth = 640;
        var obj, status;

        prevDev = curDev;

        // 현재 디바이스 체크
        if (wWidth <= mobileWidth) {
            curDev = "mobile";
        } else {
            curDev = "pc";
        }
        
        (prevDev === curDev) ? status = false : status = true;      // 같은 디바이스면 이미지 교체하지 않는다 (status = false)

        obj = {
            status:status,
            curDev: curDev
        };

        _deviceImgChange(cont, obj);
    };

    var _init = function (first) {

        if ($('.slider_01').length <= 0) return;

        var $select = {

            visual: $('.main_visual'),
            slider: $('.slider_01'),
            slider_sibling: $('.slider_02, .slider_03'),
            cont: $('.slider_01 .visual_list'),
            list: $('.slider_01 .visual_list > li'),
            ind: $('.slider_01 .ind li'),
            tab: $('.btn_new'),
            tab_sibling: $('.main_visual .tab_category button'),
            btn_control: $('.slider_01 .ind #new_control'),
            link: $('.slider_01 a.btn_link')

        }
        var win_width;

        list_length = $select.list.length;

        $(function () {

            win_width = $(window).width();

            move_size = win_width;

            btn = $select.btn_control;

            _indSet($select.ind, list_length);
            _indOn(0, $select.ind);
            _indAct($select.ind, $select.cont, win_width);
            _sizeSet($select.list, $select.cont, win_width);
            _contSet($select.cont, win_width);
            _cloneAct($select.list, $select.cont);
            _hoverAct($select.link, $select.cont, move_size, $select.ind);
            _tabPlay($select.slider, $select.tab, $select.cont, move_size, $select.ind, $select.slider_sibling, $select.tab_sibling);
            _touchAct($select.cont, $select.cont, $select.list, $select.ind)
            _btnPlay($select.cont, win_width, $select.ind);
            //_deviceImgChange($select.cont);
            _checkStatus($select.cont, prevDev, curDev);

            if (first == "start") {

                $select.slider.fadeIn(300);
                $select.tab.addClass('on');
                _autoPlay($select.cont, $select.ind, list_length);

            }

        });

        $(window).on("resize", function () {

            $select = {

                visual: $('.main_visual'),
                slider: $('.slider_01'),
                slider_sibling: $('.slider_02, .slider_03'),
                cont: $('.slider_01 .visual_list'),
                list: $('.slider_01 .visual_list > li'),
                ind: $('.slider_01 .ind li'),
                tab: $('.btn_new'),
                tab_sibling: $('.main_visual .tab_category button'),
                btn_control: $('.slider_01 .ind #new_control'),
                link: $('.slider_01 a.btn_link')

            }

            win_width = $('#wrap').width();

            move_size = win_width;

            //_deviceImgChange($select.cont);
            _checkStatus($select.cont, prevDev, curDev);
            _sizeSet($select.list, $select.cont, win_width);
            _clearPlay();
            _indAct($select.ind, $select.cont, win_width);

            _moveAct(cnt + 1, $select.cont, win_width);

        });


    }

    return {

        init: _init,
        play: _autoPlay,
        pause: _clearPlay

    }

})();

GS.mainSlider02 = (function () {

    var cnt = 0,
        interval,
        list_length,
        move_size = 0;

    var btn;

    var autoState = "off"

    //터치이벤트용 변수 start

    var touchTab = 0,
        touchX = 0,
        boxX = 0,
        con_width = 0,
        box_width = 0,
        margin = 0,
        rowX = 0,
        moveState = 0;

    var touchState1 = "on",
        touchState2;

    //터치이벤트용 변수 end

    var _moveAct = function (cnt, cont, size, speed) {

        if (touchState1 == "off") return;

        var move = cnt * size;

        if (cnt >= list_length + 1) { // 슬라이더 length +1

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else if (cnt <= 0) { // 루프시 실행

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size * list_length });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else {

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });
        }

    };

    var _indSet = function (ind, length) {

        if (length == 1) {

            ind.parent().hide();

        }

    };

    var _indOn = function (cnt, ind) {

        ind.removeClass('on');
        ind.eq(cnt).addClass('on');

    };

    var _indAct = function (ind, cont, size) {

        ind.on("click", function () {

            var idx = $(this).index();

            _indOn(idx, ind)

            cnt = idx;

            _moveAct(idx + 1, cont, size, 4.0);

            if (autoState == "on") _clearPlay();

        })

    };

    var _cloneAct = function (list, indWrap) {

        list.last().clone().prependTo(indWrap);
        list.first().clone().appendTo(indWrap);

    };

    var _sizeSet = function (list, cont, width) {

        list.css('width', width);
        cont.css('width', width * (list_length + 2));

    };

    var _contSet = function (cont, size) {

        TweenMax.set(cont, { left: -size });

    };

    var _autoPlay = function (cont, ind, length) {

        if (autoState == "on") return;
        
        if (length == 1) return;

        btn.removeClass('fa-play-circle');
        btn.addClass('fa-pause-circle');

        interval = setInterval(function () {

            cnt = cnt >= list_length ? 0 : cnt <= -1 ? list_length - 1 : ++cnt;

            if (cnt >= list_length) { //슬라이더 length

                _moveAct(cnt + 1, cont, move_size, 4.0);
                _indOn(0, ind);

            } else {

                _moveAct(cnt + 1, cont, move_size, 4.0);
                _indOn(cnt, ind);

            }

        }, 4000);

        autoState = "on";

        //        console.log(autoState)

    }

    var _clearPlay = function () {

        if (autoState == "off") return;

        clearInterval(interval);

        btn.removeClass('fa-pause-circle');
        btn.addClass('fa-play-circle');

        autoState = "off";

        //      console.log(autoState)

    };

    var _tabPlay = function (slider, tab, cont, size, ind, visualSibling, tabSibling) {

        tab.on("click", function () {

            GS.mainSlider01.pause();
            GS.mainSlider03.pause();
            visualSibling.fadeOut(300);
            slider.fadeIn(600);
            tabSibling.removeClass('on');
            tab.addClass('on');
            _autoPlay(cont, ind);

        });

    };

    var _btnPlay = function (cont, size, ind) {

        btn.on("click touch", function () {

            if (autoState == "on") {

                _clearPlay();

            } else if (autoState == "off") {

                _autoPlay(cont, ind);

            }

        });

    };

    var _hoverAct = function (list, cont, size, ind) {

        list.mouseenter(function () {

            _clearPlay()

        });

    }

    //터치이벤트 start

    var _touchAct = function (visual, cont, list, ind) {

        if (list.length <= 1) return;

        var _touchMove = function (cont, move_size) {

            TweenMax.to(cont, 0.3, { left: -move_size });

        };

        visual.on("touchstart", function (e) {

            _clearPlay();

            if (cnt >= list_length) cnt = 0;
            if (cnt <= -1) cnt = list_length - 1;

            var wid_width = $(window).width();

            touchTab = event.touches[0].pageX;
            touchX = event.touches[0].pageX - cont.offset().left;
            con_width = cont.width();
            box_width = list.width();
            margin = wid_width - box_width;

            _clearPlay();

            touchState2 = "tab"; // 탭

            //            console.log("터시치작")
            //            console.log(touchTab - event.touches[0].pageX)

        });

        visual.on("touchmove", function (e) {

            if (touchState1 == "on") {

                rowX = event.touches[0].pageX;
                moveState = touchTab - event.touches[0].pageX;

                var startX = touchX - rowX,

                moveX = startX <= 0 ? 0 : startX >= con_width - box_width ? con_width - box_width : startX;

                touchState2 = "move"; // 이동

                _touchMove(cont, moveX)

                //           console.log("터치중")
                //            console.log(touchTab - event.touches[0].pageX)

            }
        });

        visual.on("touchend", function (e) {

            if (touchState2 == "move" && moveState >= 40) {

                ++cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);
                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);
                    touchState1 = "off";

                }

            } else if (touchState2 == "move" && moveState <= -40) {

                cnt = cnt >= list_length ? 1 : cnt <= -1 ? list_length - 1 : --cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);
                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);
                    touchState1 = "off";

                }

            } else {

                _moveAct(cnt + 1, cont, move_size, 0.5);

            }


            //            console.log("터치끝")
            //            console.log(touchState2, touchState1)

        });

    };

    //터치이벤트 end

    var _init = function (first) {

        if ($('.slider_02').length <= 0) return;

        var $select = {

            visual: $('.main_visual'),
            slider: $('.slider_02'),
            slider_sibling: $('.slider_01, .slider_03'),
            cont: $('.slider_02 .visual_list'),
            list: $('.slider_02 .visual_list li'),
            ind: $('.slider_02 .ind li'),
            tab: $('.btn_brand'),
            tab_sibling: $('.main_visual .tab_category button'),
            cast_link: $('.cast_link'),
            btn_control: $('.slider_02 .ind #brand_control')

        }

        var win_width;

        list_length = $select.list.length;

        $(function () {

            win_width = $(window).width();

            move_size = win_width;

            btn = $select.btn_control;

            _indSet($select.ind, list_length);
            _indOn(0, $select.ind);
            _indAct($select.ind, $select.cont, win_width);
            _sizeSet($select.list, $select.cont, win_width);
            _contSet($select.cont, win_width);
            _cloneAct($select.list, $select.cont);
            _hoverAct($select.cast_link, $select.cont, move_size, $select.ind);
            _tabPlay($select.slider, $select.tab, $select.cont, move_size, $select.ind, $select.slider_sibling, $select.tab_sibling);
            _touchAct($select.cont, $select.cont, $select.list, $select.ind)
            _btnPlay($select.cont, win_width, $select.ind);

            if (first == "start") {
                $select.slider.fadeIn(300);
                $select.tab.addClass('on');
                _autoPlay($select.cont, $select.ind, list_length);

            }
        });

        $(window).on("resize", function () {

            $select = {

                visual: $('.main_visual'),
                slider: $('.slider_02'),
                slider_sibling: $('.slider_01, .slider_03'),
                cont: $('.slider_02 .visual_list'),
                list: $('.slider_02 .visual_list li'),
                ind: $('.slider_02 .ind li'),
                tab: $('.btn_brand'),
                tab_sibling: $('.main_visual .tab_category button'),
                cast_link: $('.cast_link'),
                btn_control: $('.slider_02 .ind #brand_control')

            }

            win_width = $('#wrap').width();

            move_size = win_width;

            _sizeSet($select.list, $select.cont, win_width);
            _clearPlay();
            _indAct($select.ind, $select.cont, win_width);

            _moveAct(cnt + 1, $select.cont, win_width);

        });


    }

    return {

        init: _init,
        play: _autoPlay,
        pause: _clearPlay

    }

})();

GS.mainSlider03 = (function () {

    var cnt = 0,
        interval,
        list_length,
        move_size = 0;

    var btn;

    var autoState = "off"

    //터치이벤트용 변수 start

    var touchTab = 0,
        touchX = 0,
        boxX = 0,
        con_width = 0,
        box_width = 0,
        margin = 0,
        rowX = 0,
        moveState = 0;

    var touchState1 = "on",
        touchState2;

    //터치이벤트용 변수 end

    var _moveAct = function (cnt, cont, size, speed) {

        if (touchState1 == "off") return;

        var move = cnt * size;

        if (cnt >= list_length + 1) { // 슬라이더 length +1

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else if (cnt <= 0) { // 루프시 실행

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    TweenMax.set(cont, { left: -size * list_length });
                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });

        } else {

            TweenMax.to(cont, speed, {
                left: -move, ease: Expo.easeOut, onComplete: function () {

                    setTimeout(function () {

                        touchState1 = "on";

                    }, 500)
                    //console.log(touchState1)

                }
            });
            //console.log(list_length)
            //console.log(cnt)
        }

    };

    var _indSet = function (ind, length) {

        if (length == 1) {

            ind.parent().hide();

        }

    };

    var _indOn = function (cnt, ind) {

        ind.removeClass('on');
        ind.eq(cnt).addClass('on');

    };

    var _indAct = function (ind, cont, size) {

        ind.on("click", function () {

            var idx = $(this).index();

            _indOn(idx, ind)

            cnt = idx;

            _moveAct(idx + 1, cont, size, 4.0);

            if (autoState == "on") _clearPlay();

        })

    };

    var _cloneAct = function (list, indWrap) {

        list.last().clone().prependTo(indWrap);
        list.first().clone().appendTo(indWrap);

    };

    var _sizeSet = function (list, cont, width) {

        list.css('width', width);
        cont.css('width', width * (list_length + 2));

    };

    var _contSet = function (cont, size) {

        TweenMax.set(cont, { left: -size });

    };

    var _autoPlay = function (cont, ind, length) {

        if (autoState == "on") return;

        if (length == 1) return;

        var count = 0;

        btn.removeClass('fa-play-circle');
        btn.addClass('fa-pause-circle');

        var _autoAct = function () {

            count += 1;
            if (count == 240) {

                cnt = cnt >= list_length ? 0 : cnt <= -1 ? list_length - 1 : ++cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 4.0);
                    _indOn(0, ind);

                } else {

                    _moveAct(cnt + 1, cont, move_size, 4.0);
                    _indOn(cnt, ind);

                }

                count = 0;

            };
            interval = window.requestAnimationFrame(_autoAct);
        };

        interval = window.requestAnimationFrame(_autoAct);

        autoState = "on";


    }

    var _clearPlay = function () {

        if (autoState == "off") return;

        window.cancelAnimationFrame(interval);
        btn.removeClass('fa-pause-circle');
        btn.addClass('fa-play-circle');
        autoState = "off";

    };


    var _tabPlay = function (slider, tab, cont, size, ind, visualSibling, tabSibling) {

        tab.on("click", function () {

            GS.mainSlider01.pause();
            GS.mainSlider02.pause();
            visualSibling.fadeOut(300);
            slider.fadeIn(600);
            tabSibling.removeClass('on');
            tab.addClass('on');
            _autoPlay(cont, ind);

        });

    };

    var _btnPlay = function (cont, size, ind) {

        btn.on("click touch", function () {

            if (autoState == "on") {

                _clearPlay();

            } else if (autoState == "off") {

                _autoPlay(cont, ind);

            }

        });

    };

    //터치이벤트 start

    var _touchAct = function (visual, cont, list, ind) {

        if (list.length <= 1) return;

        var _touchMove = function (cont, move_size) {

            TweenMax.to(cont, 0.3, { left: -move_size });

        };

        visual.on("touchstart", function (e) {

            _clearPlay();

            if (cnt >= list_length) cnt = 0;
            if (cnt <= -1) cnt = list_length - 1;

            var wid_width = $(window).width();

            touchTab = event.touches[0].pageX;
            touchX = event.touches[0].pageX - cont.offset().left;
            con_width = cont.width();
            box_width = list.width();
            margin = wid_width - box_width;

            _clearPlay();

            touchState2 = "tab"; // 탭

            //            console.log("터시치작")
            //console.log(touchTab - event.touches[0].pageX)

        });

        visual.on("touchmove", function (e) {

            if (touchState1 == "on") {

                rowX = event.touches[0].pageX;
                moveState = touchTab - event.touches[0].pageX;

                var startX = touchX - rowX,

                moveX = startX <= 0 ? 0 : startX >= con_width - box_width ? con_width - box_width : startX;

                touchState2 = "move"; // 이동

                _touchMove(cont, moveX)

                //console.log("터치중")
                //console.log(touchTab - event.touches[0].pageX)

            }
        });

        visual.on("touchend", function (e) {

            if (touchState2 == "move" && moveState >= 40) {

                ++cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);
                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);
                    touchState1 = "off";

                }

            } else if (touchState2 == "move" && moveState <= -40) {

                cnt = cnt >= 3 ? 1 : cnt <= -1 ? list_length - 1 : --cnt;

                if (cnt >= list_length) { //슬라이더 length

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(0, ind);
                    touchState1 = "off";

                } else {

                    _moveAct(cnt + 1, cont, move_size, 1.5);
                    _indOn(cnt, ind);
                    touchState1 = "off";

                }

            } else {

                _moveAct(cnt + 1, cont, move_size, 0.5);

            }


            //console.log("터치끝")
            //console.log(touchState2, touchState1)

        });

    };

    //터치이벤트 end

    var _init = function (first) {

        if ($('.slider_03').length <= 0) return;

        var $select = {

            visual: $('.main_visual'),
            slider: $('.slider_03'),
            slider_sibling: $('.slider_01, .slider_02'),
            cont: $('.slider_03 .visual_list'),
            list: $('.slider_03 .visual_list li'),
            ind: $('.slider_03 .ind li'),
            tab: $('.btn_search'),
            tab_sibling: $('.main_visual .tab_category button'),
            btn_control: $('.slider_03 .ind #search_control'),
            link: $('.slider_03 a.btn_link')

        }

        var win_width;

        list_length = $select.list.length;

        $(function () {

            win_width = $(window).width();

            move_size = win_width;

            btn = $select.btn_control;

            _indSet($select.ind, list_length);
            _indOn(0, $select.ind);
            _indAct($select.ind, $select.cont, win_width);
            _sizeSet($select.list, $select.cont, win_width);
            _contSet($select.cont, win_width);
            _cloneAct($select.list, $select.cont);
            _tabPlay($select.slider, $select.tab, $select.cont, move_size, $select.ind, $select.slider_sibling, $select.tab_sibling);
            _touchAct($select.cont, $select.cont, $select.list, $select.ind)
            _btnPlay($select.cont, win_width, $select.ind);

            if (first == "start") {
                $select.slider.fadeIn(300);
                $select.tab.addClass('on');
                _autoPlay($select.cont, $select.ind, list_length);

            }

        });

        $(window).on("resize", function () {

            $select = {

                visual: $('.main_visual'),
                slider: $('.slider_03'),
                slider_sibling: $('.slider_01, .slider_02'),
                cont: $('.slider_03 .visual_list'),
                list: $('.slider_03 .visual_list li'),
                ind: $('.slider_03 .ind li'),
                tab: $('.btn_search'),
                tab_sibling: $('.main_visual .tab_category button'),
                btn_control: $('.slider_01 .ind #new_control')

            }

            win_width = $('#wrap').width();

            move_size = win_width;

            _sizeSet($select.list, $select.cont, win_width);
            _clearPlay();
            _indAct($select.ind, $select.cont, win_width);

            _moveAct(cnt + 1, $select.cont, win_width);

        });


    }

    return {

        init: _init,
        play: _autoPlay,
        pause: _clearPlay

    }

})();

GS.visualStart = (function () { //메인비쥬얼 실행 조건문

    var _firstAct = function (first) {
        
        var visual = [GS.mainSlider01, GS.mainSlider02, GS.mainSlider03]

        var $select = {

            tabcont: $('.tab_category')

        }

        //var tabsize = $select.tabcont.find('button').length == 1 ? 0 : $select.tabcont.find('button').length * 80 / 2;
        var tabsize = $select.tabcont.find('button').length * 80 / 2;

        if ($('.btn_new').length > 0 && $('.btn_brand').length > 0 && $('.tab_category > .btn_search').length > 0) {

            var random = function () {

                var random = Math.random();

                if (random > 0 && random <= 0.33) {

                    return 0;

                } else if (random > 0.33 && random <= 0.66) {

                    return 1;

                } else if (random > 0.66 && random <= 1) {

                    return 2;

                };

            };

            var firstNum = random();
            
            for (var i = 0; i <= 2; i++) {            
                
                if (i == firstNum ) {

                    visual[i].init(first);

                } else {

                    visual[i].init();
                
                } 

            }
            
            //GS.mainSlider01.init(first);
            //GS.mainSlider02.init();
            //GS.mainSlider03.init();

            $select.tabcont.css('marginLeft', -tabsize)
            
        } else if ($('.btn_new').length <= 0 && $('.btn_brand').length > 0) {

            var random = function () {
                
                var random = Math.random();

                if (random > 0 && random <= 0.5) {

                    return 1;

                } else if (random > 0.5 && random <= 1) {

                    return 2;

                };

            };

            var firstNum = random();

            for (var i = 0; i <= 2; i++) {

                if (i == firstNum) {

                    visual[i].init(first);

                } else {

                    visual[i].init();

                }

            }

            //GS.mainSlider02.init(first);
            //GS.mainSlider03.init();
            $select.tabcont.css('marginLeft', -tabsize)

        } else if ($('.btn_new').length > 0 && $('.btn_brand').length <= 0) {

            var random = function () {

                var random = Math.random();

                if (random > 0 && random <= 0.5) {

                    return 0;

                } else if (random > 0.5 && random <= 1) {

                    return 2;

                };

            };

            var firstNum = random();

            for (var i = 0; i <= 2; i++) {

                if (i == firstNum) {

                    visual[i].init(first);

                } else {

                    visual[i].init();

                }

            }

            //GS.mainSlider02.init(first);
            //GS.mainSlider03.init();
            $select.tabcont.css('marginLeft', -tabsize)

        } else if ($('.btn_new').length <= 0 && $('.btn_brand').length <= 0 && $('.tab_category > .btn_search').length > 0) {

            GS.mainSlider03.init(first);
            $select.tabcont.css('marginLeft', -tabsize)

        } else {

            return;

        }

    };

    return {

        first: _firstAct

    };

})();

GS.searchBox = (function () { //메인비쥬얼 맞춤단지 관련 스크립트

    var popOn = function (btn, box) {

        btn.on("click", function (e) {

            e.preventDefault();
            box.fadeIn(300);
            $('.search_box').focus();
            $('.btn_search').blur(function () {

                $('.btn_close').focus();

            });
        });

    };

    var popOff = function (btn, box) {

        btn.on("click", function (e) {

            e.preventDefault();
            box.fadeOut(300);

        });

    };

    var _init = function () {

        $select = {

            btn: $('.con_box a.btn_searchpop'),
            close_btn: $('.search_box a.btn_close'),
            box: $('.slider_03 .search_box')

        };

        popOn($select.btn, $select.box);
        popOff($select.close_btn, $select.box);

    };

    return {


        init: _init

    }

})();

GS.xigallery = (function () {

    var cnt = 0, con_width;

    var boxAct = function (box, size) {

        TweenMax.to(box, 1.5, { left: cnt * -size, ease: Circ.easeOut });

        //console.log(size)

    };

    var thisSize = function (cont) {

        con_width = cont.width();

    };

    var btnPrev = function (btn, box, cont, length) {

        btn.on("click", function (e) {

            e.preventDefault();

            cnt = cnt <= 0 ? 0 : --cnt;

            thisSize(cont);
            boxAct(box, con_width);

            //console.log(cnt)

        });

    };

    var btnNext = function (btn, box, cont, length) {

        btn.on("click", function (e) {

            e.preventDefault();

            cnt = cnt >= length ? length : ++cnt;

            thisSize(cont);
            boxAct(box, con_width);

            //console.log(cnt)

        });
    };

    var resizeAct = function (box, cont) {

        thisSize(cont);

        boxAct(box, con_width);

        //console.log(cnt, con_width)

    }

    var _init = function () {

        var $select = {

            wrap: $('.gall_slide_con'),
            cont: $('.gall_slider'),
            box: $('.gall_slider li'),
            btn_prev: $('.nav_btns a.btn_prev'),
            btn_next: $('.nav_btns a.btn_next')

        };

        var boxLength = $select.box.length - 1

        btnPrev($select.btn_prev, $select.cont, $select.wrap, boxLength);
        btnNext($select.btn_next, $select.cont, $select.wrap, boxLength);

        $(window).on("resize", function () {

            if ($(window).width() <= 640) resizeAct($select.cont, $select.wrap);

        });
    }

    return {

        init: _init

    }

})();

GS.mobileLnb = (function () {

    var _reSize = function (cont, conSize, list, listSize, length) {

        if (length > 2) {

            list.width(listSize);
            cont.width(conSize);

        } else {

            list.width("50%");
            cont.width("100%");

        }


    };

    var _scrollAct = function (cont, size, num, length) {

        var moveNum = num <= 1 ? 0 : num == length - 3 ? length - 4 : num >= length - 2 ? length - 3 : num - 1;

        //console.log(num)

        TweenMax.to(cont, 1, { left: -size * moveNum, ease: Power2.easeOut, delay: 0.5 })

    };

    var _touchAct = function (cont, maxSize, length) {

        if (length <= 2) return;

        var startX = 0;

        cont.on("touchstart", function () {

            startX = event.touches[0].pageX - cont.offset().left;

            //console.log("터치스타트", cont.offset().left, startX)

        });

        cont.on("touchmove", function () {

            var calSize = event.touches[0].pageX - startX,
                moveSize = -calSize <= 0 ? 0 : -calSize >= maxSize ? -maxSize : calSize;

            TweenMax.to(cont, 0.3, { left: moveSize })

            //console.log(-moveSize, maxSize)

            //console.log(xSize, moveSize, event.touches[0].pageX + xSize)

            //console.log("터치무브")

        });

        cont.on("touchend", function () {

            //console.log("터치엔드")

        });

    };

    var _gnbSearch = function () {

        var url = location.pathname,
            menu = $('nav ul li > ul > li a'),
            menuLength = menu.length,
            lnb = $('.mobile_lnb');

        var lnbNum;

        //console.log(url, menu, menuLength)

        for (var i = 0; i < menuLength; i++) {

            var menuUrl = menu.eq(i).prop('pathname'),
                dataValue = menu.eq(i).attr('data-lnbtype') || "";

            //console.log(dataValue)

            if (url == menuUrl || dataValue.indexOf(url) != -1) {

                menu.eq(i).parent().addClass('on');
                menu.eq(i).parent().parent().parent().addClass('on');
                menu.eq(i).parent().addClass('on').parent().clone().removeClass('menu_list').appendTo(lnb);

                $(window).on("load resize", function () {
                    var cont = $('.mobile_lnb ul'),
                        list = $('.mobile_lnb ul li'),
                        on_menu = $('.mobile_lnb ul li.on'),
                        on_menuIdx = on_menu.index(),
                        winWidth = $(window).width(),
                        list_length = list.length,
                        listWidth = winWidth / 3,
                        contWidth = listWidth * list_length,
                        maxSize = listWidth * (list_length - 3);


                    if (list_length == 0) $('.mobile_lnb ul').hide();

                    //console.log(list_length)

                    _reSize(cont, contWidth, list, listWidth, list_length)

                    lnbNum = list_length

                    if ($(window).width() >= 640) {
                        
                        if (lnb.css('display') == "block") lnb.hide();
                        if (lnb.find('ul').css('display') == "block") lnb.find('ul').hide();
                        
                    } else {

                        if (lnb.css('display') == "none") lnb.show();
                        if (lnb.find('ul').css('display') == "none") lnb.find('ul').show();
                        _scrollAct(cont, listWidth, on_menuIdx, list_length);
                        _touchAct(cont, maxSize, list_length);

                    }


                });

                break;

            }

        }

    }

    var _init = function () {

        _gnbSearch();

    }

    return {

        init: _init

    }

})();

GS.keydown = (function () {

    var _enter = function (el, btn) {

        el.keydown(function (key) {
            if (key.keyCode == 13) {
                btn.trigger("click");
            }
        })

    };

    var _init = function (el, btn) {

        _enter(el, btn);

    };

    return {

        init: _init

    }

})();

GS.caution = (function () {

    var _keyUp = function (el, caution) {

        el.on("keyup", function () {

            caution.css('visibility', 'visible');

        });

    };

    var _hide = function (caution) {

        caution.css('visibility', 'hidden');

    };

    var _init = function (el, caution) {

        _keyUp(el, caution);
        _hide(caution);

    };

    return {

        init: _init,
        hide: _hide

    }

})();

GS.quickmenu = (function () {

    var _show = function (wrap, cont, top) {

        $(window).on("load resize", function () {

            if (top == 0) cont.show();

            if ($(window).width() <= 1024) {

                cont.hide();

            } else {


                wrap.scroll(function () {

                    var url = (window.location.pathname).replace("http://", "");
                    var uarr = url.split("/");
                    
                    if ($(this).scrollTop() >= top) {
                        if (uarr[2] != "collage") {
                            cont.show();
                        } else {
                            cont.hide();
                        }                                               
                    } else {
                        cont.hide();
                    }

                });

            };

        });

    };

    var _btnAct = function (btn) {

        btn.on("click", function () {

            TweenMax.to($('html, body'), 2.0, { scrollTop: 0, ease: Power2.easeOut })

        });

    };

    var _init = function (wrap, cont, top, btn) {

        _show(wrap, cont, top);
        _btnAct(btn);
        //console.log(btn);
    };

    return {

        init: _init

    }

})();

GS.gatab = (function () {

    var _tabAct = function (tab, con) {

        con.hide();
        con.first().show();

        tab.on("click", function (e) {

            e.preventDefault();

            var idx = $(this).parent().index();

            tab.removeClass('on');
            $(this).addClass('on');

            con.hide();
            con.eq(idx).show();

            //console.log(idx)

        });
    };

    return {

        init: _tabAct

    }

})();

GS.btngo = (function () {

    var _getUrl = function ( el ) {

        el.find('select').change(function () {

            var value = $(this).val();

            el.find('.btn_go').attr('href', value);

            //console.log(value)

        });

        el.find('#family').on("click", function (e) {

            if (el.find('.btn_go').attr('href') == "") {

                e.preventDefault();
                alert("이동할 사이트를 선택 하세요.");

            }

        });

    };

    return {

        geturl: _getUrl

    }

})();

GS.ElResize = (function () {

    var _sizeSet = function (el, ratio) {

        var width = el.width(),
            height = width * ratio;

        el.height(height);

    }

    var _ratioSet = function (img) {

        var width = img.width(),
        height = img.height(),
        ratio = height / width;

        return ratio;

    };

    var AutoRatio = function (el, img) {

        $(function () {
            _sizeSet(el, _ratioSet(img));
        })

        $(window).on('resize', function () {

            _sizeSet(el, _ratioSet(img));

        });
    };

    var init = function (el, ratio) {

        $(function () {
            _sizeSet(el, ratio);
        })

        $(window).on('resize', function () {

            _sizeSet(el, ratio);

        });

    };
    return {

        autoratio: AutoRatio,
        init: init

    }

})();