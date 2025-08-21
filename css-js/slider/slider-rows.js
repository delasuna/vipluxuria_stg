/**
 * Developed by http://frondevo.com
 *
 * Line slider class
 *
 * @class LineSlider
 * @param {Object} parameters
 * @constructor
 *
 */

function SliderRows(parameters) {

    "use strict";

    var Self = this,
        appVersion = navigator.appVersion,
        ie9 = appVersion.indexOf('MSIE 9.0'),
        ie8 = appVersion.indexOf('MSIE 8.0'),
        opera = navigator.appName.indexOf('Opera'),
        isAnimate = false,

    /**
     * Text hover parameters
     *
     * @private
     * @property textParameters
     * @type {Object}
     */
    textParameters = {
        baseParam: 'opacity: 0; "filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";' +
            '-webkit-transition: all 0.3s;' +
            '-moz-transition: all 0.3s;' +
            '-o-transition: all 0.3s;' +
            '-ms-transition: all 0.3s;' +
            'transition: all 0.3s;',
        top: 'margin-top: -10px;',
        left: 'margin-left: -10px;',
        bottom: 'margin-bottom: -10px;',
        right: 'margin-right: -10px;',
        resetParam: '-webkit-transition: all 0.3s;' +
            '-moz-transition: all 0.3s;' +
            '-o-transition: all 0.3s;' +
            '-ms-transition: all 0.3s;' +
            'transition: all 0.3s;' +
            'margin: 0;' +
            'opacity: 1; "filter": "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";'
    },

    /**
     * Item hover parameters
     *
     * @private
     * @property hoverParameters
     * @type {Object}
     */
    hoverParameters = {
        baseParam: '-webkit-transition: -webkit-transform 0.3s;' +
            '-moz-transition: -moz-transform 0.3s;' +
            '-o-transition: -o-transform 0.3s;' +
            '-ms-transition: -ms-transform 0.3s;' +
            'transition: transform 0.3s;',
        zoom: '-webkit-transform: scale(1.3);' +
            '-moz-transform: scale(1.3);' +
            '-o-transform: scale(1.3);' +
            '-ms-transform: scale(1.3);' +
            'transform: scale(1.3);',
        rotate: '-webkit-transform: scale(1.2) rotate(10deg);' +
            '-moz-transform: scale(1.2) rotate(10deg);' +
            '-o-transform: scale(1.2) rotate(10deg);' +
            '-ms-transform: scale(1.2) rotate(10deg);' +
            'transform: scale(1.2) rotate(10deg);'
    },

    /**
     * Parameters clicking on the item
     *
     * @private
     * @property clickParameters
     * @type {Object}
     */
    clickParameters = {
        baseParam: '-webkit-transition: -webkit-transform 0.2s;' +
            '-moz-transition: -moz-transform 0.2s;' +
            '-o-transition: -o-transform 0.2s;' +
            '-ms-transition: -ms-transform 0.2s;' +
            'transition: transform 0.2s;',
        zoom: '-webkit-transform: scale(0.9);' +
            '-moz-transform: scale(0.9);' +
            '-o-transform: scale(0.9);' +
            '-ms-transform: scale(0.9);' +
            'transform: scale(0.9);',
        rotate: '-webkit-transform: scale(1.2) rotate(10deg);' +
            '-moz-transform: scale(1.2) rotate(10deg);' +
            '-o-transform: scale(1.2) rotate(10deg);' +
            '-ms-transform: scale(1.2) rotate(10deg);' +
            'transform: scale(1.2) rotate(10deg);'
    },

    /**
     * Base css properties
     *
     * @private
     * @property baseCss
     * @type {String}
     */
    baseCss = '-webkit-transition: -webkit-transform 0.2s;' +
        '-moz-transition: -moz-transform 0.2s;' +
        '-o-transition: -o-transform 0.2s;' +
        '-ms-transition: -ms-transform 0.2s;' +
        'transition: transform 0.2s;',

    /**
     * Zoom css properties
     *
     * @private
     * @property cssZoom
     * @type {String}
     */
    cssZoom = baseCss + '-webkit-transform: scale(0.6);' +
        '-moz-transform: scale(0.6);' +
        '-o-transform: scale(0.6);' +
        '-ms-transform: scale(0.6);' +
        'transform: scale(0.6);',

    /**
     * Skew 1 css properties
     *
     * @private
     * @property cssSkewRight
     * @type {String}
     */
    cssSkewRight = baseCss + '-webkit-transform: skew(10deg);' +
        '-moz-transform: skew(10deg); ' +
        '-o-transform: skew(10deg); ' +
        '-ms-transform: skew(10deg); ' +
        'transform: skew(10deg);',

    /**
     * Skew 2 css properties
     *
     * @private
     * @property cssSkewLeft
     * @type {String}
     */
    cssSkewLeft = baseCss + '-webkit-transform: skew(-10deg);' +
        '-moz-transform: skew(-10deg);' +
        '-o-transform: skew(-10deg);' +
        '-ms-transform: skew(-10deg);' +
        'transform: skew(-10deg);',

    /**
     * Reset css item properties
     *
     * @private
     * @property cssReset
     * @type {String}
     */
    cssReset = baseCss + '-webkit-transform: none; ' +
        '-moz-transform: none;' +
        '-o-transform: none;' +
        '-ms-transform: scale(1deg) skew(0deg); rotate(0deg)' +
        'transform: none; ',

    /**
     * Add event to listener
     *
     * @private
     * @method addEvent
     * @param {Object} obj Event object
     * @param {String} type Event type
     * @param {Function} handler Event handler
     */
    addEvent = function(obj, type, handler) {

        if (window.addEventListener) {

            addEvent = function(obj, type, handler) {
                obj.addEventListener(type, handler, false);
            };

        }
        else {
            addEvent = function(obj, type, handler) {
                obj.attachEvent('on' + type, handler);
            };
        }

        addEvent(obj, type, handler);

    },

    /**
     * Clicking on the left button of the slider
     *
     * @private
     * @method sliderLeftClick
     */
    sliderLeftClick = function() {
        if (isAnimate) {
            return;
        }

        isAnimate = true;
        Self.move('left');
    },

    /**
     * Clicking on the right button of the slider
     *
     * @private
     * @method sliderRightClick
     */
    sliderRightClick = function() {
        if (isAnimate) {
            return;
        }

        isAnimate = true;
        Self.move('right');
    },

    /**
     * Mouse enter on the slider
     *
     * @private
     * @method sliderMouseEnter
     */
    sliderMouseEnter = function() {
        var parameters = Self.parameters,
            hoverStyle = parameters.hover;

        var elementLiStyle = getObjStyle(this);

        if (!elementLiStyle) {
            return;
        }

        this.style.cssText =  'position: relative; overflow: hidden; width: ' +
            elementLiStyle.width + '; height: ' +
            elementLiStyle.height + ';';

        var currentElement = this.firstElementChild;

        currentElement.style.cssText = hoverParameters.baseParam;

        switch (hoverStyle) {
            case 'rotate':

                setTimeout(function() {
                    if (ie9 == -1) {
                        currentElement.style.cssText += hoverParameters.rotate;
                    }
                    else {
                        transitionAnimate(currentElement, hoverParameters.baseParam + hoverParameters.rotate, true);
                    }
                }, 0);

                break;

            case 'zoom':
                setTimeout(function() {
                    if (ie9 == -1) {
                        currentElement.style.cssText += hoverParameters.zoom;
                    }
                    else {
                        transitionAnimate(currentElement, hoverParameters.baseParam + hoverParameters.zoom, true);
                    }

                }, 0);
                break;
        }

        if (parameters.text !== 'none') {

            if (parameters.text.selector) {
                var text = this.querySelector(parameters.text.selector);
                if (ie9 === -1) {
                    text.style.cssText = textParameters.resetParam;
                }
                else {
                    cssAnimate(text, {
                        'opacity': 1,
                        'margin-bottom': 0,
                        'margin-top': 0,
                        'margin-left': 0,
                        'margin-right': 0
                    }, 300);
                }
            }

        }
    },

    /**
     * Mouse leave from the slider
     *
     * @private
     * @method sliderMouseLeave
     */
    sliderMouseLeave = function() {

        var parameters = Self.parameters,
            hoverStyle = Self.parameters.hover,
            elementLiStyle = getObjStyle(this);

        if (!elementLiStyle) {
            return;
        }

        this.style.cssText =  'position: relative; overflow: hidden; width: ' +
            elementLiStyle.width + '; height: ' +
            elementLiStyle.height + ';';

        var currentElement = this.firstElementChild;

        switch (hoverStyle) {
            case 'rotate':
                setTimeout(function() {
                    if (ie9 == -1) {
                        currentElement.style.cssText = cssReset;
                    }
                    else {
                        transitionAnimate(currentElement, cssReset, true);
                    }
                }, 0);

                break;

            case 'zoom':
                setTimeout(function() {
                    if (ie9 == -1) {
                        currentElement.style.cssText = cssReset;
                    }
                    else {
                        transitionAnimate(currentElement, cssReset, true);
                    }
                }, 0);
                break;
        }

        if (parameters.text !== 'none') {

            if (parameters.text.selector) {
                var text = this.querySelector(parameters.text.selector);

                if (Self.parameters.text.direction) {

                    if (ie9 === -1) {
                        text.style.cssText = textParameters.baseParam;
                    }

                    switch (Self.parameters.text.direction) {

                        case 'top':

                            if (ie9 === -1) {
                                text.style.cssText += textParameters.top;
                            }
                            else {
                                cssAnimate(text, {
                                    'opacity': 0,
                                    'margin-top': '-10px'
                                }, 300);
                            }
                            break;

                        case 'left':

                            if (ie9 === -1) {
                                text.style.cssText += textParameters.left;
                            }
                            else {
                                cssAnimate(text, {
                                    'opacity': 0,
                                    'margin-left': '-10px'
                                }, 300);
                            }

                            break;

                        case 'right':

                            if (ie9 === -1) {
                                text.style.cssText += textParameters.right;
                            }
                            else {
                                cssAnimate(text, {
                                    'opacity': 0,
                                    'margin-right': '-10px'
                                }, 300);
                            }

                            break;

                        case 'bottom':

                            if (ie9 === -1) {
                                text.style.cssText += textParameters.bottom;
                            }
                            else {
                                cssAnimate(text, {
                                    'opacity': 0,
                                    'margin-bottom': '-10px'
                                }, 300);
                            }

                            break;

                    }
                }
            }

        }
    },

    /**
     * Mouse down on the slider item
     *
     * @private
     * @method sliderMouseDown
     */
    sliderMouseDown = function() {

        var elementLiStyle = getObjStyle(this);

        if (!elementLiStyle) {
            return;
        }

        this.style.cssText =  'position: relative; overflow: hidden; width: ' +
            elementLiStyle.width + '; height: ' +
            elementLiStyle.height + ';';


        var clickStyle = Self.parameters.click,
            currentElement = this.firstElementChild;


        switch (clickStyle) {
            case 'zoom':

                setTimeout(function() {
                    if (ie9 == -1) {
                        currentElement.style.cssText = clickParameters.baseParam + clickParameters.zoom;
                        setTimeout(function() {
                            currentElement.style.cssText = clickParameters.baseParam;
                        }, 300);
                    }
                    else {
                        transitionAnimate(currentElement, clickParameters.baseParam + clickParameters.zoom, true);
                        setTimeout(function() {
                            transitionAnimate(currentElement, cssReset);
                        }, 300);
                    }
                }, 0);


                break;

        }
    },

    /**
     * emulation transition properties for ie9
     *
     * @private
     * @method transitionAnimate
     */
    transitionAnimate = function(objects, styleTransition, bool) {

        var duration = styleTransition.substr(styleTransition.indexOf('transition: transform') - 20),
            skew = styleTransition.indexOf('skew('),
            rotate = styleTransition.indexOf('rotate('),
            scale = styleTransition.indexOf('scale('),
            parameters = [],
            startTransition,
            transitionAnimateTimeOut,
            currentStyle;

        function renderTransition() {

            var now = new Date().getTime(),
                progressTransition = (now - startTransition) / duration,
                transformString = '';

            if (!objects.isAnimate) {
                cancelRequestAnimationFrame(transitionAnimateTimeOut);
                return;
            }

            for (var i = 0, length = parameters.length; i < length; i++) {

                var startPos = parameters[i].valueEnd,
                    endPos = parameters[i].valueStart,
                    x;

                x = (startPos - endPos) * progressTransition + endPos;

                var currentParam = parameters[i].effect;

                if (currentParam === 'scale') {
                    transformString += ' scale(' + x + ')';
                }

                if (currentParam === 'skew') {
                    transformString += ' skew(' + x + 'deg)';
                }

                if (currentParam === 'rotate') {
                    transformString += ' rotate(' + x + 'deg)';
                }

            }

            objects.style.msTransform = transformString;

            if (progressTransition < 1) {
                transitionAnimateTimeOut = requestAnimationFrame(renderTransition)
            }

            else {
                objects.isAnimate = false;
                cancelRequestAnimationFrame(transitionAnimateTimeOut);
                if (!bool) {
                    transitionAnimate(objects, cssReset, true);
                }
            }
        }

        objects.isAnimate = false;

        duration = duration.substr(1, duration.indexOf(';') - 2);
        duration = duration.substr(duration.indexOf(' ')) * 1000;
        currentStyle = objects.style.cssText;

        if (skew > -1) {

            var currentSkew = currentStyle.indexOf('skew(');

            if (currentSkew > -1) {
                currentSkew = parseFloat(currentStyle.substr(currentSkew + 5, currentStyle.substr(currentSkew + 5)
                    .indexOf('deg)')));
            }
            else {
                currentSkew = 0;
            }

            parameters.push({
                effect: 'skew',
                valueStart: currentSkew,
                valueEnd: parseFloat(styleTransition.substr(skew + 5,
                    styleTransition.substr(skew + 5).indexOf('deg)')))
            });

        }

        if (scale > -1) {

            var currentScale = currentStyle.indexOf('scale(');

            if (currentScale > -1) {
                currentScale = parseFloat(currentStyle.substr(currentScale + 6,
                    currentStyle.substr(currentScale + 6).indexOf(')')));
            }
            else {
                currentScale = 1;
            }

            parameters.push({
                effect: 'scale',
                valueStart: currentScale,
                valueEnd: parseFloat(styleTransition.substr(scale + 6,
                    styleTransition.substr(scale + 6).indexOf(')')))
            });
        }

        if (rotate > -1) {

            var currentRotate = currentStyle.indexOf('rotate(');

            if (currentRotate > -1) {
                currentRotate = parseFloat(currentStyle.substr(currentRotate + 7,
                    currentStyle.substr(currentRotate + 7).indexOf(')')));
            }
            else {
                currentRotate = 0;
            }

            parameters.push({
                effect: 'rotate',
                valueStart: currentRotate,
                valueEnd: parseFloat(styleTransition.substr(rotate + 7,
                    styleTransition.substr(rotate + 7).indexOf(')')))
            });
        }

        startTransition = new Date().getTime();
        setTimeout(function() {
            objects.isAnimate = true;
            renderTransition();
        }, 20);
    },

    /**
     * css animate
     *
     * @private
     * @method cssAnimate
     */
    cssAnimate = function(obj, css, duration, callback) {

        var animateId,
            start,
            cssProperties;

        function delta(param){
            return param;
        }

        function render() {
            var now = new Date().getTime(),
                progress = (now - start) / duration,
                progressValue,
                cssText = obj.style.cssText;

            if (!obj.isAnimate) {
                cancelRequestAnimationFrame(animateId);
                return;
            }

            for (var i = 0, length = cssProperties.length; i < length; i++) {

                if (cssProperties[i].from === 'auto') {
                    cssProperties[i].from = 0;
                }

                var to = parseFloat(cssProperties[i].to),
                    from = parseFloat(cssProperties[i].from);

                progressValue = (to - from) * delta(progress) + from;

                var px = '; ';

                if (cssProperties[i].to.toString().indexOf('px') > -1 || cssProperties[i].from.toString().indexOf('px') > -1) {
                    px = 'px; ';
                }

                cssText += cssProperties[i].name + ': ' + progressValue + px;
            }

            obj.style.cssText = cssText;

            if (progress < 1) {
                animateId = requestAnimationFrame(render);
            }
            else {
                cancelRequestAnimationFrame(animateId);

                if (callback) {
                    callback();
                }
            }
        }

        function getAnimateParameter(param) {
            var properties = [],
                objStyle = getObjStyle(obj);

            for (var p in param) {

                var prop = objStyle[p.toString()];

                if (!prop) {
                    prop = obj.style[p.toString()];
                }

                properties.push(JSON.parse('{"name": "' + p.toString() + '", "from": "' + prop + '", "to": "' + param[p] + '"}'));
            }

            return properties;
        }

        obj.isAnimate = false;

        cssProperties = getAnimateParameter(css);
        start = new Date().getTime();

        setTimeout(function() {
            obj.isAnimate = true;
            render();
        }, 10);

    },

    /**
     * Сhange a color picture to gray
     *
     * @private
     * @method grayScaleImg
     */
    grayScaleImg = function(inputImage) {
        cssAnimate(inputImage[0], {opacity: 0}, 300, function() {
            cssAnimate(inputImage[0], {opacity: 1}, 300);
        });
    },

    /**
     * change the zoom of the element
     *
     * @private
     * @method zoomElement
     */
    zoomElement = function(zoomElements) {
        var start = new Date().getTime(),
            hBaner = zoomElements[0].clientHeight,
            wBaner = zoomElements[0].clientWidth;

            (function renderZoom() {
                var now = (new Date().getTime()) - start,
                    progress = (now / 400 > 1) ? 1 : now / 400,
                    unProgress = 1 - progress,
                    currentStyle;

                    if (progress < 0.5) {
                        currentStyle = 'position: absolute; width: ' + parseFloat(wBaner * unProgress) + 'px; height: ' + parseFloat(hBaner * unProgress) + 'px; ' +
                            'top: ' + parseFloat((hBaner - (hBaner * unProgress)) / 2) + 'px; left: ' + parseFloat((wBaner - (wBaner * unProgress)) / 2) + 'px;';

                        zoomElements[0].style.cssText = currentStyle;

                        requestAnimationFrame(renderZoom);
                    }
                    else if (progress < 1) {
                        currentStyle = 'position: absolute; width: ' + parseFloat(wBaner * progress) + 'px; height: ' + parseFloat(hBaner * progress) + 'px; ' +
                            'top: ' + parseFloat((hBaner - (hBaner * progress)) / 2) + 'px; left: ' + parseFloat((wBaner - (wBaner * progress)) / 2) + 'px;';

                        zoomElements[0].style.cssText = currentStyle;

                        requestAnimationFrame(renderZoom);
                    }
                    else {
                        zoomElements[0].style.cssText = '';
                    }
            })();
    },

    /**
     * Processing animated slide
     *
     * @private
     * @method animate
     * @param {Object} param Animated CSS properties
     */
    animate = function(param) {

        var start,
            animateId,
            animateObj,
            style,
            objLength,
            direction,
            currentElement;

        function delta(value) {
            return Math.pow(value, 2);
        }

        function stopAnimate() {

            for (var i = objLength - 1; i >= 0 ; i--) {
                var li = animateObj[i].getElementsByTagName('li');


                for (var j = li.length - 1; j >= 0; j--) {

                    if (ie9 === -1) {
                        li[j].style.cssText = cssReset;
                    }

                }

            }

            if (param.callback) {
                param.callback();
            }

        }

        function render() {

            var now = new Date().getTime(),
                progress = (now - start) / param.duration;

            for (var i = 0; i < objLength; i++) {

                var leftPos = style[i].leftPos,
                    lastPos = style[i].lastPos,
                    x = (leftPos - lastPos) * delta(progress) + lastPos;

                if (leftPos === lastPos) {
                    continue;
                }

                if (direction > 0 && x > leftPos) {
                    x = leftPos;
                }

                if (direction < 0 && x < leftPos) {
                    x = leftPos;
                }

                if (animateObj[i].clientWidth < Self.controls.containerWrap.clientWidth) {
                    continue;
                }

                if (ie9 === -1 && ie8 === -1 && opera === -1) {
                    animateObj[i].style.webkitTransform = 'translateX(' + x + 'px)';
                    animateObj[i].style.oTransform = 'translateX(' + x + 'px)';
                    animateObj[i].style.transform = 'translateX(' + x + 'px)';
                }
                else {
                    animateObj[i].style.left = x + 'px';
                }
            }

            if (progress < 1) {
                animateId = requestAnimationFrame(render)
            }
            else {
                isAnimate = false;
                cancelRequestAnimationFrame(animateId);
                stopAnimate();
            }
        }

        start = new Date().getTime();
        animateObj = param.obj;
        objLength = animateObj.length;
        style = param.style;
        direction = param.direction;

        var currentCss = '';

        switch (Self.parameters.effect) {

            case 'zoom':
            case 'zoomGrayScale':
                currentCss = cssZoom;
                break;
            case 'skew':

                if(direction > 0) {
                    currentCss = cssSkewLeft;
                }
                else {
                    currentCss = cssSkewRight;
                }

                break;

            default:
                currentCss = '';
                break;
        }

        for (var i = objLength - 1; i >= 0 ; i--) {
            var li = animateObj[i].getElementsByTagName('li');

            if (animateObj[i].clientWidth < Self.controls.containerWrap.clientWidth) {
                continue;
            }

            if (style[i].leftPos !== style[i].lastPos) {

                for (var j = li.length - 1; j >= 0; j--) {

                    if (ie9 > -1 || ie8 > -1) {
                        if (Self.parameters.effect === 'zoom' || Self.parameters.effect === 'zoomGrayScale') {
                            currentElement = li[j].querySelectorAll('img');
                            zoomElement(currentElement);
                        }
                        else if (Self.parameters.effect === 'grayScale' || Self.parameters.effect === 'fade') {
                            currentElement = li[j].querySelectorAll('img');
                            if (ie8 === -1) {
                                grayScaleImg(currentElement);
                            }
                            else {
                                zoomElement(currentElement);
                            }
                        }
                        else {
                            transitionAnimate(li[j], currentCss);
                        }
                    }
                    else {

                        if (Self.parameters.effect === 'zoom' || Self.parameters.effect === 'zoomGrayScale') {
                            currentElement = li[j].querySelectorAll('img');
                            zoomElement(currentElement);
                        }
                        else if (Self.parameters.effect === 'grayScale' || Self.parameters.effect === 'fade') {
                            currentElement = li[j].querySelectorAll('img');
                            grayScaleImg(currentElement);
                        }
                        else {
                            li[j].style.cssText = currentCss;
                        }

                    }

                }

            }

        }

        render();
    },

    /**
     * Get computed obj style
     *
     * @private
     * @method getObjStyle
     * @param {Object} obj DOM element
     */
    getObjStyle = function(obj) {

        if (window.getComputedStyle) {
            getObjStyle = function(obj) {
                return window.getComputedStyle(obj, null);
            }
        }
        else {

            getObjStyle = function(obj) {
                return obj.currentStyle;
            }
        }

        return getObjStyle(obj);
    },

    /**
     * preload of image
     *
     * @private
     * @method preloadImages
     * @param arr references on image
     */
    preloadImages = function(arr) {

        var Arr = (typeof arr !== "object") ? [arr] : arr,
            newimages = [],
            loadedimages = 0,
            postaction = function() {};

        function imageloadpost(){
            loadedimages++;
            if (loadedimages === Arr.length){
                postaction();
            }
        }

        var loadPost = function() {
            imageloadpost();
        };

        for (var i=0; i < Arr.length; i++){
            newimages[i] = new Image();
            newimages[i].src = Arr[i];

            if (newimages[i].complete) {
                setTimeout(function() {
                    imageloadpost();
                }, 0);
            }
            else {
                newimages[i].onload = loadPost;
            }

            newimages[i].onerror = loadPost;
        }

        return {
            done: function(f){
                postaction = f || postaction; //remember user defined callback functions to be called when images load
            }
        };
    },

    /**
     * Set slider styles
     *
     * @private
     * @method getNewParameters
     * @param {Object} sliderLines Reference to DOM elements
     * @param {Function} callback Callback function, run after set style to slider element
     */
    setStyle = function(sliderLines, callback) {

        function setItemsStyle() {

            var parameters = Self.parameters,
                effect = parameters.effect,
                ctrl = Self.controls,
                firstElement,
                containerPadding = getObjStyle(parameters.container),
                containerWorkPlaceWidth = parameters.container.clientWidth -
                    parseInt(containerPadding.paddingLeft, 10) -
                    parseInt(containerPadding.paddingRight, 10);

            if (parameters.adaptive) {

                if (sliderLines && sliderLines.length) {
                    firstElement = sliderLines[0].querySelector('li');
                }

                if (firstElement) {
                    parameters.visible = Math.floor(containerWorkPlaceWidth / firstElement.offsetWidth);
                }
            }

            // get item width and count element in lines
            for (i = 0, lineLength = sliderLines.length; i < lineLength; i++) {

                li = sliderLines[i].querySelectorAll('li');

                elementStyle = getObjStyle(li[0]);

                lengthGray = li.length;

                if (effect === 'zoomGrayScale' || effect === 'grayScale') {
                    for (grayIndex = 0; grayIndex < lengthGray; grayIndex++) {
                        currentImg = li[grayIndex].querySelector('img');

                        if (ie8 === -1) {
                            grayImg = grayScale(currentImg);
                            currentImg.parentNode.appendChild(grayImg);
                        }
                    }
                }

                //return;
                if (i === lineLength - 1) {
                    marginHeight = 0;
                }
                else {
                    marginHeight = parseInt(elementStyle.marginTop, 10) + parseInt(elementStyle.marginBottom, 10);
                }

                marginWidth = parseInt(elementStyle.marginLeft, 10) + parseInt(elementStyle.marginRight, 10);

                baseStyle.push({
                    itemHeight: li[0].offsetHeight + marginHeight,
                    itemWidth: li[0].offsetWidth + marginWidth,
                    itemCount: li.length,
                    leftPos: 0
                });

                currentStyle = baseStyle[i];

                sliderLines[i].style.cssText = 'width: ' + currentStyle.itemWidth * (currentStyle.itemCount + 1) + 'px; ' +
                    'height: ' + currentStyle.itemHeight + 'px; position: absolute; display: table; left: 0; top: ' + containerHeight + 'px';

                containerHeight += currentStyle.itemHeight;

                containerWidth = currentStyle.itemWidth;

                for (var j = 0, length = li.length; j < length; j++) {

                    var elementLiStyle = getObjStyle(li[j], {
                        width: 0,
                        height: 0
                    });

                    li[j].style.cssText =  'position: relative; overflow: hidden; width: ' +
                        elementLiStyle.width + '; height: ' +
                        elementLiStyle.height + ';';
                }

                ctrl.containerWrap.appendChild(sliderLines[i].cloneNode(true));
                sliderLines[i].style.display = 'none';
                countLine++;

            }

            while (sliderLines.length) {
                parameters.container.removeChild(sliderLines[0]);
            }

            var innerBlockWidth = parseFloat((parameters.visible * containerWidth) - marginWidth);

            ctrl.containerWrap.style.cssText = 'position: relative; overflow: hidden; ' +
                'height: ' + containerHeight + 'px; width: ' + innerBlockWidth + 'px; font-size: 0;' +
                'letter-spacing: -1px;';

            if (parameters.adaptive) {
                ctrl.containerWrap.style.cssText += 'margin-left: ' +
                    parseFloat((containerWorkPlaceWidth - innerBlockWidth) / 2) + 'px';
            }

            parameters.container.appendChild(ctrl.containerWrap);

            ctrl.sliderLines = ctrl.containerWrap.getElementsByTagName('ul');

            callback();
        }

        var ctrl = Self.controls,
            baseStyle = Self.baseStyle,
            i,
            li,
            currentStyle,
            containerHeight = 0,
            parameters = Self.parameters,
            containerWidth,
            lineLength,
            countLine = 0,
            elementStyle,
            marginWidth,
            marginHeight,
            grayImg,
            currentImg,
            imageArray = [];

        for (i = 0, lineLength = sliderLines.length; i < lineLength; i++) {

            li = sliderLines[i].querySelectorAll('li');

            for (var grayIndex = 0, lengthGray = li.length; grayIndex < lengthGray; grayIndex++) {
                currentImg = li[grayIndex].querySelector('img');
                imageArray.push(currentImg.src);
            }

        }

        if (parameters.effect === 'grayScale' && ie8 === -1) {
            preloadImages(imageArray).done(setItemsStyle);
        }
        else {
            setItemsStyle();
        }

    },

    /**
     * Get input parameters
     *
     * @method getNewParameters
     */
    getNewParameters = function() {

        if (parameters) {

            if (parameters.container) {
                Self.parameters.container = parameters.container;
            }
            else {
                return false;
            }

            if (parameters.visible) {
                Self.parameters.visible = parameters.visible;
            }

            if (parameters.effect) {
                Self.parameters.effect = parameters.effect;
            }

            if (parameters.hover) {
                Self.parameters.hover = parameters.hover;
            }

            if (parameters.click) {
                Self.parameters.click = parameters.click;
            }

            if (parameters.text) {
                Self.parameters.text = parameters.text;
            }

            if (parameters.adaptive) {
                Self.parameters.adaptive = parameters.adaptive;
            }

            if (parameters.auto) {
                Self.parameters.auto = parameters.auto;
            }

            if (parameters.delay) {
                Self.parameters.delay = parameters.delay;
            }

        }

        return true;
    },

    /**
     * Remove class from element
     *
     * @private
     * @method removeClass
     * @param {Object} obj DOM element
     * @param {String} className Class name
     */
    removeClass = function(obj, className) {

        while (obj.className.indexOf(className) > -1) {
            obj.className = obj.className.replace(className, '');
        }
    },

    /**
     * Set hover effect
     *
     * @private
     * @method setHover
     * @param {Object} obj Slider element
     */
    setHover = function(obj) {

        if (Self.parameters.hover !== 'none') {

            for (var i = 0, objLength = obj.length; i < objLength; i++) {

                var li = obj[i].querySelectorAll('li');

                for (var j = 0, liLength = li.length; j < liLength; j++) {

                    var el = document.createElement('div'),
                        objType;

                    el.setAttribute('onmouseenter', 'return;');
                    objType = typeof el.onmouseenter;

                    if (objType === 'function') {
                        addEvent(li[j], 'mouseenter', sliderMouseEnter);
                        addEvent(li[j], 'mouseleave', sliderMouseLeave);
                    }
                    else {
                        li[j].onmouseover = sliderMouseEnter;
                        li[j].onmouseout = sliderMouseLeave;
                    }
                }

            }

        }

    },

    /**
     * Set click effect
     *
     * @private
     * @method setHover
     * @param {Object} obj Slider element
     */
    setClick = function(obj) {

        if (Self.parameters.click !== 'none') {

            for (var i = 0, objLength = obj.length; i < objLength; i++) {

                var li = obj[i].querySelectorAll('li');
                for (var j = 0, liLength = li.length; j < liLength; j++) {
                    addEvent(li[j], 'mousedown', sliderMouseDown);
                }

            }

        }

    },

    /**
     * set text effect
     *
     * @private
     * @method setText
     * @param {Object} obj Slider element
     */
    setText = function(obj) {

        if (Self.parameters.text === 'none') {
            return;
        }

        for (var i = 0, length = obj.length; i < length; i++) {
            var textArray = obj[i].querySelectorAll(Self.parameters.text.selector);

            for (var j = 0, lengthTextArray = textArray.length; j < lengthTextArray; j++) {
                textArray[j].style.cssText = textParameters.baseParam;

                if (Self.parameters.text.direction) {

                    switch (Self.parameters.text.direction) {

                        case 'top': textArray[j].style.cssText += textParameters.top;
                            break;

                        case 'left': textArray[j].style.cssText += textParameters.left;
                            break;

                        case 'right': textArray[j].style.cssText += textParameters.right;
                            break;

                        case 'bottom': textArray[j].style.cssText += textParameters.bottom;
                            break;

                    }

                }
            }

        }

    },

    /**
     * get gray scale image
     *
     * @private
     * @method grayScale
     * @param {Object} inputImage Slider image element
     */
    grayScale = function(inputImage){
        var canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d'),
            imgObj = new Image(),
            newImg = new Image();

        imgObj.src = inputImage.src;
        canvas.width = inputImage.getAttribute('width');
        canvas.height = inputImage.getAttribute('height');
        ctx.drawImage(imgObj, 0, 0, canvas.width, canvas.height);

        var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
        for(var y = 0; y < imgPixels.height; y++){
            for(var x = 0; x < imgPixels.width; x++){
                var i = (y * 4) * imgPixels.width + x * 4;
                var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
                imgPixels.data[i] = avg;
                imgPixels.data[i + 1] = avg;
                imgPixels.data[i + 2] = avg;
            }
        }

        ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
        newImg.src = canvas.toDataURL();
        newImg.setAttribute('width', canvas.width);
        newImg.setAttribute('height', canvas.height);
        newImg.style.cssText = "position: absolute; top: 0; left: 0; z-index: -1";

        return newImg;
    },

    resizeWindow = function() {

        var parameters = Self.parameters,
            ctrl = Self.controls,
            containerWrapStyle = ctrl.containerWrap.style,
            lengthSliderLines;

        if (parameters.adaptive) {
            var containerPadding = getObjStyle(parameters.container),
                containerWorkPlaceWidth = parameters.container.clientWidth -
                    parseInt(containerPadding.paddingLeft, 10) -
                    parseInt(containerPadding.paddingRight, 10),

                firstElement,
                firstElementStyle,
                sliderLines = ctrl.sliderLines,
                innerBlockWidth,
                marginWidth;

            if (sliderLines && sliderLines.length) {
                firstElement = sliderLines[0].querySelector('li');
                firstElementStyle = getObjStyle(firstElement);
            }

            if (firstElement) {
                parameters.visible = Math.floor(containerWorkPlaceWidth / firstElement.offsetWidth);
            }

            marginWidth = parseInt(firstElementStyle.marginLeft, 10) + parseInt(firstElementStyle.marginRight, 10);
            innerBlockWidth = parseFloat((parameters.visible * (firstElement.offsetWidth + marginWidth)) - marginWidth);
            containerWrapStyle.width = innerBlockWidth + 'px';
            containerWrapStyle.marginLeft = (containerWorkPlaceWidth - innerBlockWidth) / 2 + 'px';

            lengthSliderLines = sliderLines.length;
            for (var i = 0; i < lengthSliderLines; i++) {
                if (ie9 === -1 && ie8 === -1 && opera === -1) {
                    sliderLines[i].style.webkitTransform = 'translateX(0px)';
                    sliderLines[i].style.oTransform = 'translateX(0px)';
                    sliderLines[i].style.transform = 'translateX(0px)';
                }
                else {
                    sliderLines[i].style.left = 0;
                }

                Self.baseStyle[i].leftPos = 0;
            }

            ctrl.leftButton.className += ' rows-slider__controls_disabled';
            removeClass(ctrl.rightButton, 'rows-slider__controls_disabled');

        }
    };

    /**
     * Slider parameters
     *
     * @property parameters
     * @type {Object}
     */
    this.parameters = {
        container: null,
        adaptive: false,
        visible: 4,
        ease: 'linear',
        effect: 'none',
        hover: 'none',
        click: 'none',
        text: 'none',
        scroll: false,
        delay: 1000,
        autoDelay: 0
    };

    /**
     * Slider controls
     *
     * @property controls
     * @type {Object}
     */
    this.controls = {};

    /**
     * Slider base style
     *
     * @property baseStyle
     * @type {Object}
     */
    this.baseStyle = [];

    /**
     * Move slider rows
     *
     * @method move
     * @public
     * @param {String} direction Slider direction
     */
    this.move = function(direction) {

        var i, ctrl = this.controls,
            baseStyle = this.baseStyle,
            lines = ctrl.sliderLines,
            rightButton = ctrl.rightButton,
            leftButton = ctrl.leftButton,
            lineLength,
            factor,
            countItemMove,
            isDisable = false,
            rightButtonDisable = [],
            leftButtonDisable = [];

        if (direction === 'left') {
            factor = 1;
        }
        else {
            factor = -1;
        }

        countItemMove = this.parameters.visible;

        for (i = 0, lineLength = baseStyle.length; i < lineLength; i++) {

            rightButtonDisable.push(false);
            leftButtonDisable.push(false);

            baseStyle[i].lastPos = baseStyle[i].leftPos;
            baseStyle[i].leftPos += (countItemMove * baseStyle[i].itemWidth * factor);

            var maxWidth = baseStyle[i].itemWidth * baseStyle[i].itemCount -
                baseStyle[i].itemWidth * countItemMove;

            if (baseStyle[i].leftPos >= 0) {
                baseStyle[i].leftPos = 0;
                leftButtonDisable[i] = true;
            }
            else if (Math.abs(baseStyle[i].leftPos) >= maxWidth) {
                baseStyle[i].leftPos = -maxWidth;
                rightButtonDisable[i] = true;
            }
            else {
                removeClass(leftButton, 'rows-slider__controls_disabled');
                removeClass(rightButton, 'rows-slider__controls_disabled');
            }
        }

        var lengthRightDisabledButton;
        for (i = 0, lengthRightDisabledButton = rightButtonDisable.length; i < lengthRightDisabledButton; i++) {
            if (!rightButtonDisable[i]) {
                isDisable = true;
            }
        }

        if (!isDisable) {
            removeClass(rightButton, 'rows-slider__controls_disabled');
            rightButton.className += ' rows-slider__controls_disabled';
        }

        isDisable = false;
        var lengthLeftDisabledButton;
        for (i = 0, lengthLeftDisabledButton = leftButtonDisable.length; i < lengthLeftDisabledButton; i++) {
            if (!leftButtonDisable[i]) {
                isDisable = true;
            }
        }

        if (!isDisable) {
            leftButton.className += ' rows-slider__controls_disabled';
        }

        animate({
            obj: lines,
            style: baseStyle,
            duration: 300,
            direction: factor
        });

    };

    /**
     * add event listeners
     *
     * @public
     * @method addEventList
     */
    this.addEventList = function() {
        var ctrl = Self.controls;
        addEvent(ctrl.leftButton, 'click', sliderLeftClick);
        addEvent(ctrl.rightButton, 'click', sliderRightClick);
        addEvent(window, 'resize', resizeWindow);
    };

    /**
     * Create toggle button
     *
     * @public
     * @method createToggleButton
     */
    this.createToggleButton = function() {
        this.parameters.container.innerHTML += '<div class="rows-slider__controls-left rows-slider__controls_disabled">' +
            '</div><div class="rows-slider__controls-right"></div>';
    };

    /**
     * get slider controls
     *
     * @public
     * @method getControls
     */
    this.getControls = function() {

        var ctrl = this.controls,
            container = this.parameters.container;
        // create left and right control button
        this.createToggleButton();
        // get left button
        ctrl.leftButton = container.querySelectorAll('.rows-slider__controls-left')[0];
        // get right button
        ctrl.rightButton = container.querySelectorAll('.rows-slider__controls-right')[0];
        // get slider lines
        ctrl.sliderLines = container.getElementsByTagName('ul');
        // create wrap
        ctrl.containerWrap = document.createElement('div');

        setStyle(ctrl.sliderLines, function() {
            setHover(ctrl.sliderLines);
            setClick(ctrl.sliderLines);
            setText(ctrl.sliderLines);
        });

    };

    /**
     * init request animation frame
     *
     * @public
     * @method initRequestAnimationFrame
     */
    this.initRequestAnimationFrame = function() {

        window.requestAnimationFrame = (function() {
            return  window.requestAnimationFrame||
            window.webkitRequestAnimationFrame||
            window.mozRequestAnimationFrame||
            window.oRequestAnimationFrame||
            window.msRequestAnimationFrame||
            function(callback) {
                return window.setTimeout(callback, 1000 / 60);
            };
        })();

        window.cancelRequestAnimationFrame = (function() {
            return  window.cancelRequestAnimationFrame||
            window.webkitCancelRequestAnimationFrame||
            window.mozCancelRequestAnimationFrame||
            window.oCancelRequestAnimationFrame||
            window.msCancelRequestAnimationFrame||
            function(id){clearTimeout(id)}
        })();

    };

    /**
     * set auto scrolling
     *
     * @public
     * @method initAutoScroll
     */
    this.initAutoScroll = function () {

        function autoScroll() {

            if (Self.parameters.stop) {
                return;
            }

            Self.move(Self.parameters.loopDirections);

            if (ctrl.rightButton.className.indexOf('rows-slider__controls_disabled') > -1) {
                Self.parameters.loopDirections = 'left';
            } else if (ctrl.leftButton.className.indexOf('rows-slider__controls_disabled') > -1) {
                Self.parameters.loopDirections = 'right';
            }
        }

        var ctrl = Self.controls;

        if (!Self.parameters.auto) {
            return;
        }

        Self.parameters.stop = false;

        addEvent(Self.parameters.container, 'mouseover', function () {
            Self.parameters.stop = true;
        });

        addEvent(Self.parameters.container, 'mouseleave', function () {
            Self.parameters.stop = false;
        });

        Self.parameters.loopDirections = 'right';

        setInterval(autoScroll, Self.parameters.delay);
    };

    /**
     * init slider
     *
     * @public
     * @method init
     */
    this.init = function() {

        if (!getNewParameters()) {
            return;
        }

        this.getControls();
        this.addEventList();
        this.initRequestAnimationFrame();
        this.initAutoScroll();
    };

    return this.init();
}
