if (!Array.prototype.includes) {

    Object.defineProperty(Array.prototype, 'includes', {

        value: function (searchElement, fromIndex) {
            // 1. Let O be ? ToObject(this value).

            if (this == null) {

                throw new TypeError('"this" is null or not defined');

            }
            var o = Object(this);
            // 2. Let len be ? ToLength(? Get(O, "length")).

            var len = o.length >>> 0;
            // 3. If len is 0, return false.

            if (len === 0) {

                return false;

            }
            // 4. Let n be ? ToInteger(fromIndex).

            //    (If fromIndex is undefined, this step produces the value 0.)

            var n = fromIndex | 0;
            // 5. If n ≥ 0, then

            //  a. Let k be n.

            // 6. Else n < 0,

            //  a. Let k be len + n.

            //  b. If k < 0, let k be 0.

            var k = Math.max(n >= 0 ? n : len - Math.abs(n), 0);
            // 7. Repeat, while k < len

            while (k < len) {

                // a. Let elementK be the result of ? Get(O, ! ToString(k)).

                // b. If SameValueZero(searchElement, elementK) is true, return true.

                // c. Increase k by 1.

                // NOTE: === provides the correct "SameValueZero" comparison needed here.

                if (o[k] === searchElement) {

                    return true;

                }

                k++;

            }
            // 8. Return false

            return false;

        }

    });

}
if (typeof Object.assign != 'function') {

  Object.assign = function(target) {

    'use strict';

    if (target == null) {

      throw new TypeError('Cannot convert undefined or null to object');

    }
    target = Object(target);

    for (var index = 1; index < arguments.length; index++) {

      var source = arguments[index];

      if (source != null) {

        for (var key in source) {

          if (Object.prototype.hasOwnProperty.call(source, key)) {

            target[key] = source[key];

          }

        }

      }

    }

    return target;

  };

}

(function (d) {

    var c = function c(nodeName) {

        return d.createElement(nodeName);

    };
    var object2styleStr = function object2styleStr(styleObj) {

        return styleObj ? Object.keys(styleObj).map(function (attr) {

            return attr.replace(/[A-Z]/g, function (char) {

                return '-' + char.toLowerCase();

            }) + ': ' + styleObj[attr];

        }).join(';') : '';

    };
    var boxAttr = ['width', 'height', 'left', 'top', 'transform', 'opacity', 'zIndex'];
    var getPages = function (data) {

        var pages = [],

            len = (!data || !data.pages) ? 0 :data.pages.length;

        

        data.order = data.order ? data.order : []
        for (var i = 0; i < data.order.length; i++) {

            var id = data.order[i];

            for (var j = 0; j < len; j++) {

                if (id === data.pages[j].id) {

                    pages[i] = data.pages[j];

                    pages[i].elements = (typeof pages[i].elements == 'string' ? JSON.parse(pages[i].elements) : pages[i].elements).filter(Boolean);

                }

            }

        }
        return pages;

    }
    function analysisSvg() {

        $('xtb-svg').each(function (i, t) {

            var $t = $(t);

            var fill = $(t).data('fill');

            var $elm = $t.parents('.elm');

            $.ajax({

                url: $t.data('src'),

                dataType: 'text',

                success: function success(res) {

                    $elm.html(res);

                    $elm.children('svg').attr('width', '100%').attr('height', '100%').children().css('fill', fill).end().get(0).setAttribute('preserveAspectRatio', 'none');

                }

            });

        });

    }
    var render = function (pages, rootElm, callbacks) {

        var len = pages.length,

            card = c('div'),

            swiperOpt = {

                autoplay: 10000, //可选选项，自动滑动

                direction: 'vertical'

            };
        callbacks = callbacks || {}
        card.setAttribute('class', 'swiper-wrapper');
        for (var i = 0; i < len; i++) {

            var p = c('div'),

                elms = pages[i].elements.filter(Boolean),

                elmsLen = elms.length;
            p.setAttribute('class', 'swiper-slide page');
            for (var j = 0; j < elmsLen; j++) {

                if (!elms[j]) continue;

                var e = c('div'),

                    elmBox = c('div'),

                    boxStyle = {},

                    elmStyle = {},

                    elm = elms[j];
                if ('zIndex' in elm.css) elm.css.zIndex = parseInt(elm.css['zIndex']) + 2;
                if ('zIndex' in elm.css && elm.classes.includes('card-bg')) elm.css.zIndex = 1;                for (var attr in elm.css) {

                    if (boxAttr.includes(attr)) {

                        boxStyle[attr] = elm.css[attr];

                    } else {

                        elmStyle[attr] = elm.css[attr]

                    }

                }
                elmBox.setAttribute('class', 'elm-box');

                elmBox.setAttribute('style', object2styleStr(boxStyle))
                e.setAttribute('class', 'elm ' + elm.classes.join(' '));

                e.innerHTML = elm.content;

                e.setAttribute('style', object2styleStr(elmStyle));
                elmBox.appendChild(e);
                p.appendChild(elmBox);

            }

            card.appendChild(p);

        }

        rootElm.appendChild(card);
        analysisSvg();
        var playAnimation = function (swiper) {
            var index = callbacks.loop ? swiper.activeIndex - 1 : swiper.activeIndex;
            $('.page.swiper-slide-active .elm').each(function (i, e) {

                var process = 0,

                    $e = $(e),

                    page = pages[index] ? pages[index] : null,

                    animations = page && page.elements[i] ? (page.elements[i].animations || []) : [],

                    execAnimation = function () {

                        $e.css('animation', animations[process++]).one('animationend', execAnimation)

                    };
                execAnimation()

            })

        }
        var swiper = new Swiper(rootElm, Object.assign(swiperOpt, callbacks, {

            onSlideChangeStart: function (s) {

                playAnimation(s);

                callbacks.onSlideChangeStart && callbacks.onSlideChangeStart(s);

            },

            onInit: function (s) {

                playAnimation(s);

                callbacks.onInit && callbacks.onInit(s);

            }

        }));
        $('.returnPREV').on('click', function () {

            swiper.slideTo(1)

        })

        .css('top', 15 / (window.innerHeight/486))

        return swiper;

    }

    window.Card = {

        render: render,

        getPages: getPages

    }

})(document)