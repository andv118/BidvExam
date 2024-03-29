﻿(function (window, document, $, undefined) {
    var W = $(window), D = $(document), F = $.fancybox = function () { F.open.apply(this, arguments) }, IE = navigator.userAgent.match(/msie/i), didUpdate = null, isTouch = document.createTouch !== undefined, isQuery = function (obj) { return obj && obj.hasOwnProperty && obj instanceof $ }, isString = function (str) { return str && $.type(str) === "string" }, isPercentage = function (str) { return isString(str) && str.indexOf("%") > 0 }, isScrollable = function (el) {
        return el && !(el.style.overflow && el.style.overflow === "hidden") &&
        (el.clientWidth && el.scrollWidth > el.clientWidth || el.clientHeight && el.scrollHeight > el.clientHeight)
    }, getScalar = function (orig, dim) { var value = parseInt(orig, 10) || 0; if (dim && isPercentage(orig)) value = F.getViewport()[dim] / 100 * value; return Math.ceil(value) }, getValue = function (value, dim) { return getScalar(value, dim) + "px" }; $.extend(F, {
        version: "2.1.4", defaults: {
            padding: 0, margin: 20, width: 800, height: 600, minWidth: 100, minHeight: 100, maxWidth: 9999, maxHeight: 9999, autoSize: true, autoHeight: false, autoWidth: false, autoResize: true,
            autoCenter: !isTouch, fitToView: true, aspectRatio: false, topRatio: .5, leftRatio: .5, scrolling: "auto", wrapCSS: "", arrows: true, closeBtn: true, closeClick: false, nextClick: false, mouseWheel: true, autoPlay: false, playSpeed: 3E3, preload: 3, modal: false, loop: true, ajax: { dataType: "html", headers: { "X-fancyBox": true } }, iframe: { scrolling: "auto", preload: true }, swf: { wmode: "transparent", allowfullscreen: "true", allowscriptaccess: "always" }, keys: {
                next: { 13: "left", 34: "up", 39: "left", 40: "up" }, prev: { 8: "right", 33: "down", 37: "right", 38: "down" },
                close: [27], play: [32], toggle: [70]
            }, direction: { next: "left", prev: "right" }, scrollOutside: true, index: 0, type: null, href: null, content: null, title: null, tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>', image: '<img class="fancybox-image" src="{href}" alt="" />', iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' +
                (IE ? ' allowtransparency="true"' : "") + "></iframe>", error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>', closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>', next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>', prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            }, openEffect: "fade", openSpeed: 250, openEasing: "swing", openOpacity: true,
            openMethod: "zoomIn", closeEffect: "fade", closeSpeed: 250, closeEasing: "swing", closeOpacity: true, closeMethod: "zoomOut", nextEffect: "elastic", nextSpeed: 250, nextEasing: "swing", nextMethod: "changeIn", prevEffect: "elastic", prevSpeed: 250, prevEasing: "swing", prevMethod: "changeOut", helpers: { overlay: true, title: true }, onCancel: $.noop, beforeLoad: $.noop, afterLoad: $.noop, beforeShow: $.noop, afterShow: $.noop, beforeChange: $.noop, beforeClose: $.noop, afterClose: $.noop
        }, group: {}, opts: {}, previous: null, coming: null, current: null,
        isActive: false, isOpen: false, isOpened: false, wrap: null, skin: null, outer: null, inner: null, player: { timer: null, isActive: false }, ajaxLoad: null, imgPreload: null, transitions: {}, helpers: {}, open: function (group, opts) {
            if (!group) return; if (!$.isPlainObject(opts)) opts = {}; if (false === F.close(true)) return; if (!$.isArray(group)) group = isQuery(group) ? $(group).get() : [group]; $.each(group, function (i, element) {
                var obj = {}, href, title, content, type, rez, hrefParts, selector; if ($.type(element) === "object") {
                    if (element.nodeType) element = $(element);
                    if (isQuery(element)) { obj = { href: element.data("fancybox-href") || element.attr("href"), title: element.data("fancybox-title") || element.attr("title"), isDom: true, element: element }; if ($.metadata) $.extend(true, obj, element.metadata()) } else obj = element
                } href = opts.href || obj.href || (isString(element) ? element : null); title = opts.title !== undefined ? opts.title : obj.title || ""; content = opts.content || obj.content; type = content ? "html" : opts.type || obj.type; if (!type && obj.isDom) {
                    type = element.data("fancybox-type"); if (!type) {
                        rez = element.prop("class").match(/fancybox\.(\w+)/);
                        type = rez ? rez[1] : null
                    }
                } if (isString(href)) { if (!type) if (F.isImage(href)) type = "image"; else if (F.isSWF(href)) type = "swf"; else if (href.charAt(0) === "#") type = "inline"; else if (isString(element)) { type = "html"; content = element } if (type === "ajax") { hrefParts = href.split(/\s+/, 2); href = hrefParts.shift(); selector = hrefParts.shift() } } if (!content) if (type === "inline") if (href) content = $(isString(href) ? href.replace(/.*(?=#[^\s]+$)/, "") : href); else { if (obj.isDom) content = element } else if (type === "html") content = href; else if (!type && !href &&
                obj.isDom) { type = "inline"; content = element } $.extend(obj, { href: href, type: type, content: content, title: title, selector: selector }); group[i] = obj
            }); F.opts = $.extend(true, {}, F.defaults, opts); if (opts.keys !== undefined) F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : false; F.group = group; return F._start(F.opts.index)
        }, cancel: function () {
            var coming = F.coming; if (!coming || false === F.trigger("onCancel")) return; F.hideLoading(); if (F.ajaxLoad) F.ajaxLoad.abort(); F.ajaxLoad = null; if (F.imgPreload) F.imgPreload.onload =
            F.imgPreload.onerror = null; if (coming.wrap) coming.wrap.stop(true, true).trigger("onReset").remove(); F.coming = null; if (!F.current) F._afterZoomOut(coming)
        }, close: function (event) {
            F.cancel(); if (false === F.trigger("beforeClose")) return; F.unbindEvents(); if (!F.isActive) return; if (!F.isOpen || event === true) { $(".fancybox-wrap").stop(true).trigger("onReset").remove(); F._afterZoomOut() } else {
                F.isOpen = F.isOpened = false; F.isClosing = true; $(".fancybox-item, .fancybox-nav").remove(); F.wrap.stop(true, true).removeClass("fancybox-opened");
                F.transitions[F.current.closeMethod]()
            }
        }, play: function (action) {
            var clear = function () { clearTimeout(F.player.timer) }, set = function () { clear(); if (F.current && F.player.isActive) F.player.timer = setTimeout(F.next, F.current.playSpeed) }, stop = function () { clear(); $("body").unbind(".player"); F.player.isActive = false; F.trigger("onPlayEnd") }, start = function () {
                if (F.current && (F.current.loop || F.current.index < F.group.length - 1)) {
                    F.player.isActive = true; $("body").bind({
                        "afterShow.player onUpdate.player": set, "onCancel.player beforeClose.player": stop,
                        "beforeLoad.player": clear
                    }); set(); F.trigger("onPlayStart")
                }
            }; if (action === true || !F.player.isActive && action !== false) start(); else stop()
        }, next: function (direction) { var current = F.current; if (current) { if (!isString(direction)) direction = current.direction.next; F.jumpto(current.index + 1, direction, "next") } }, prev: function (direction) { var current = F.current; if (current) { if (!isString(direction)) direction = current.direction.prev; F.jumpto(current.index - 1, direction, "prev") } }, jumpto: function (index, direction, router) {
            var current =
            F.current; if (!current) return; index = getScalar(index); F.direction = direction || current.direction[index >= current.index ? "next" : "prev"]; F.router = router || "jumpto"; if (current.loop) { if (index < 0) index = current.group.length + index % current.group.length; index = index % current.group.length } if (current.group[index] !== undefined) { F.cancel(); F._start(index) }
        }, reposition: function (e, onlyAbsolute) {
            var current = F.current, wrap = current ? current.wrap : null, pos; if (wrap) {
                pos = F._getPosition(onlyAbsolute); if (e && e.type === "scroll") {
                    delete pos.position;
                    wrap.stop(true, true).animate(pos, 200)
                } else { wrap.css(pos); current.pos = $.extend({}, current.dim, pos) }
            }
        }, update: function (e) {
            var type = e && e.type, anyway = !type || type === "orientationchange"; if (anyway) { clearTimeout(didUpdate); didUpdate = null } if (!F.isOpen || didUpdate) return; didUpdate = setTimeout(function () {
                var current = F.current; if (!current || F.isClosing) return; F.wrap.removeClass("fancybox-tmp"); if (anyway || type === "load" || type === "resize" && current.autoResize) F._setDimension(); if (!(type === "scroll" && current.canShrink)) F.reposition(e);
                F.trigger("onUpdate"); didUpdate = null
            }, anyway && !isTouch ? 0 : 300)
        }, toggle: function (action) { if (F.isOpen) { F.current.fitToView = $.type(action) === "boolean" ? action : !F.current.fitToView; if (isTouch) { F.wrap.removeAttr("style").addClass("fancybox-tmp"); F.trigger("onUpdate") } F.update() } }, hideLoading: function () { D.unbind(".loading"); $("#fancybox-loading").remove() }, showLoading: function () {
            var el, viewport; F.hideLoading(); el = $('<div id="fancybox-loading"><div></div></div>').click(F.cancel).appendTo("body"); D.bind("keydown.loading",
            function (e) { if ((e.which || e.keyCode) === 27) { e.preventDefault(); F.cancel() } }); if (!F.defaults.fixed) { viewport = F.getViewport(); el.css({ position: "absolute", top: viewport.h * .5 + viewport.y, left: viewport.w * .5 + viewport.x }) }
        }, getViewport: function () {
            var locked = F.current && F.current.locked || false, rez = { x: W.scrollLeft(), y: W.scrollTop() }; if (locked) { rez.w = locked[0].clientWidth; rez.h = locked[0].clientHeight } else {
                rez.w = isTouch && window.innerWidth ? window.innerWidth : W.width(); rez.h = isTouch && window.innerHeight ? window.innerHeight :
                W.height()
            } return rez
        }, unbindEvents: function () { if (F.wrap && isQuery(F.wrap)) F.wrap.unbind(".fb"); D.unbind(".fb"); W.unbind(".fb") }, bindEvents: function () {
            var current = F.current, keys; if (!current) return; W.bind("orientationchange.fb" + (isTouch ? "" : " resize.fb") + (current.autoCenter && !current.locked ? " scroll.fb" : ""), F.update); keys = current.keys; if (keys) D.bind("keydown.fb", function (e) {
                var code = e.which || e.keyCode, target = e.target || e.srcElement; if (code === 27 && F.coming) return false; if (!e.ctrlKey && !e.altKey && !e.shiftKey &&
                !e.metaKey && !(target && (target.type || $(target).is("[contenteditable]")))) $.each(keys, function (i, val) { if (current.group.length > 1 && val[code] !== undefined) { F[i](val[code]); e.preventDefault(); return false } if ($.inArray(code, val) > -1) { F[i](); e.preventDefault(); return false } })
            }); if ($.fn.mousewheel && current.mouseWheel) F.wrap.bind("mousewheel.fb", function (e, delta, deltaX, deltaY) {
                var target = e.target || null, parent = $(target), canScroll = false; while (parent.length) {
                    if (canScroll || parent.is(".fancybox-skin") || parent.is(".fancybox-wrap")) break;
                    canScroll = isScrollable(parent[0]); parent = $(parent).parent()
                } if (delta !== 0 && !canScroll) if (F.group.length > 1 && !current.canShrink) { if (deltaY > 0 || deltaX > 0) F.prev(deltaY > 0 ? "down" : "left"); else if (deltaY < 0 || deltaX < 0) F.next(deltaY < 0 ? "up" : "right"); e.preventDefault() }
            })
        }, trigger: function (event, o) {
            var ret, obj = o || F.coming || F.current; if (!obj) return; if ($.isFunction(obj[event])) ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1)); if (ret === false) return false; if (obj.helpers) $.each(obj.helpers, function (helper,
            opts) { if (opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event])) { opts = $.extend(true, {}, F.helpers[helper].defaults, opts); F.helpers[helper][event](opts, obj) } }); $.event.trigger(event + ".fb")
        }, isImage: function (str) { return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i) }, isSWF: function (str) { return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i) }, _start: function (index) {
            var coming = {}, obj, href, type, margin, padding; index = getScalar(index); obj = F.group[index] ||
            null; if (!obj) return false; coming = $.extend(true, {}, F.opts, obj); margin = coming.margin; padding = coming.padding; if ($.type(margin) === "number") coming.margin = [margin, margin, margin, margin]; if ($.type(padding) === "number") coming.padding = [padding, padding, padding, padding]; if (coming.modal) $.extend(true, coming, { closeBtn: false, closeClick: false, nextClick: false, arrows: false, mouseWheel: false, keys: null, helpers: { overlay: { closeClick: false } } }); if (coming.autoSize) coming.autoWidth = coming.autoHeight = true; if (coming.width === "auto") coming.autoWidth =
            true; if (coming.height === "auto") coming.autoHeight = true; coming.group = F.group; coming.index = index; F.coming = coming; if (false === F.trigger("beforeLoad")) { F.coming = null; return } type = coming.type; href = coming.href; if (!type) { F.coming = null; if (F.current && F.router && F.router !== "jumpto") { F.current.index = index; return F[F.router](F.direction) } return false } F.isActive = true; if (type === "image" || type === "swf") { coming.autoHeight = coming.autoWidth = false; coming.scrolling = "visible" } if (type === "image") coming.aspectRatio = true; if (type ===
            "iframe" && isTouch) coming.scrolling = "scroll"; coming.wrap = $(coming.tpl.wrap).addClass("fancybox-" + (isTouch ? "mobile" : "desktop") + " fancybox-type-" + type + " fancybox-tmp " + coming.wrapCSS).appendTo(coming.parent || "body"); $.extend(coming, { skin: $(".fancybox-skin", coming.wrap), outer: $(".fancybox-outer", coming.wrap), inner: $(".fancybox-inner", coming.wrap) }); $.each(["Top", "Right", "Bottom", "Left"], function (i, v) { coming.skin.css("padding" + v, getValue(coming.padding[i])) }); F.trigger("onReady"); if (type === "inline" || type ===
            "html") { if (!coming.content || !coming.content.length) return F._error("content") } else if (!href) return F._error("href"); if (type === "image") F._loadImage(); else if (type === "ajax") F._loadAjax(); else if (type === "iframe") F._loadIframe(); else F._afterLoad()
        }, _error: function (type) { $.extend(F.coming, { type: "html", autoWidth: true, autoHeight: true, minWidth: 0, minHeight: 0, scrolling: "no", hasError: type, content: F.coming.tpl.error }); F._afterLoad() }, _loadImage: function () {
            var img = F.imgPreload = new Image; img.onload = function () {
                this.onload =
                this.onerror = null; F.coming.width = this.width; F.coming.height = this.height; F._afterLoad()
            }; img.onerror = function () { this.onload = this.onerror = null; F._error("image") }; img.src = F.coming.href; if (img.complete !== true) F.showLoading()
        }, _loadAjax: function () {
            var coming = F.coming; F.showLoading(); F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
                url: coming.href, error: function (jqXHR, textStatus) { if (F.coming && textStatus !== "abort") F._error("ajax", jqXHR); else F.hideLoading() }, success: function (data, textStatus) {
                    if (textStatus === "success") {
                        coming.content =
                        data; F._afterLoad()
                    }
                }
            }))
        }, _loadIframe: function () {
            var coming = F.coming, iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", isTouch ? "auto" : coming.iframe.scrolling).attr("src", coming.href); $(coming.wrap).bind("onReset", function () { try { $(this).find("iframe").hide().attr("src", "//about:blank").end().empty() } catch (e) { } }); if (coming.iframe.preload) {
                F.showLoading(); iframe.one("load", function () {
                    $(this).data("ready", 1); if (!isTouch) $(this).bind("load.fb", F.update); $(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();
                    F._afterLoad()
                })
            } coming.content = iframe.appendTo(coming.inner); if (!coming.iframe.preload) F._afterLoad()
        }, _preloadImages: function () { var group = F.group, current = F.current, len = group.length, cnt = current.preload ? Math.min(current.preload, len - 1) : 0, item, i; for (i = 1; i <= cnt; i += 1) { item = group[(current.index + i) % len]; if (item.type === "image" && item.href) (new Image).src = item.href } }, _afterLoad: function () {
            var coming = F.coming, previous = F.current, placeholder = "fancybox-placeholder", current, content, type, scrolling, href, embed; F.hideLoading();
            if (!coming || F.isActive === false) return; if (false === F.trigger("afterLoad", coming, previous)) { coming.wrap.stop(true).trigger("onReset").remove(); F.coming = null; return } if (previous) { F.trigger("beforeChange", previous); previous.wrap.stop(true).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove() } F.unbindEvents(); current = coming; content = coming.content; type = coming.type; scrolling = coming.scrolling; $.extend(F, {
                wrap: current.wrap, skin: current.skin, outer: current.outer, inner: current.inner, current: current,
                previous: previous
            }); href = current.href; switch (type) {
                case "inline": case "ajax": case "html": if (current.selector) content = $("<div>").html(content).find(current.selector); else if (isQuery(content)) { if (!content.data(placeholder)) content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter(content).hide()); content = content.show().detach(); current.wrap.bind("onReset", function () { if ($(this).find(content).length) content.hide().replaceAll(content.data(placeholder)).data(placeholder, false) }) } break;
                case "image": content = current.tpl.image.replace("{href}", href); break; case "swf": content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>'; embed = ""; $.each(current.swf, function (name, val) { content += '<param name="' + name + '" value="' + val + '"></param>'; embed += " " + name + '="' + val + '"' }); content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + "></embed></object>";
                    break
            } if (!(isQuery(content) && content.parent().is(current.inner))) current.inner.append(content); F.trigger("beforeShow"); current.inner.css("overflow", scrolling === "yes" ? "scroll" : scrolling === "no" ? "hidden" : scrolling); F._setDimension(); F.reposition(); F.isOpen = false; F.coming = null; F.bindEvents(); if (!F.isOpened) $(".fancybox-wrap").not(current.wrap).stop(true).trigger("onReset").remove(); else if (previous.prevMethod) F.transitions[previous.prevMethod](); F.transitions[F.isOpened ? current.nextMethod : current.openMethod]();
            F._preloadImages()
        }, _setDimension: function () {
            var viewport = F.getViewport(), steps = 0, canShrink = false, canExpand = false, wrap = F.wrap, skin = F.skin, inner = F.inner, current = F.current, width = current.width, height = current.height, minWidth = current.minWidth, minHeight = current.minHeight, maxWidth = current.maxWidth, maxHeight = current.maxHeight, scrolling = current.scrolling, scrollOut = current.scrollOutside ? current.scrollbarWidth : 0, margin = current.margin, wMargin = getScalar(margin[1] + margin[3]), hMargin = getScalar(margin[0] + margin[2]),
            wPadding, hPadding, wSpace, hSpace, origWidth, origHeight, origMaxWidth, origMaxHeight, ratio, width_, height_, maxWidth_, maxHeight_, iframe, body; wrap.add(skin).add(inner).width("auto").height("auto").removeClass("fancybox-tmp"); wPadding = getScalar(skin.outerWidth(true) - skin.width()); hPadding = getScalar(skin.outerHeight(true) - skin.height()); wSpace = wMargin + wPadding; hSpace = hMargin + hPadding; origWidth = isPercentage(width) ? (viewport.w - wSpace) * getScalar(width) / 100 : width; origHeight = isPercentage(height) ? (viewport.h - hSpace) *
            getScalar(height) / 100 : height; if (current.type === "iframe") { iframe = current.content; if (current.autoHeight && iframe.data("ready") === 1) try { if (iframe[0].contentWindow.document.location) { inner.width(origWidth).height(9999); body = iframe.contents().find("body"); if (scrollOut) body.css({ "overflow-x": "hidden", "margin": "0px" }); origHeight = body.height() } } catch (e) { } } else if (current.autoWidth || current.autoHeight) {
                inner.addClass("fancybox-tmp"); if (!current.autoWidth) inner.width(origWidth); if (!current.autoHeight) inner.height(origHeight);
                if (current.autoWidth) origWidth = inner.width(); if (current.autoHeight) origHeight = inner.height(); inner.removeClass("fancybox-tmp")
            } width = getScalar(origWidth); height = getScalar(origHeight); ratio = origWidth / origHeight; minWidth = getScalar(isPercentage(minWidth) ? getScalar(minWidth, "w") - wSpace : minWidth); maxWidth = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, "w") - wSpace : maxWidth); minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, "h") - hSpace : minHeight); maxHeight = getScalar(isPercentage(maxHeight) ?
            getScalar(maxHeight, "h") - hSpace : maxHeight); origMaxWidth = maxWidth; origMaxHeight = maxHeight; if (current.fitToView) { maxWidth = Math.min(viewport.w - wSpace, maxWidth); maxHeight = Math.min(viewport.h - hSpace, maxHeight) } maxWidth_ = viewport.w - wMargin; maxHeight_ = viewport.h - hMargin; if (current.aspectRatio) {
                if (width > maxWidth) { width = maxWidth; height = getScalar(width / ratio) } if (height > maxHeight) { height = maxHeight; width = getScalar(height * ratio) } if (width < minWidth) { width = minWidth; height = getScalar(width / ratio) } if (height < minHeight) {
                    height =
                    minHeight; width = getScalar(height * ratio)
                }
            } else { width = Math.max(minWidth, Math.min(width, maxWidth)); if (current.autoHeight && current.type !== "iframe") { inner.width(width); height = inner.height() } height = Math.max(minHeight, Math.min(height, maxHeight)) } if (current.fitToView) {
                inner.width(width).height(height); wrap.width(width + wPadding); width_ = wrap.width(); height_ = wrap.height(); if (current.aspectRatio) while ((width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight) {
                    if (steps++ > 19) break; height = Math.max(minHeight,
                    Math.min(maxHeight, height - 10)); width = getScalar(height * ratio); if (width < minWidth) { width = minWidth; height = getScalar(width / ratio) } if (width > maxWidth) { width = maxWidth; height = getScalar(width / ratio) } inner.width(width).height(height); wrap.width(width + wPadding); width_ = wrap.width(); height_ = wrap.height()
                } else { width = Math.max(minWidth, Math.min(width, width - (width_ - maxWidth_))); height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_))) }
            } if (scrollOut && scrolling === "auto" && height < origHeight && width + wPadding +
            scrollOut < maxWidth_) width += scrollOut; inner.width(width).height(height); wrap.width(width + wPadding); width_ = wrap.width(); height_ = wrap.height(); canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight; canExpand = current.aspectRatio ? width < origMaxWidth && height < origMaxHeight && width < origWidth && height < origHeight : (width < origMaxWidth || height < origMaxHeight) && (width < origWidth || height < origHeight); $.extend(current, {
                dim: { width: getValue(width_), height: getValue(height_) }, origWidth: origWidth,
                origHeight: origHeight, canShrink: canShrink, canExpand: canExpand, wPadding: wPadding, hPadding: hPadding, wrapSpace: height_ - skin.outerHeight(true), skinSpace: skin.height() - height
            }); if (!iframe && current.autoHeight && height > minHeight && height < maxHeight && !canExpand) inner.height("auto")
        }, _getPosition: function (onlyAbsolute) {
            var current = F.current, viewport = F.getViewport(), margin = current.margin, width = F.wrap.width() + margin[1] + margin[3], height = F.wrap.height() + margin[0] + margin[2], rez = {
                position: "absolute", top: margin[0],
                left: margin[3]
            }; if (current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w) rez.position = "fixed"; else if (!current.locked) { rez.top += viewport.y; rez.left += viewport.x } rez.top = getValue(Math.max(rez.top, rez.top + (viewport.h - height) * current.topRatio)); rez.left = getValue(Math.max(rez.left, rez.left + (viewport.w - width) * current.leftRatio)); return rez
        }, _afterZoomIn: function () {
            var current = F.current; if (!current) return; F.isOpen = F.isOpened = true; F.wrap.css("overflow", "visible").addClass("fancybox-opened");
            F.update(); if (current.closeClick || current.nextClick && F.group.length > 1) F.inner.css("cursor", "pointer").bind("click.fb", function (e) { if (!$(e.target).is("a") && !$(e.target).parent().is("a")) { e.preventDefault(); F[current.closeClick ? "close" : "next"]() } }); if (current.closeBtn) $(current.tpl.closeBtn).appendTo(F.skin).bind("click.fb", function (e) { e.preventDefault(); F.close() }); if (current.arrows && F.group.length > 1) {
                if (current.loop || current.index > 0) $(current.tpl.prev).appendTo(F.outer).bind("click.fb", F.prev); if (current.loop ||
                current.index < F.group.length - 1) $(current.tpl.next).appendTo(F.outer).bind("click.fb", F.next)
            } F.trigger("afterShow"); if (!current.loop && current.index === current.group.length - 1) F.play(false); else if (F.opts.autoPlay && !F.player.isActive) { F.opts.autoPlay = false; F.play() }
        }, _afterZoomOut: function (obj) {
            obj = obj || F.current; $(".fancybox-wrap").trigger("onReset").remove(); $.extend(F, {
                group: {}, opts: {}, router: false, current: null, isActive: false, isOpened: false, isOpen: false, isClosing: false, wrap: null, skin: null, outer: null,
                inner: null
            }); F.trigger("afterClose", obj)
        }
    }); F.transitions = {
        getOrigPosition: function () {
            var current = F.current, element = current.element, orig = current.orig, pos = {}, width = 50, height = 50, hPadding = current.hPadding, wPadding = current.wPadding, viewport = F.getViewport(); if (!orig && current.isDom && element.is(":visible")) { orig = element.find("img:first"); if (!orig.length) orig = element } if (isQuery(orig)) { pos = orig.offset(); if (orig.is("img")) { width = orig.outerWidth(); height = orig.outerHeight() } } else {
                pos.top = viewport.y + (viewport.h -
                height) * current.topRatio; pos.left = viewport.x + (viewport.w - width) * current.leftRatio
            } if (F.wrap.css("position") === "fixed" || current.locked) { pos.top -= viewport.y; pos.left -= viewport.x } pos = { top: getValue(pos.top - hPadding * current.topRatio), left: getValue(pos.left - wPadding * current.leftRatio), width: getValue(width + wPadding), height: getValue(height + hPadding) }; return pos
        }, step: function (now, fx) {
            var ratio, padding, value, prop = fx.prop, current = F.current, wrapSpace = current.wrapSpace, skinSpace = current.skinSpace; if (prop === "width" ||
            prop === "height") { ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start); if (F.isClosing) ratio = 1 - ratio; padding = prop === "width" ? current.wPadding : current.hPadding; value = now - padding; F.skin[prop](getScalar(prop === "width" ? value : value - wrapSpace * ratio)); F.inner[prop](getScalar(prop === "width" ? value : value - wrapSpace * ratio - skinSpace * ratio)) }
        }, zoomIn: function () {
            var current = F.current, startPos = current.pos, effect = current.openEffect, elastic = effect === "elastic", endPos = $.extend({ opacity: 1 }, startPos); delete endPos.position;
            if (elastic) { startPos = this.getOrigPosition(); if (current.openOpacity) startPos.opacity = .1 } else if (effect === "fade") startPos.opacity = .1; F.wrap.css(startPos).animate(endPos, { duration: effect === "none" ? 0 : current.openSpeed, easing: current.openEasing, step: elastic ? this.step : null, complete: F._afterZoomIn })
        }, zoomOut: function () {
            var current = F.current, effect = current.closeEffect, elastic = effect === "elastic", endPos = { opacity: .1 }; if (elastic) { endPos = this.getOrigPosition(); if (current.closeOpacity) endPos.opacity = .1 } F.wrap.animate(endPos,
            { duration: effect === "none" ? 0 : current.closeSpeed, easing: current.closeEasing, step: elastic ? this.step : null, complete: F._afterZoomOut })
        }, changeIn: function () {
            var current = F.current, effect = current.nextEffect, startPos = current.pos, endPos = { opacity: 1 }, direction = F.direction, distance = 200, field; startPos.opacity = .1; if (effect === "elastic") {
                field = direction === "down" || direction === "up" ? "top" : "left"; if (direction === "down" || direction === "right") {
                    startPos[field] = getValue(getScalar(startPos[field]) - distance); endPos[field] = "+=" +
                    distance + "px"
                } else { startPos[field] = getValue(getScalar(startPos[field]) + distance); endPos[field] = "-=" + distance + "px" }
            } if (effect === "none") F._afterZoomIn(); else F.wrap.css(startPos).animate(endPos, { duration: current.nextSpeed, easing: current.nextEasing, complete: F._afterZoomIn })
        }, changeOut: function () {
            var previous = F.previous, effect = previous.prevEffect, endPos = { opacity: .1 }, direction = F.direction, distance = 200; if (effect === "elastic") endPos[direction === "down" || direction === "up" ? "top" : "left"] = (direction === "up" || direction ===
            "left" ? "-" : "+") + "=" + distance + "px"; previous.wrap.animate(endPos, { duration: effect === "none" ? 0 : previous.prevSpeed, easing: previous.prevEasing, complete: function () { $(this).trigger("onReset").remove() } })
        }
    }; F.helpers.overlay = {
        defaults: { closeClick: true, speedOut: 200, showEarly: true, css: {}, locked: !isTouch, fixed: true }, overlay: null, fixed: false, create: function (opts) {
            opts = $.extend({}, this.defaults, opts); if (this.overlay) this.close(); this.overlay = $('<div class="fancybox-overlay"></div>').appendTo("body"); this.fixed =
            false; if (opts.fixed && F.defaults.fixed) { this.overlay.addClass("fancybox-overlay-fixed"); this.fixed = true }
        }, open: function (opts) {
            var that = this; opts = $.extend({}, this.defaults, opts); if (this.overlay) this.overlay.unbind(".overlay").width("auto").height("auto"); else this.create(opts); if (!this.fixed) { W.bind("resize.overlay", $.proxy(this.update, this)); this.update() } if (opts.closeClick) this.overlay.bind("click.overlay", function (e) { if ($(e.target).hasClass("fancybox-overlay")) if (F.isActive) F.close(); else that.close() });
            this.overlay.css(opts.css).show()
        }, close: function () { $(".fancybox-overlay").remove(); W.unbind("resize.overlay"); this.overlay = null; if (this.margin !== false) { $("body").css("margin-right", this.margin); this.margin = false } if (this.el) this.el.removeClass("fancybox-lock") }, update: function () {
            var width = "100%", offsetWidth; this.overlay.width(width).height("100%"); if (IE) { offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth); if (D.width() > offsetWidth) width = D.width() } else if (D.width() >
            W.width()) width = D.width(); this.overlay.width(width).height(D.height())
        }, onReady: function (opts, obj) { $(".fancybox-overlay").stop(true, true); if (!this.overlay) { this.margin = D.height() > W.height() || $("body").css("overflow-y") === "scroll" ? $("body").css("margin-right") : false; this.el = document.all && !document.querySelector ? $("html") : $("body"); this.create(opts) } if (opts.locked && this.fixed) { obj.locked = this.overlay.append(obj.wrap); obj.fixed = false } if (opts.showEarly === true) this.beforeShow.apply(this, arguments) }, beforeShow: function (opts,
        obj) { if (obj.locked) { this.el.addClass("fancybox-lock"); if (this.margin !== false) $("body").css("margin-right", getScalar(this.margin) + obj.scrollbarWidth) } this.open(opts) }, onUpdate: function () { if (!this.fixed) this.update() }, afterClose: function (opts) { if (this.overlay && !F.isActive) this.overlay.fadeOut(opts.speedOut, $.proxy(this.close, this)) }
    }; F.helpers.title = {
        defaults: { type: "float", position: "bottom" }, beforeShow: function (opts) {
            var current = F.current, text = current.title, type = opts.type, title, target; if ($.isFunction(text)) text =
            text.call(current.element, current); if (!isString(text) || $.trim(text) === "") return; title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + "</div>"); switch (type) { case "inside": target = F.skin; break; case "outside": target = F.wrap; break; case "over": target = F.inner; break; default: target = F.skin; title.appendTo("body"); if (IE) title.width(title.width()); title.wrapInner('<span class="child"></span>'); F.current.margin[2] += Math.abs(getScalar(title.css("margin-bottom"))); break } title[opts.position === "top" ?
            "prependTo" : "appendTo"](target)
        }
    }; $.fn.fancybox = function (options) {
        var index, that = $(this), selector = this.selector || "", run = function (e) {
            var what = $(this).blur(), idx = index, relType, relVal; if (!(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey) && !what.is(".fancybox-wrap")) {
                relType = options.groupAttr || "data-fancybox-group"; relVal = what.attr(relType); if (!relVal) { relType = "rel"; relVal = what.get(0)[relType] } if (relVal && relVal !== "" && relVal !== "nofollow") {
                    what = selector.length ? $(selector) : that; what = what.filter("[" + relType + '="' +
                    relVal + '"]'); idx = what.index(this)
                } options.index = idx; if (F.open(what, options) !== false) e.preventDefault()
            }
        }; options = options || {}; index = options.index || 0; if (!selector || options.live === false) that.unbind("click.fb-start").bind("click.fb-start", run); else D.undelegate(selector, "click.fb-start").delegate(selector + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", run); this.filter("[data-fancybox-start=1]").trigger("click"); return this
    }; D.ready(function () {
        if ($.scrollbarWidth === undefined) $.scrollbarWidth =
        function () { var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"), child = parent.children(), width = child.innerWidth() - child.height(99).innerWidth(); parent.remove(); return width }; if ($.support.fixedPosition === undefined) $.support.fixedPosition = function () { var elem = $('<div style="position:fixed;top:20px;"></div>').appendTo("body"), fixed = elem[0].offsetTop === 20 || elem[0].offsetTop === 15; elem.remove(); return fixed }(); $.extend(F.defaults, {
            scrollbarWidth: $.scrollbarWidth(),
            fixed: $.support.fixedPosition, parent: $("body")
        })
    })
})(window, document, jQuery);
(function ($) {
    var ver = "2.74"; if ($.support == undefined) $.support = { opacity: !$.browser.msie }; function debug(s) { if ($.fn.cycle.debug) log(s) } function log() { if (window.console && window.console.log) window.console.log("[cycle] " + Array.prototype.join.call(arguments, " ")) } $.fn.cycle = function (options, arg2) {
        var o = { s: this.selector, c: this.context }; if (this.length === 0 && options != "stop") {
            if (!$.isReady && o.s) { log("DOM not ready, queuing slideshow"); $(function () { $(o.s, o.c).cycle(options, arg2) }); return this } log("terminating; zero elements found by selector" +
            ($.isReady ? "" : " (DOM not ready)")); return this
        } return this.each(function () {
            var opts = handleArguments(this, options, arg2); if (opts === false) return; if (this.cycleTimeout) clearTimeout(this.cycleTimeout); this.cycleTimeout = this.cyclePause = 0; var $cont = $(this); var $slides = opts.slideExpr ? $(opts.slideExpr, this) : $cont.children(); var els = $slides.get(); if (els.length < 2) { log("terminating; too few slides: " + els.length); return } var opts2 = buildOptions($cont, $slides, els, opts, o); if (opts2 === false) return; var startTime = opts2.continuous ?
            10 : getTimeout(opts2.currSlide, opts2.nextSlide, opts2, !opts2.rev); if (startTime) { startTime += opts2.delay || 0; if (startTime < 10) startTime = 10; debug("first timeout: " + startTime); this.cycleTimeout = setTimeout(function () { go(els, opts2, 0, !opts2.rev) }, startTime) }
        })
    }; function handleArguments(cont, options, arg2) {
        if (cont.cycleStop == undefined) cont.cycleStop = 0; if (options === undefined || options === null) options = {}; if (options.constructor == String) {
            switch (options) {
                case "stop": cont.cycleStop++; if (cont.cycleTimeout) clearTimeout(cont.cycleTimeout);
                    cont.cycleTimeout = 0; $(cont).removeData("cycle.opts"); return false; case "toggle": cont.cyclePause = cont.cyclePause === 1 ? 0 : 1; return false; case "pause": cont.cyclePause = 1; return false; case "resume": cont.cyclePause = 0; if (arg2 === true) { options = $(cont).data("cycle.opts"); if (!options) { log("options not found, can not resume"); return false } if (cont.cycleTimeout) { clearTimeout(cont.cycleTimeout); cont.cycleTimeout = 0 } go(options.elements, options, 1, 1) } return false; case "prev": case "next": var opts = $(cont).data("cycle.opts");
                        if (!opts) { log('options not found, "prev/next" ignored'); return false } $.fn.cycle[options](opts); return false; default: options = { fx: options }
            } return options
        } else if (options.constructor == Number) {
            var num = options; options = $(cont).data("cycle.opts"); if (!options) { log("options not found, can not advance slide"); return false } if (num < 0 || num >= options.elements.length) { log("invalid slide index: " + num); return false } options.nextSlide = num; if (cont.cycleTimeout) { clearTimeout(cont.cycleTimeout); cont.cycleTimeout = 0 } if (typeof arg2 ==
            "string") options.oneTimeFx = arg2; go(options.elements, options, 1, num >= options.currSlide); return false
        } return options
    } function removeFilter(el, opts) { if (!$.support.opacity && opts.cleartype && el.style.filter) try { el.style.removeAttribute("filter") } catch (smother) { } } function buildOptions($cont, $slides, els, options, o) {
        var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {}); if (opts.autostop) opts.countdown = opts.autostopCount || els.length; var cont = $cont[0]; $cont.data("cycle.opts",
        opts); opts.$cont = $cont; opts.stopCount = cont.cycleStop; opts.elements = els; opts.before = opts.before ? [opts.before] : []; opts.after = opts.after ? [opts.after] : []; opts.after.unshift(function () { opts.busy = 0 }); if (!$.support.opacity && opts.cleartype) opts.after.push(function () { removeFilter(this, opts) }); if (opts.continuous) opts.after.push(function () { go(els, opts, 0, !opts.rev) }); saveOriginalOpts(opts); if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg) clearTypeFix($slides); if ($cont.css("position") == "static") $cont.css("position",
        "relative"); if (opts.width) $cont.width(opts.width); if (opts.height && opts.height != "auto") $cont.height(opts.height); if (opts.startingSlide) opts.startingSlide = parseInt(opts.startingSlide); if (opts.random) { opts.randomMap = []; for (var i = 0; i < els.length; i++) opts.randomMap.push(i); opts.randomMap.sort(function (a, b) { return Math.random() - .5 }); opts.randomIndex = 0; opts.startingSlide = opts.randomMap[0] } else if (opts.startingSlide >= els.length) opts.startingSlide = 0; opts.currSlide = opts.startingSlide = opts.startingSlide || 0; var first =
        opts.startingSlide; $slides.css({ position: "absolute", top: 0, left: 0 }).hide().each(function (i) { var z = first ? i >= first ? els.length - (i - first) : first - i : els.length - i; $(this).css("z-index", z) }); $(els[first]).css("opacity", 1).show(); removeFilter(els[first], opts); if (opts.fit && opts.width) $slides.width(opts.width); if (opts.fit && opts.height && opts.height != "auto") $slides.height(opts.height); var reshape = opts.containerResize && !$cont.innerHeight(); if (reshape) {
            var maxw = 0, maxh = 0; for (var j = 0; j < els.length; j++) {
                var $e = $(els[j]),
                e = $e[0], w = $e.outerWidth(), h = $e.outerHeight(); if (!w) w = e.offsetWidth; if (!h) h = e.offsetHeight; maxw = w > maxw ? w : maxw; maxh = h > maxh ? h : maxh
            } if (maxw > 0 && maxh > 0) $cont.css({ width: maxw + "px", height: maxh + "px" })
        } if (opts.pause) $cont.hover(function () { this.cyclePause++ }, function () { this.cyclePause-- }); if (supportMultiTransitions(opts) === false) return false; var requeue = false; options.requeueAttempts = options.requeueAttempts || 0; $slides.each(function () {
            var $el = $(this); this.cycleH = opts.fit && opts.height ? opts.height : $el.height();
            this.cycleW = opts.fit && opts.width ? opts.width : $el.width(); if ($el.is("img")) {
                var loadingIE = $.browser.msie && this.cycleW == 28 && this.cycleH == 30 && !this.complete; var loadingFF = $.browser.mozilla && this.cycleW == 34 && this.cycleH == 19 && !this.complete; var loadingOp = $.browser.opera && (this.cycleW == 42 && this.cycleH == 19 || this.cycleW == 37 && this.cycleH == 17) && !this.complete; var loadingOther = this.cycleH == 0 && this.cycleW == 0 && !this.complete; if (loadingIE || loadingFF || loadingOp || loadingOther) if (o.s && opts.requeueOnImageNotLoaded &&
                ++options.requeueAttempts < 100) { log(options.requeueAttempts, " - img slide not loaded, requeuing slideshow: ", this.src, this.cycleW, this.cycleH); setTimeout(function () { $(o.s, o.c).cycle(options) }, opts.requeueTimeout); requeue = true; return false } else log("could not determine size of image: " + this.src, this.cycleW, this.cycleH)
            } return true
        }); if (requeue) return false; opts.cssBefore = opts.cssBefore || {}; opts.animIn = opts.animIn || {}; opts.animOut = opts.animOut || {}; $slides.not(":eq(" + first + ")").css(opts.cssBefore); if (opts.cssFirst) $($slides[first]).css(opts.cssFirst);
        if (opts.timeout) { opts.timeout = parseInt(opts.timeout); if (opts.speed.constructor == String) opts.speed = $.fx.speeds[opts.speed] || parseInt(opts.speed); if (!opts.sync) opts.speed = opts.speed / 2; while (opts.timeout - opts.speed < 250) opts.timeout += opts.speed } if (opts.easing) opts.easeIn = opts.easeOut = opts.easing; if (!opts.speedIn) opts.speedIn = opts.speed; if (!opts.speedOut) opts.speedOut = opts.speed; opts.slideCount = els.length; opts.currSlide = opts.lastSlide = first; if (opts.random) {
            opts.nextSlide = opts.currSlide; if (++opts.randomIndex ==
            els.length) opts.randomIndex = 0; opts.nextSlide = opts.randomMap[opts.randomIndex]
        } else opts.nextSlide = opts.startingSlide >= els.length - 1 ? 0 : opts.startingSlide + 1; if (!opts.multiFx) { var init = $.fn.cycle.transitions[opts.fx]; if ($.isFunction(init)) init($cont, $slides, opts); else if (opts.fx != "custom" && !opts.multiFx) { log("unknown transition: " + opts.fx, "; slideshow terminating"); return false } } var e0 = $slides[first]; if (opts.before.length) opts.before[0].apply(e0, [e0, e0, opts, true]); if (opts.after.length > 1) opts.after[1].apply(e0,
        [e0, e0, opts, true]); if (opts.next) $(opts.next).bind(opts.prevNextEvent, function () { return advance(opts, opts.rev ? -1 : 1) }); if (opts.prev) $(opts.prev).bind(opts.prevNextEvent, function () { return advance(opts, opts.rev ? 1 : -1) }); if (opts.pager) buildPager(els, opts); exposeAddSlide(opts, els); return opts
    } function saveOriginalOpts(opts) {
        opts.original = { before: [], after: [] }; opts.original.cssBefore = $.extend({}, opts.cssBefore); opts.original.cssAfter = $.extend({}, opts.cssAfter); opts.original.animIn = $.extend({}, opts.animIn);
        opts.original.animOut = $.extend({}, opts.animOut); $.each(opts.before, function () { opts.original.before.push(this) }); $.each(opts.after, function () { opts.original.after.push(this) })
    } function supportMultiTransitions(opts) {
        var i, tx, txs = $.fn.cycle.transitions; if (opts.fx.indexOf(",") > 0) {
            opts.multiFx = true; opts.fxs = opts.fx.replace(/\s*/g, "").split(","); for (i = 0; i < opts.fxs.length; i++) {
                var fx = opts.fxs[i]; tx = txs[fx]; if (!tx || !txs.hasOwnProperty(fx) || !$.isFunction(tx)) {
                    log("discarding unknown transition: ", fx); opts.fxs.splice(i,
                    1); i--
                }
            } if (!opts.fxs.length) { log("No valid transitions named; slideshow terminating."); return false }
        } else if (opts.fx == "all") { opts.multiFx = true; opts.fxs = []; for (p in txs) { tx = txs[p]; if (txs.hasOwnProperty(p) && $.isFunction(tx)) opts.fxs.push(p) } } if (opts.multiFx && opts.randomizeEffects) { var r1 = Math.floor(Math.random() * 20) + 30; for (i = 0; i < r1; i++) { var r2 = Math.floor(Math.random() * opts.fxs.length); opts.fxs.push(opts.fxs.splice(r2, 1)[0]) } debug("randomized fx sequence: ", opts.fxs) } return true
    } function exposeAddSlide(opts,
    els) {
        opts.addSlide = function (newSlide, prepend) {
            var $s = $(newSlide), s = $s[0]; if (!opts.autostopCount) opts.countdown++; els[prepend ? "unshift" : "push"](s); if (opts.els) opts.els[prepend ? "unshift" : "push"](s); opts.slideCount = els.length; $s.css("position", "absolute"); $s[prepend ? "prependTo" : "appendTo"](opts.$cont); if (prepend) { opts.currSlide++; opts.nextSlide++ } if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg) clearTypeFix($s); if (opts.fit && opts.width) $s.width(opts.width); if (opts.fit && opts.height && opts.height !=
            "auto") $slides.height(opts.height); s.cycleH = opts.fit && opts.height ? opts.height : $s.height(); s.cycleW = opts.fit && opts.width ? opts.width : $s.width(); $s.css(opts.cssBefore); if (opts.pager) $.fn.cycle.createPagerAnchor(els.length - 1, s, $(opts.pager), els, opts); if ($.isFunction(opts.onAddSlide)) opts.onAddSlide($s); else $s.hide()
        }
    } $.fn.cycle.resetState = function (opts, fx) {
        fx = fx || opts.fx; opts.before = []; opts.after = []; opts.cssBefore = $.extend({}, opts.original.cssBefore); opts.cssAfter = $.extend({}, opts.original.cssAfter);
        opts.animIn = $.extend({}, opts.original.animIn); opts.animOut = $.extend({}, opts.original.animOut); opts.fxFn = null; $.each(opts.original.before, function () { opts.before.push(this) }); $.each(opts.original.after, function () { opts.after.push(this) }); var init = $.fn.cycle.transitions[fx]; if ($.isFunction(init)) init(opts.$cont, $(opts.elements), opts)
    }; function go(els, opts, manual, fwd) {
        if (manual && opts.busy && opts.manualTrump) { $(els).stop(true, true); opts.busy = false } if (opts.busy) return; var p = opts.$cont[0], curr = els[opts.currSlide],
        next = els[opts.nextSlide]; if (p.cycleStop != opts.stopCount || p.cycleTimeout === 0 && !manual) return; if (!manual && !p.cyclePause && (opts.autostop && --opts.countdown <= 0 || opts.nowrap && !opts.random && opts.nextSlide < opts.currSlide)) { if (opts.end) opts.end(opts); return } if (manual || !p.cyclePause) {
            var fx = opts.fx; curr.cycleH = curr.cycleH || $(curr).height(); curr.cycleW = curr.cycleW || $(curr).width(); next.cycleH = next.cycleH || $(next).height(); next.cycleW = next.cycleW || $(next).width(); if (opts.multiFx) {
                if (opts.lastFx == undefined || ++opts.lastFx >=
                opts.fxs.length) opts.lastFx = 0; fx = opts.fxs[opts.lastFx]; opts.currFx = fx
            } if (opts.oneTimeFx) { fx = opts.oneTimeFx; opts.oneTimeFx = null } $.fn.cycle.resetState(opts, fx); if (opts.before.length) $.each(opts.before, function (i, o) { if (p.cycleStop != opts.stopCount) return; o.apply(next, [curr, next, opts, fwd]) }); var after = function () { $.each(opts.after, function (i, o) { if (p.cycleStop != opts.stopCount) return; o.apply(next, [curr, next, opts, fwd]) }) }; if (opts.nextSlide != opts.currSlide) {
                opts.busy = 1; if (opts.fxFn) opts.fxFn(curr, next, opts,
                after, fwd); else if ($.isFunction($.fn.cycle[opts.fx])) $.fn.cycle[opts.fx](curr, next, opts, after); else $.fn.cycle.custom(curr, next, opts, after, manual && opts.fastOnEvent)
            } opts.lastSlide = opts.currSlide; if (opts.random) { opts.currSlide = opts.nextSlide; if (++opts.randomIndex == els.length) opts.randomIndex = 0; opts.nextSlide = opts.randomMap[opts.randomIndex] } else { var roll = opts.nextSlide + 1 == els.length; opts.nextSlide = roll ? 0 : opts.nextSlide + 1; opts.currSlide = roll ? els.length - 1 : opts.nextSlide - 1 } if (opts.pager) $.fn.cycle.updateActivePagerLink(opts.pager,
            opts.currSlide)
        } var ms = 0; if (opts.timeout && !opts.continuous) ms = getTimeout(curr, next, opts, fwd); else if (opts.continuous && p.cyclePause) ms = 10; if (ms > 0) p.cycleTimeout = setTimeout(function () { go(els, opts, 0, !opts.rev) }, ms)
    } $.fn.cycle.updateActivePagerLink = function (pager, currSlide) {
        $(pager).each(function () {
            $(this).find("a").removeClass("activeSlide").filter("a:eq(" + currSlide + ")").addClass("activeSlide"); var attLink = $(this).find("a").filter("a:eq(" + currSlide + ")").attr("rel"); $("#banner_slide .slide_link a").replaceWith("<a href=" +
            attLink + ">&nbsp;</a>")
        })
    }; function getTimeout(curr, next, opts, fwd) { if (opts.timeoutFn) { var t = opts.timeoutFn(curr, next, opts, fwd); while (t - opts.speed < 250) t += opts.speed; debug("calculated timeout: " + t + "; speed: " + opts.speed); if (t !== false) return t } return opts.timeout } $.fn.cycle.next = function (opts) { advance(opts, opts.rev ? -1 : 1) }; $.fn.cycle.prev = function (opts) { advance(opts, opts.rev ? 1 : -1) }; function advance(opts, val) {
        var els = opts.elements; var p = opts.$cont[0], timeout = p.cycleTimeout; if (timeout) {
            clearTimeout(timeout);
            p.cycleTimeout = 0
        } if (opts.random && val < 0) { opts.randomIndex--; if (--opts.randomIndex == -2) opts.randomIndex = els.length - 2; else if (opts.randomIndex == -1) opts.randomIndex = els.length - 1; opts.nextSlide = opts.randomMap[opts.randomIndex] } else if (opts.random) { if (++opts.randomIndex == els.length) opts.randomIndex = 0; opts.nextSlide = opts.randomMap[opts.randomIndex] } else {
            opts.nextSlide = opts.currSlide + val; if (opts.nextSlide < 0) { if (opts.nowrap) return false; opts.nextSlide = els.length - 1 } else if (opts.nextSlide >= els.length) {
                if (opts.nowrap) return false;
                opts.nextSlide = 0
            }
        } if ($.isFunction(opts.prevNextClick)) opts.prevNextClick(val > 0, opts.nextSlide, els[opts.nextSlide]); go(els, opts, 1, val >= 0); return false
    } function buildPager(els, opts) { var $p = $(opts.pager); $.each(els, function (i, o) { $.fn.cycle.createPagerAnchor(i, o, $p, els, opts) }); $.fn.cycle.updateActivePagerLink(opts.pager, opts.startingSlide) } $.fn.cycle.createPagerAnchor = function (i, el, $p, els, opts) {
        var a; if ($.isFunction(opts.pagerAnchorBuilder)) a = opts.pagerAnchorBuilder(i, el); else a = '<a href="#">' + (i + 1) +
        "</a>"; if (!a) return; var $a = $(a); if ($a.parents("body").length === 0) { var arr = []; if ($p.length > 1) { $p.each(function () { var $clone = $a.clone(true); $(this).append($clone); arr.push($clone[0]) }); $a = $(arr) } else $a.appendTo($p) } $a.bind(opts.pagerEvent, function (e) { e.preventDefault(); opts.nextSlide = i; var p = opts.$cont[0], timeout = p.cycleTimeout; if (timeout) { clearTimeout(timeout); p.cycleTimeout = 0 } if ($.isFunction(opts.pagerClick)) opts.pagerClick(opts.nextSlide, els[opts.nextSlide]); go(els, opts, 1, opts.currSlide < i); return false });
        if (opts.pagerEvent != "click") $a.click(function () { return false }); if (opts.pauseOnPagerHover) $a.hover(function () { opts.$cont[0].cyclePause++ }, function () { opts.$cont[0].cyclePause-- })
    }; $.fn.cycle.hopsFromLast = function (opts, fwd) { var hops, l = opts.lastSlide, c = opts.currSlide; if (fwd) hops = c > l ? c - l : opts.slideCount - l; else hops = c < l ? l - c : l + opts.slideCount - c; return hops }; function clearTypeFix($slides) {
        function hex(s) { s = parseInt(s).toString(16); return s.length < 2 ? "0" + s : s } function getBg(e) {
            for (; e && e.nodeName.toLowerCase() !=
            "html"; e = e.parentNode) { var v = $.css(e, "background-color"); if (v.indexOf("rgb") >= 0) { var rgb = v.match(/\d+/g); return "#" + hex(rgb[0]) + hex(rgb[1]) + hex(rgb[2]) } if (v && v != "transparent") return v } return "#ffffff"
        } $slides.each(function () { $(this).css("background-color", getBg(this)) })
    } $.fn.cycle.commonReset = function (curr, next, opts, w, h, rev) {
        $(opts.elements).not(curr).hide(); opts.cssBefore.opacity = 1; opts.cssBefore.display = "block"; if (w !== false && next.cycleW > 0) opts.cssBefore.width = next.cycleW; if (h !== false && next.cycleH >
        0) opts.cssBefore.height = next.cycleH; opts.cssAfter = opts.cssAfter || {}; opts.cssAfter.display = "none"; $(curr).css("zIndex", opts.slideCount + (rev === true ? 1 : 0)); $(next).css("zIndex", opts.slideCount + (rev === true ? 0 : 1))
    }; $.fn.cycle.custom = function (curr, next, opts, cb, speedOverride) {
        var $l = $(curr), $n = $(next); var speedIn = opts.speedIn, speedOut = opts.speedOut, easeIn = opts.easeIn, easeOut = opts.easeOut; $n.css(opts.cssBefore); if (speedOverride) {
            if (typeof speedOverride == "number") speedIn = speedOut = speedOverride; else speedIn =
            speedOut = 1; easeIn = easeOut = null
        } var fn = function () { $n.animate(opts.animIn, speedIn, easeIn, cb) }; $l.animate(opts.animOut, speedOut, easeOut, function () { if (opts.cssAfter) $l.css(opts.cssAfter); if (!opts.sync) fn() }); if (opts.sync) fn()
    }; $.fn.cycle.transitions = {
        fade: function ($cont, $slides, opts) {
            $slides.not(":eq(" + opts.currSlide + ")").css("opacity", 0); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts); opts.cssBefore.opacity = 0 }); opts.animIn = { opacity: 1 }; opts.animOut = { opacity: 0 }; opts.cssBefore =
            { top: 0, left: 0 }
        }
    }; $.fn.cycle.ver = function () { return ver }; $.fn.cycle.defaults = {
        fx: "fade", timeout: 4E3, timeoutFn: null, continuous: 0, speed: 1E3, speedIn: null, speedOut: null, next: null, prev: null, prevNextClick: null, prevNextEvent: "click", pager: null, pagerClick: null, pagerEvent: "click", pagerAnchorBuilder: null, before: null, after: null, end: null, easing: null, easeIn: null, easeOut: null, shuffle: null, animIn: null, animOut: null, cssBefore: null, cssAfter: null, fxFn: null, height: "auto", startingSlide: 0, sync: 1, random: 0, fit: 0, containerResize: 1,
        pause: 0, pauseOnPagerHover: 0, autostop: 0, autostopCount: 0, delay: 0, slideExpr: null, cleartype: !$.support.opacity, cleartypeNoBg: false, nowrap: 0, fastOnEvent: 0, randomizeEffects: 1, rev: 0, manualTrump: true, requeueOnImageNotLoaded: true, requeueTimeout: 250
    }
})(jQuery);
(function ($) {
    $.fn.cycle.transitions.none = function ($cont, $slides, opts) { opts.fxFn = function (curr, next, opts, after) { $(next).show(); $(curr).hide(); after() } }; $.fn.cycle.transitions.scrollUp = function ($cont, $slides, opts) { $cont.css("overflow", "hidden"); opts.before.push($.fn.cycle.commonReset); var h = $cont.height(); opts.cssBefore = { top: h, left: 0 }; opts.cssFirst = { top: 0 }; opts.animIn = { top: 0 }; opts.animOut = { top: -h } }; $.fn.cycle.transitions.scrollDown = function ($cont, $slides, opts) {
        $cont.css("overflow", "hidden"); opts.before.push($.fn.cycle.commonReset);
        var h = $cont.height(); opts.cssFirst = { top: 0 }; opts.cssBefore = { top: -h, left: 0 }; opts.animIn = { top: 0 }; opts.animOut = { top: h }
    }; $.fn.cycle.transitions.scrollLeft = function ($cont, $slides, opts) { $cont.css("overflow", "hidden"); opts.before.push($.fn.cycle.commonReset); var w = $cont.width(); opts.cssFirst = { left: 0 }; opts.cssBefore = { left: w, top: 0 }; opts.animIn = { left: 0 }; opts.animOut = { left: 0 - w } }; $.fn.cycle.transitions.scrollRight = function ($cont, $slides, opts) {
        $cont.css("overflow", "hidden"); opts.before.push($.fn.cycle.commonReset);
        var w = $cont.width(); opts.cssFirst = { left: 0 }; opts.cssBefore = { left: -w, top: 0 }; opts.animIn = { left: 0 }; opts.animOut = { left: w }
    }; $.fn.cycle.transitions.scrollHorz = function ($cont, $slides, opts) { $cont.css("overflow", "hidden").width(); opts.before.push(function (curr, next, opts, fwd) { $.fn.cycle.commonReset(curr, next, opts); opts.cssBefore.left = fwd ? next.cycleW - 1 : 1 - next.cycleW; opts.animOut.left = fwd ? -curr.cycleW : curr.cycleW }); opts.cssFirst = { left: 0 }; opts.cssBefore = { top: 0 }; opts.animIn = { left: 0 }; opts.animOut = { top: 0 } }; $.fn.cycle.transitions.scrollVert =
    function ($cont, $slides, opts) { $cont.css("overflow", "hidden"); opts.before.push(function (curr, next, opts, fwd) { $.fn.cycle.commonReset(curr, next, opts); opts.cssBefore.top = fwd ? 1 - next.cycleH : next.cycleH - 1; opts.animOut.top = fwd ? curr.cycleH : -curr.cycleH }); opts.cssFirst = { top: 0 }; opts.cssBefore = { left: 0 }; opts.animIn = { top: 0 }; opts.animOut = { left: 0 } }; $.fn.cycle.transitions.slideX = function ($cont, $slides, opts) {
        opts.before.push(function (curr, next, opts) {
            $(opts.elements).not(curr).hide(); $.fn.cycle.commonReset(curr, next,
            opts, false, true); opts.animIn.width = next.cycleW
        }); opts.cssBefore = { left: 0, top: 0, width: 0 }; opts.animIn = { width: "show" }; opts.animOut = { width: 0 }
    }; $.fn.cycle.transitions.slideY = function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $(opts.elements).not(curr).hide(); $.fn.cycle.commonReset(curr, next, opts, true, false); opts.animIn.height = next.cycleH }); opts.cssBefore = { left: 0, top: 0, height: 0 }; opts.animIn = { height: "show" }; opts.animOut = { height: 0 } }; $.fn.cycle.transitions.shuffle = function ($cont, $slides,
    opts) {
        var i, w = $cont.css("overflow", "visible").width(); $slides.css({ left: 0, top: 0 }); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, true, true, true) }); if (!opts.speedAdjusted) { opts.speed = opts.speed / 2; opts.speedAdjusted = true } opts.random = 0; opts.shuffle = opts.shuffle || { left: -w, top: 15 }; opts.els = []; for (i = 0; i < $slides.length; i++) opts.els.push($slides[i]); for (i = 0; i < opts.currSlide; i++) opts.els.push(opts.els.shift()); opts.fxFn = function (curr, next, opts, cb, fwd) {
            var $el = fwd ? $(curr) : $(next);
            $(next).css(opts.cssBefore); var count = opts.slideCount; $el.animate(opts.shuffle, opts.speedIn, opts.easeIn, function () {
                var hops = $.fn.cycle.hopsFromLast(opts, fwd); for (var k = 0; k < hops; k++) fwd ? opts.els.push(opts.els.shift()) : opts.els.unshift(opts.els.pop()); if (fwd) for (var i = 0, len = opts.els.length; i < len; i++) $(opts.els[i]).css("z-index", len - i + count); else { var z = $(curr).css("z-index"); $el.css("z-index", parseInt(z) + 1 + count) } $el.animate({ left: 0, top: 0 }, opts.speedOut, opts.easeOut, function () {
                    $(fwd ? this : curr).hide();
                    if (cb) cb()
                })
            })
        }; opts.cssBefore = { display: "block", opacity: 1, top: 0, left: 0 }
    }; $.fn.cycle.transitions.turnUp = function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, true, false); opts.cssBefore.top = next.cycleH; opts.animIn.height = next.cycleH }); opts.cssFirst = { top: 0 }; opts.cssBefore = { left: 0, height: 0 }; opts.animIn = { top: 0 }; opts.animOut = { height: 0 } }; $.fn.cycle.transitions.turnDown = function ($cont, $slides, opts) {
        opts.before.push(function (curr, next, opts) {
            $.fn.cycle.commonReset(curr,
            next, opts, true, false); opts.animIn.height = next.cycleH; opts.animOut.top = curr.cycleH
        }); opts.cssFirst = { top: 0 }; opts.cssBefore = { left: 0, top: 0, height: 0 }; opts.animOut = { height: 0 }
    }; $.fn.cycle.transitions.turnLeft = function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, false, true); opts.cssBefore.left = next.cycleW; opts.animIn.width = next.cycleW }); opts.cssBefore = { top: 0, width: 0 }; opts.animIn = { left: 0 }; opts.animOut = { width: 0 } }; $.fn.cycle.transitions.turnRight = function ($cont,
    $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, false, true); opts.animIn.width = next.cycleW; opts.animOut.left = curr.cycleW }); opts.cssBefore = { top: 0, left: 0, width: 0 }; opts.animIn = { left: 0 }; opts.animOut = { width: 0 } }; $.fn.cycle.transitions.zoom = function ($cont, $slides, opts) {
        opts.before.push(function (curr, next, opts) {
            $.fn.cycle.commonReset(curr, next, opts, false, false, true); opts.cssBefore.top = next.cycleH / 2; opts.cssBefore.left = next.cycleW / 2; opts.animIn = {
                top: 0, left: 0, width: next.cycleW,
                height: next.cycleH
            }; opts.animOut = { width: 0, height: 0, top: curr.cycleH / 2, left: curr.cycleW / 2 }
        }); opts.cssFirst = { top: 0, left: 0 }; opts.cssBefore = { width: 0, height: 0 }
    }; $.fn.cycle.transitions.fadeZoom = function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, false, false); opts.cssBefore.left = next.cycleW / 2; opts.cssBefore.top = next.cycleH / 2; opts.animIn = { top: 0, left: 0, width: next.cycleW, height: next.cycleH } }); opts.cssBefore = { width: 0, height: 0 }; opts.animOut = { opacity: 0 } };
    $.fn.cycle.transitions.blindX = function ($cont, $slides, opts) { var w = $cont.css("overflow", "hidden").width(); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts); opts.animIn.width = next.cycleW; opts.animOut.left = curr.cycleW }); opts.cssBefore = { left: w, top: 0 }; opts.animIn = { left: 0 }; opts.animOut = { left: w } }; $.fn.cycle.transitions.blindY = function ($cont, $slides, opts) {
        var h = $cont.css("overflow", "hidden").height(); opts.before.push(function (curr, next, opts) {
            $.fn.cycle.commonReset(curr, next,
            opts); opts.animIn.height = next.cycleH; opts.animOut.top = curr.cycleH
        }); opts.cssBefore = { top: h, left: 0 }; opts.animIn = { top: 0 }; opts.animOut = { top: h }
    }; $.fn.cycle.transitions.blindZ = function ($cont, $slides, opts) { var h = $cont.css("overflow", "hidden").height(); var w = $cont.width(); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts); opts.animIn.height = next.cycleH; opts.animOut.top = curr.cycleH }); opts.cssBefore = { top: h, left: w }; opts.animIn = { top: 0, left: 0 }; opts.animOut = { top: h, left: w } }; $.fn.cycle.transitions.growX =
    function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, false, true); opts.cssBefore.left = this.cycleW / 2; opts.animIn = { left: 0, width: this.cycleW }; opts.animOut = { left: 0 } }); opts.cssBefore = { width: 0, top: 0 } }; $.fn.cycle.transitions.growY = function ($cont, $slides, opts) {
        opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, true, false); opts.cssBefore.top = this.cycleH / 2; opts.animIn = { top: 0, height: this.cycleH }; opts.animOut = { top: 0 } }); opts.cssBefore =
        { height: 0, left: 0 }
    }; $.fn.cycle.transitions.curtainX = function ($cont, $slides, opts) { opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, false, true, true); opts.cssBefore.left = next.cycleW / 2; opts.animIn = { left: 0, width: this.cycleW }; opts.animOut = { left: curr.cycleW / 2, width: 0 } }); opts.cssBefore = { top: 0, width: 0 } }; $.fn.cycle.transitions.curtainY = function ($cont, $slides, opts) {
        opts.before.push(function (curr, next, opts) {
            $.fn.cycle.commonReset(curr, next, opts, true, false, true); opts.cssBefore.top =
            next.cycleH / 2; opts.animIn = { top: 0, height: next.cycleH }; opts.animOut = { top: curr.cycleH / 2, height: 0 }
        }); opts.cssBefore = { left: 0, height: 0 }
    }; $.fn.cycle.transitions.cover = function ($cont, $slides, opts) {
        var d = opts.direction || "left"; var w = $cont.css("overflow", "hidden").width(); var h = $cont.height(); opts.before.push(function (curr, next, opts) {
            $.fn.cycle.commonReset(curr, next, opts); if (d == "right") opts.cssBefore.left = -w; else if (d == "up") opts.cssBefore.top = h; else if (d == "down") opts.cssBefore.top = -h; else opts.cssBefore.left =
            w
        }); opts.animIn = { left: 0, top: 0 }; opts.animOut = { opacity: 1 }; opts.cssBefore = { top: 0, left: 0 }
    }; $.fn.cycle.transitions.uncover = function ($cont, $slides, opts) {
        var d = opts.direction || "left"; var w = $cont.css("overflow", "hidden").width(); var h = $cont.height(); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, true, true, true); if (d == "right") opts.animOut.left = w; else if (d == "up") opts.animOut.top = -h; else if (d == "down") opts.animOut.top = h; else opts.animOut.left = -w }); opts.animIn = { left: 0, top: 0 }; opts.animOut =
        { opacity: 1 }; opts.cssBefore = { top: 0, left: 0 }
    }; $.fn.cycle.transitions.toss = function ($cont, $slides, opts) { var w = $cont.css("overflow", "visible").width(); var h = $cont.height(); opts.before.push(function (curr, next, opts) { $.fn.cycle.commonReset(curr, next, opts, true, true, true); if (!opts.animOut.left && !opts.animOut.top) opts.animOut = { left: w * 2, top: -h / 2, opacity: 0 }; else opts.animOut.opacity = 0 }); opts.cssBefore = { left: 0, top: 0 }; opts.animIn = { left: 0 } }; $.fn.cycle.transitions.wipe = function ($cont, $slides, opts) {
        var w = $cont.css("overflow",
        "hidden").width(); var h = $cont.height(); opts.cssBefore = opts.cssBefore || {}; var clip; if (opts.clip) if (/l2r/.test(opts.clip)) clip = "rect(0px 0px " + h + "px 0px)"; else if (/r2l/.test(opts.clip)) clip = "rect(0px " + w + "px " + h + "px " + w + "px)"; else if (/t2b/.test(opts.clip)) clip = "rect(0px " + w + "px 0px 0px)"; else if (/b2t/.test(opts.clip)) clip = "rect(" + h + "px " + w + "px " + h + "px 0px)"; else if (/zoom/.test(opts.clip)) { var top = parseInt(h / 2); var left = parseInt(w / 2); clip = "rect(" + top + "px " + left + "px " + top + "px " + left + "px)" } opts.cssBefore.clip =
        opts.cssBefore.clip || clip || "rect(0px 0px 0px 0px)"; var d = opts.cssBefore.clip.match(/(\d+)/g); var t = parseInt(d[0]), r = parseInt(d[1]), b = parseInt(d[2]), l = parseInt(d[3]); opts.before.push(function (curr, next, opts) {
            if (curr == next) return; var $curr = $(curr), $next = $(next); $.fn.cycle.commonReset(curr, next, opts, true, true, false); opts.cssAfter.display = "block"; var step = 1, count = parseInt(opts.speedIn / 13) - 1; (function f() {
                var tt = t ? t - parseInt(step * (t / count)) : 0; var ll = l ? l - parseInt(step * (l / count)) : 0; var bb = b < h ? b + parseInt(step *
                ((h - b) / count || 1)) : h; var rr = r < w ? r + parseInt(step * ((w - r) / count || 1)) : w; $next.css({ clip: "rect(" + tt + "px " + rr + "px " + bb + "px " + ll + "px)" }); step++ <= count ? setTimeout(f, 13) : $curr.css("display", "none")
            })()
        }); opts.cssBefore = { display: "block", opacity: 1, top: 0, left: 0 }; opts.animIn = { left: 0 }; opts.animOut = { left: 0 }
    }
})(jQuery);
(function ($) {
    $.fn.loopedSlider = function (options) {
        var defaults = { container: ".container", slides: ".slides", pagination: ".pagination_slide", containerClick: false, autoStart: 0, slidespeed: 300, fadespeed: 300, autoHeight: false }; this.each(function () {
            var obj = $(this); var o = $.extend(defaults, options); var pagination = $(o.pagination + " li a", obj); var m = 0; var t = 1; var s = $(o.slides, obj).children().size(); var w = $(o.slides, obj).children().outerWidth(); var p = 0; var u = false; var n = 0; $(o.slides, obj).css({ width: s * w }); $(o.slides,
            obj).children().each(function () { $(this).css({ position: "absolute", left: p, display: "block" }); p = p + w }); $(pagination, obj).each(function () { n = n + 1; $(this).attr("rel", n); $(pagination.eq(0), obj).parent().addClass("active") }); $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({ position: "absolute", left: -w }); $(o.slides, obj).children(":eq(" + 0 + ")").css({ position: "absolute", left: 0 }); if (o.autoHeight) autoHeight(t); $(".next", obj).click(function () { if (u === false) { animate("next", true); if (o.autoStart) clearInterval(sliderIntervalID) } return false });
            $(".previous", obj).click(function () { if (u === false) { animate("prev", true); if (o.autoStart) clearInterval(sliderIntervalID) } return false }); if (o.containerClick) $(o.container, obj).click(function () { if (u === false) { animate("next", true); if (o.autoStart) clearInterval(sliderIntervalID) } return false }); $(pagination, obj).click(function () {
                if ($(this).parent().hasClass("active")) return false; else {
                    t = $(this).attr("rel"); $(pagination, obj).parent().siblings().removeClass("active"); $(this).parent().addClass("active"); animate("fade",
                    t); if (o.autoStart) clearInterval(sliderIntervalID)
                } return false
            }); if (o.autoStart) sliderIntervalID = setInterval(function () { if (u === false) animate("next", true) }, o.autoStart); function current(t) { if (t === s + 1) t = 1; if (t === 0) t = s; $(pagination, obj).parent().siblings().removeClass("active"); $(pagination + '[rel="' + t + '"]', obj).parent().addClass("active") } function autoHeight(t) {
                if (t === s + 1) t = 1; if (t === 0) t = s; var getHeight = $(o.slides, obj).children(":eq(" + (t - 1) + ")", obj).outerHeight(); $(o.container, obj).animate({
                    height: getHeight +
                    20
                }, o.autoHeight)
            } function animate(dir, clicked) {
                u = true; switch (dir) {
                    case "next": t = t + 1; m = -(t * w - w); current(t); if (o.autoHeight) autoHeight(t); $(o.slides, obj).animate({ left: m }, o.slidespeed, function () {
                        if (t === s + 1) { t = 1; $(o.slides, obj).css({ left: 0 }, function () { $(o.slides, obj).animate({ left: m }) }); $(o.slides, obj).children(":eq(0)").css({ left: 0 }); $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({ position: "absolute", left: -w }) } if (t === s) $(o.slides, obj).children(":eq(0)").css({ left: s * w }); if (t === s - 1) $(o.slides, obj).children(":eq(" +
                        (s - 1) + ")").css({ left: s * w - w }); u = false
                    }); break; case "prev": t = t - 1; m = -(t * w - w); current(t); if (o.autoHeight) autoHeight(t); $(o.slides, obj).animate({ left: m }, o.slidespeed, function () {
                        if (t === 0) { t = s; $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({ position: "absolute", left: s * w - w }); $(o.slides, obj).css({ left: -(s * w - w) }); $(o.slides, obj).children(":eq(0)").css({ left: s * w }) } if (t === 2) $(o.slides, obj).children(":eq(0)").css({ position: "absolute", left: 0 }); if (t === 1) $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({
                            position: "absolute",
                            left: -w
                        }); u = false
                    }); break; case "fade": t = [t] * 1; m = -(t * w - w); current(t); if (o.autoHeight) autoHeight(t); $(o.slides, obj).children().fadeOut(o.fadespeed, function () { $(o.slides, obj).css({ left: m }); $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({ left: s * w - w }); $(o.slides, obj).children(":eq(0)").css({ left: 0 }); if (t === s) $(o.slides, obj).children(":eq(0)").css({ left: s * w }); if (t === 1) $(o.slides, obj).children(":eq(" + (s - 1) + ")").css({ position: "absolute", left: -w }); $(o.slides, obj).children().fadeIn(o.fadespeed); u = false }); break;
                    default: break
                }
            }
        })
    }
})(jQuery);
eval(function (p, a, c, k, e, r) { e = function (c) { return (c < a ? "" : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!"".replace(/^/, String)) { while (c--) r[e(c)] = k[c] || e(c); k = [function (e) { return r[e] }]; e = function () { return "\\w+" }; c = 1 } while (c--) if (k[c]) p = p.replace(new RegExp("\\b" + e(c) + "\\b", "g"), k[c]); return p }('7(F 3v.2K!=="9"){3v.2K=9(e){9 t(){}t.5C=e;q 5B t}}(9(e,t,n,r){b i={1K:9(t,n){b r=c;r.6=e.3F({},e.3g.28.6,t);r.27=t;b i=n;b s=e(n);r.$k=s;r.3G()},3G:9(){b t=c;7(F t.6.2Y==="9"){t.6.2Y.U(c,[t.$k])}7(F t.6.38==="3a"){b n=t.6.38;9 r(e){7(F t.6.3d==="9"){t.6.3d.U(c,[e])}p{b n="";1Z(b r 3x e["h"]){n+=e["h"][r]["1W"]}t.$k.29(n)}t.2R()}e.5w(n,r)}p{t.2R()}},2R:9(e){b t=c;t.$k.A({23:0});t.2n=t.6.v;t.3M();t.5p=0;t.21;t.1L()},1L:9(){b e=c;7(e.$k.1Q().14===0){q d}e.1M();e.3T();e.$V=e.$k.1Q();e.J=e.$V.14;e.3Z();e.$L=e.$k.Z(".h-1W");e.$H=e.$k.Z(".h-1g");e.3e="R";e.1i=0;e.m=0;e.40();e.42()},42:9(){b e=c;e.2H();e.2I();e.4c();e.2L();e.4e();e.4f();e.22();e.4l();7(e.6.2j!==d){e.4o(e.6.2j)}7(e.6.N===j){e.6.N=4I}e.1b();e.$k.Z(".h-1g").A("4D","4E");7(!e.$k.2x(":32")){e.37()}p{e.$k.A("23",1)}e.5j=d;e.2l();7(F e.6.3b==="9"){e.6.3b.U(c,[e.$k])}},2l:9(){b e=c;7(e.6.1J===j){e.1J()}7(e.6.1q===j){e.1q()}7(e.6.2g===j){e.2g()}7(F e.6.3i==="9"){e.6.3i.U(c,[e.$k])}},3j:9(){b e=c;7(F e.6.3l==="9"){e.6.3l.U(c,[e.$k])}e.37();e.2H();e.2I();e.4C();e.2L();e.2l();7(F e.6.3o==="9"){e.6.3o.U(c,[e.$k])}},4B:9(e){b t=c;19(9(){t.3j()},0)},37:9(){b e=c;7(e.$k.2x(":32")===d){e.$k.A({23:0});1a(e.1u);1a(e.21)}p{q d}e.21=4z(9(){7(e.$k.2x(":32")){e.4B();e.$k.4y({23:1},2E);1a(e.21)}},4J)},3Z:9(){b e=c;e.$V.4U(\'<M K="h-1g">\').4u(\'<M K="h-1W"></M>\');e.$k.Z(".h-1g").4u(\'<M K="h-1g-4t">\');e.1D=e.$k.Z(".h-1g-4t");e.$k.A("4D","4E")},1M:9(){b e=c;b t=e.$k.1H(e.6.1M);b n=e.$k.1H(e.6.24);e.$k.w("h-4s",e.$k.2c("2d")).w("h-4r",e.$k.2c("K"));7(!t){e.$k.I(e.6.1M)}7(!n){e.$k.I(e.6.24)}},2H:9(){b t=c;7(t.6.2V===d){q d}7(t.6.4q===j){t.6.v=t.2n=1;t.6.1v=d;t.6.1I=d;t.6.1X=d;t.6.1A=d;t.6.1E=d;q d}b n=e(t.6.4p).1h();7(n>(t.6.1v[0]||t.2n)){t.6.v=t.2n}7(n<=t.6.1v[0]&&t.6.1v!==d){t.6.v=t.6.1v[1]}7(n<=t.6.1I[0]&&t.6.1I!==d){t.6.v=t.6.1I[1]}7(n<=t.6.1X[0]&&t.6.1X!==d){t.6.v=t.6.1X[1]}7(n<=t.6.1A[0]&&t.6.1A!==d){t.6.v=t.6.1A[1]}7(n<=t.6.1E[0]&&t.6.1E!==d){t.6.v=t.6.1E[1]}7(t.6.v>t.J){t.6.v=t.J}},4e:9(){b n=c,r;7(n.6.2V!==j){q d}b i=e(t).1h();n.33=9(){7(e(t).1h()!==i){7(n.6.N!==d){1a(n.1u)}4V(r);r=19(9(){i=e(t).1h();n.3j()},n.6.4n)}};e(t).4m(n.33)},4C:9(){b e=c;7(e.B.1j===j){7(e.D[e.m]>e.2a){e.1k(e.D[e.m])}p{e.1k(0);e.m=0}}p{7(e.D[e.m]>e.2a){e.16(e.D[e.m])}p{e.16(0);e.m=0}}7(e.6.N!==d){e.3f()}},4i:9(){b t=c;b n=0;b r=t.J-t.6.v;t.$L.2h(9(i){b s=e(c);s.A({1h:t.P}).w("h-1W",3k(i));7(i%t.6.v===0||i===r){7(!(i>r)){n+=1}}s.w("h-2y",n)})},4h:9(){b e=c;b t=0;b t=e.$L.14*e.P;e.$H.A({1h:t*2,X:0});e.4i()},2I:9(){b e=c;e.4g();e.4h();e.4b();e.3t()},4g:9(){b e=c;e.P=1P.57(e.$k.1h()/e.6.v)},3t:9(){b e=c;e.E=e.J-e.6.v;b t=e.J*e.P-e.6.v*e.P;t=t*-1;e.2a=t;q t},47:9(){q 0},4b:9(){b e=c;e.D=[0];b t=0;1Z(b n=0;n<e.J;n++){t+=e.P;e.D.58(-t)}},4c:9(){b t=c;7(t.6.25===j||t.6.1t===j){t.G=e(\'<M K="h-59"/>\').5a("5b",!t.B.Y).5d(t.$k)}7(t.6.1t===j){t.3V()}7(t.6.25===j){t.3R()}},3R:9(){b t=c;b n=e(\'<M K="h-5l"/>\');t.G.1e(n);t.1s=e("<M/>",{"K":"h-1o",29:t.6.2P[0]||""});t.1z=e("<M/>",{"K":"h-R",29:t.6.2P[1]||""});n.1e(t.1s).1e(t.1z);n.z("2s.G 2u.G",\'M[K^="h"]\',9(n){n.1r();7(e(c).1H("h-R")){t.R()}p{t.1o()}})},3V:9(){b t=c;t.1p=e(\'<M K="h-1t"/>\');t.G.1e(t.1p);t.1p.z("2s.G 2u.G",".h-1n",9(n){n.1r();7(3k(e(c).w("h-1n"))!==t.m){t.1m(3k(e(c).w("h-1n")),j)}})},3J:9(){b t=c;7(t.6.1t===d){q d}t.1p.29("");b n=0;b r=t.J-t.J%t.6.v;1Z(b i=0;i<t.J;i++){7(i%t.6.v===0){n+=1;7(r===i){b s=t.J-t.6.v}b o=e("<M/>",{"K":"h-1n"});b u=e("<3H></3H>",{5x:t.6.31===j?n:"","K":t.6.31===j?"h-5y":""});o.1e(u);o.w("h-1n",r===i?s:i);o.w("h-2y",n);t.1p.1e(o)}}t.2O()},2O:9(){b t=c;7(t.6.1t===d){q d}t.1p.Z(".h-1n").2h(9(n,r){7(e(c).w("h-2y")===e(t.$L[t.m]).w("h-2y")){t.1p.Z(".h-1n").S("2e");e(c).I("2e")}})},36:9(){b e=c;7(e.6.25===d){q d}7(e.6.2f===d){7(e.m===0&&e.E===0){e.1s.I("15");e.1z.I("15")}p 7(e.m===0&&e.E!==0){e.1s.I("15");e.1z.S("15")}p 7(e.m===e.E){e.1s.S("15");e.1z.I("15")}p 7(e.m!==0&&e.m!==e.E){e.1s.S("15");e.1z.S("15")}}},2L:9(){b e=c;e.3J();e.36();7(e.G){7(e.6.v===e.J){e.G.3E()}p{e.G.3B()}}},5A:9(){b e=c;7(e.G){e.G.3c()}},R:9(e){b t=c;7(t.1S){q d}t.1T=t.m;t.m+=t.6.1U===j?t.6.v:1;7(t.m>t.E+(t.6.1U==j?t.6.v-1:0)){7(t.6.2f===j){t.m=0;e="2m"}p{t.m=t.E;q d}}t.1m(t.m,e)},1o:9(e){b t=c;7(t.1S){q d}t.1T=t.m;7(t.6.1U===j&&t.m>0&&t.m<t.6.v){t.m=0}p{t.m-=t.6.1U===j?t.6.v:1}7(t.m<0){7(t.6.2f===j){t.m=t.E;e="2m"}p{t.m=0;q d}}t.1m(t.m,e)},1m:9(e,t,n){b r=c;7(r.1S){q d}r.3h();7(F r.6.1V==="9"){r.6.1V.U(c,[r.$k])}7(e>=r.E){e=r.E}p 7(e<=0){e=0}r.m=r.h.m=e;7(r.6.2j!==d&&n!=="4w"&&r.6.v===1&&r.B.1j===j){r.1x(0);7(r.B.1j===j){r.1k(r.D[e])}p{r.16(r.D[e],1)}r.3z();r.2q();q d}b i=r.D[e];7(r.B.1j===j){r.1Y=d;7(t===j){r.1x("1y");19(9(){r.1Y=j},r.6.1y)}p 7(t==="2m"){r.1x(r.6.2t);19(9(){r.1Y=j},r.6.2t)}p{r.1x("1f");19(9(){r.1Y=j},r.6.1f)}r.1k(i)}p{7(t===j){r.16(i,r.6.1y)}p 7(t==="2m"){r.16(i,r.6.2t)}p{r.16(i,r.6.1f)}}r.2q()},3h:9(){b e=c;e.1i=e.h.1i=e.1T===r?e.m:e.1T;e.1T=r},3r:9(e){b t=c;t.3h();7(F t.6.1V==="9"){t.6.1V.U(c,[t.$k])}7(e>=t.E||e===-1){e=t.E}p 7(e<=0){e=0}t.1x(0);7(t.B.1j===j){t.1k(t.D[e])}p{t.16(t.D[e],1)}t.m=t.h.m=e;t.2q()},2q:9(){b e=c;e.2O();e.36();e.2l();7(F e.6.3s==="9"){e.6.3s.U(c,[e.$k])}7(e.6.N!==d){e.3f()}},W:9(){b e=c;e.3u="W";1a(e.1u)},3f:9(){b e=c;7(e.3u!=="W"){e.1b()}},1b:9(){b e=c;e.3u="1b";7(e.6.N===d){q d}1a(e.1u);e.1u=4z(9(){e.R(j)},e.6.N)},1x:9(e){b t=c;7(e==="1f"){t.$H.A(t.2w(t.6.1f))}p 7(e==="1y"){t.$H.A(t.2w(t.6.1y))}p 7(F e!=="3a"){t.$H.A(t.2w(e))}},2w:9(e){b t=c;q{"-1G-1d":"2p "+e+"1w 2i","-1R-1d":"2p "+e+"1w 2i","-o-1d":"2p "+e+"1w 2i",1d:"2p "+e+"1w 2i"}},3C:9(){q{"-1G-1d":"","-1R-1d":"","-o-1d":"",1d:""}},3D:9(e){q{"-1G-O":"1l("+e+"T, C, C)","-1R-O":"1l("+e+"T, C, C)","-o-O":"1l("+e+"T, C, C)","-1w-O":"1l("+e+"T, C, C)",O:"1l("+e+"T, C,C)"}},1k:9(e){b t=c;t.$H.A(t.3D(e))},3I:9(e){b t=c;t.$H.A({X:e})},16:9(e,t){b n=c;n.26=d;n.$H.W(j,j).4y({X:e},{5r:t||n.6.1f,3L:9(){n.26=j}})},3M:9(){b e=c;b r="1l(C, C, C)",i=n.5q("M");i.2d.3N="  -1R-O:"+r+"; -1w-O:"+r+"; -o-O:"+r+"; -1G-O:"+r+"; O:"+r;b s=/1l\\(C, C, C\\)/g,o=i.2d.3N.5n(s),u=o!==18&&o.14===1;b a="4F"3x t||5h.5e;e.B={1j:u,Y:a}},4f:9(){b e=c;7(e.6.1C!==d||e.6.1B!==d){e.3X();e.3Y()}},3T:9(){b e=c;b t=["s","e","x"];e.13={};7(e.6.1C===j&&e.6.1B===j){t=["41.h 2b.h","2A.h 44.h","2s.h 45.h 2u.h"]}p 7(e.6.1C===d&&e.6.1B===j){t=["41.h","2A.h","2s.h 45.h"]}p 7(e.6.1C===j&&e.6.1B===d){t=["2b.h","44.h","2u.h"]}e.13["46"]=t[0];e.13["2z"]=t[1];e.13["3w"]=t[2]},3Y:9(){b t=c;t.$k.z("55.h",9(e){e.1r()});t.$k.z("2b.4a",9(t){q e(t.1c).2x("54, 52, 51, 4Y")})},3X:9(){9 o(e){7(e.3p){q{x:e.3p[0].3m,y:e.3p[0].4j}}p{7(e.3m!==r){q{x:e.3m,y:e.4j}}p{q{x:e.4X,y:e.4W}}}}9 u(t){7(t==="z"){e(n).z(i.13["2z"],f);e(n).z(i.13["3w"],l)}p 7(t==="Q"){e(n).Q(i.13["2z"]);e(n).Q(i.13["3w"])}}9 a(n){b n=n.35||n||t.34;7(i.26===d&&!i.6.30){q d}7(i.1Y===d&&!i.6.30){q d}7(i.6.N!==d){1a(i.1u)}7(i.B.Y!==j&&!i.$H.1H("2W")){i.$H.I("2W")}i.11=0;i.12=0;e(c).A(i.3C());b r=e(c).2k();s.2J=r.X;s.2G=o(n).x-r.X;s.2F=o(n).y-r.4H;u("z");s.2o=d;s.2C=n.1c||n.4A}9 f(r){b r=r.35||r||t.34;i.11=o(r).x-s.2G;i.3q=o(r).y-s.2F;i.12=i.11-s.2J;7(F i.6.3n==="9"&&s.39!==j&&i.12!==0){s.39=j;i.6.3n.U(c)}7(i.12>8||i.12<-8&&i.B.Y===j){r.1r?r.1r():r.4G=d;s.2o=j}7((i.3q>10||i.3q<-10)&&s.2o===d){e(n).Q("2A.h")}b u=9(){q i.12/5};b a=9(){q i.2a+i.12/5};i.11=1P.3t(1P.47(i.11,u()),a());7(i.B.1j===j){i.1k(i.11)}p{i.3I(i.11)}}9 l(n){b n=n.35||n||t.34;n.1c=n.1c||n.4A;s.39=d;7(i.B.Y!==j){i.$H.S("2W")}7(i.12!==0){b r=i.4x();i.1m(r,d,"4w");7(s.2C===n.1c&&i.B.Y!==j){e(n.1c).z("2X.3y",9(t){t.4K();t.4L();t.1r();e(n.1c).Q("2X.3y")});b o=e.4M(n.1c,"4N")["2X"];b a=o.4O();o.4P(0,0,a)}}u("Q")}b i=c;b s={2G:0,2F:0,4Q:0,2J:0,2k:18,4R:18,4S:18,2o:18,4T:18,2C:18};i.26=j;i.$k.z(i.13["46"],".h-1g",a)},4x:9(){b e=c,t;b t=e.4v();7(t>e.E){e.m=e.E;t=e.E}p 7(e.11>=0){t=0;e.m=0}q t},4v:9(){b t=c;b n=t.D;b r=t.11;b i=18;e.2h(n,9(e,s){7(r-t.P/20>n[e+1]&&r-t.P/20<s&&t.2Q()==="X"){i=s;t.m=e}p 7(r+t.P/20<s&&r+t.P/20>n[e+1]&&t.2Q()==="4k"){i=n[e+1];t.m=e+1}});q t.m},2Q:9(){b e=c,t;7(e.12<0){t="4k";e.3e="R"}p{t="X";e.3e="1o"}q t},40:9(){b e=c;e.$k.z("h.R",9(){e.R()});e.$k.z("h.1o",9(){e.1o()});e.$k.z("h.1b",9(t,n){e.6.N=n;e.1b();e.2N="1b"});e.$k.z("h.W",9(){e.W();e.2N="W"});e.$k.z("h.1m",9(t,n){e.1m(n)});e.$k.z("h.3r",9(t,n){e.3r(n)})},22:9(){b e=c;7(e.6.22===j&&e.B.Y!==j&&e.6.N!==d){e.$k.z("4Z",9(){e.W()});e.$k.z("50",9(){7(e.2N!=="W"){e.1b()}})}},1J:9(){b t=c;7(t.6.1J===d){q d}1Z(b n=0;n<t.J;n++){b i=e(t.$L[n]);7(i.w("h-17")==="17"){4d}b s=i.w("h-1W"),o=i.Z(".53"),u;7(F o.w("2r")!=="3a"){i.w("h-17","17");4d}7(i.w("h-17")===r){o.3E();i.I("49").w("h-17","56")}7(t.6.48===j){u=s>=t.m}p{u=j}7(u&&s<t.m+t.6.v&&o.14){t.43(i,o)}}},43:9(e,t){9 i(){r+=1;7(n.2D(t.2B(0))){s()}p 7(r<=2v){19(i,2v)}p{s()}}9 s(){e.w("h-17","17").S("49");t.5c("w-2r");n.6.3W==="3U"?t.5f(5g):t.3B()}b n=c,r=0;t[0].2r=t.w("2r");i()},1q:9(){9 s(){i+=1;7(t.2D(n.2B(0))){o()}p 7(i<=2v){19(s,2v)}p{t.1D.A("2S","")}}9 o(){b n=e(t.$L[t.m]).2S();t.1D.A("2S",n+"T");7(!t.1D.1H("1q")){19(9(){t.1D.I("1q")},0)}}b t=c;b n=e(t.$L[t.m]).Z("5i");7(n.2B(0)!==r){b i=0;s()}p{o()}},2D:9(e){7(!e.3L){q d}7(F e.3S!=="5k"&&e.3S==0){q d}q j},2g:9(){b t=c;t.$L.S("2e");1Z(b n=t.m;n<t.m+t.6.v;n++){e(t.$L[n]).I("2e")}},4o:9(e){b t=c;t.3Q="h-"+e+"-5m";t.3P="h-"+e+"-3x"},3z:9(){9 u(e,t){q{2k:"5o",X:e+"T"}}b e=c;e.1S=j;b t=e.3Q,n=e.3P,r=e.$L.1O(e.m),i=e.$L.1O(e.1i),s=1P.3O(e.D[e.m])+e.D[e.1i],o=1P.3O(e.D[e.m])+e.P/2;e.$H.I("h-1F").A({"-1G-O-1F":o+"T","-1R-3K-1F":o+"T","3K-1F":o+"T"});b a="5s 5t 5u 5v";i.A(u(s,10)).I(t).z(a,9(){e.2T=j;i.Q(a);e.2U(i,t)});r.I(n).z(a,9(){e.2Z=j;r.Q(a);e.2U(r,n)})},2U:9(e,t){b n=c;e.A({2k:"",X:""}).S(t);7(n.2T&&n.2Z){n.$H.S("h-1F");n.2T=d;n.2Z=d;n.1S=d}},4l:9(){b e=c;e.h={27:e.27,5z:e.$k,V:e.$V,L:e.$L,m:e.m,1i:e.1i,Y:e.B.Y,B:e.B}},3A:9(){b r=c;r.$k.Q(".h h 2b.4a");e(n).Q(".h h");e(t).Q("4m",r.33)},1N:9(){b e=c;7(e.$k.1Q().14!==0){e.$H.2M();e.$V.2M().2M();7(e.G){e.G.3c()}}e.3A();e.$k.2c("2d",e.$k.w("h-4s")||"").2c("K",e.$k.w("h-4r"))},5D:9(){b e=c;e.W();1a(e.21);e.1N();e.$k.5E()},5F:9(t){b n=c;b r=e.3F({},n.27,t);n.1N();n.1K(r,n.$k)},5G:9(e,t){b n=c,i;7(!e){q d}7(n.$k.1Q().14===0){n.$k.1e(e);n.1L();q d}n.1N();7(t===r||t===-1){i=-1}p{i=t}7(i>=n.$V.14||i===-1){n.$V.1O(-1).5H(e)}p{n.$V.1O(i).5I(e)}n.1L()},5J:9(e){b t=c,n;7(t.$k.1Q().14===0){q d}7(e===r||e===-1){n=-1}p{n=e}t.1N();t.$V.1O(n).3c();t.1L()}};e.3g.28=9(t){q c.2h(9(){7(e(c).w("h-1K")===j){q d}e(c).w("h-1K",j);b n=3v.2K(i);n.1K(t,c);e.w(c,"28",n)})};e.3g.28.6={v:5,1v:[5K,4],1I:[5L,3],1X:[5M,2],1A:d,1E:[5N,1],4q:d,1f:2E,1y:5O,2t:5P,N:d,22:d,25:d,2P:["1o","R"],2f:j,1U:d,1t:j,31:d,2V:j,4n:2E,4p:t,1M:"h-5Q",24:"h-24",1J:d,48:j,3W:"3U",1q:d,38:d,3d:d,30:j,1C:j,1B:j,2g:d,2j:d,3l:d,3o:d,2Y:d,3b:d,1V:d,3s:d,3i:d,3n:d}})(5R,5S,5T)', 62,
366, "||||||options|if||function||var|this|false||||owl||true|elem||currentItem|||else|return|||||items|data|||on|css|browser|0px|positionsInArray|maximumItem|typeof|owlControls|owlWrapper|addClass|itemsAmount|class|owlItems|div|autoPlay|transform|itemWidth|off|next|removeClass|px|apply|userItems|stop|left|isTouch|find||newPosX|newRelativeX|ev_types|length|disabled|css2slide|loaded|null|setTimeout|clearInterval|play|target|transition|append|slideSpeed|wrapper|width|prevItem|support3d|transition3d|translate3d|goTo|page|prev|paginationWrapper|autoHeight|preventDefault|buttonPrev|pagination|autoPlayInterval|itemsDesktop|ms|swapSpeed|paginationSpeed|buttonNext|itemsTabletSmall|touchDrag|mouseDrag|wrapperOuter|itemsMobile|origin|webkit|hasClass|itemsDesktopSmall|lazyLoad|init|setVars|baseClass|unWrap|eq|Math|children|moz|isTransition|storePrevItem|scrollPerPage|beforeMove|item|itemsTablet|isCss3Finish|for||checkVisible|stopOnHover|opacity|theme|navigation|isCssFinish|userOptions|owlCarousel|html|maximumPixels|mousedown|attr|style|active|rewindNav|addClassActive|each|ease|transitionStyle|position|eachMoveUpdate|rewind|orignalItems|sliding|all|afterGo|src|touchend|rewindSpeed|mouseup|100|addCssSpeed|is|roundPages|move|touchmove|get|targetElement|completeImg|200|offsetY|offsetX|updateItems|calculateAll|relativePos|create|updateControls|unwrap|hoverStatus|checkPagination|navigationText|moveDirection|logIn|height|endPrev|clearTransStyle|responsive|grabbing|click|beforeInit|endCurrent|dragBeforeAnimFinish|paginationNumbers|visible|resizer|event|originalEvent|checkNavigation|watchVisibility|jsonPath|dragging|string|afterInit|remove|jsonSuccess|playDirection|checkAp|fn|getPrevItem|afterAction|updateVars|Number|beforeUpdate|pageX|startDragging|afterUpdate|touches|newPosY|jumpTo|afterMove|max|apStatus|Object|end|in|disable|singleItemTransition|clearEvents|show|removeTransition|doTranslate|hide|extend|loadContent|span|css2move|updatePagination|perspective|complete|checkBrowser|cssText|abs|inClass|outClass|buildButtons|naturalWidth|eventTypes|fade|buildPagination|lazyEffect|gestures|disabledEvents|wrapItems|customEvents|touchstart|onStartup|lazyPreload|mousemove|touchcancel|start|min|lazyFollow|loading|disableTextSelect|loops|buildControls|continue|response|moveEvents|calculateWidth|appendWrapperSizes|appendItemsSizes|pageY|right|owlStatus|resize|responsiveRefreshRate|transitionTypes|responsiveBaseWidth|singleItem|originalClasses|originalStyles|outer|wrap|improveClosest|drag|getNewPosition|animate|setInterval|srcElement|reload|updatePosition|display|block|ontouchstart|returnValue|top|5e3|500|stopImmediatePropagation|stopPropagation|_data|events|pop|splice|baseElWidth|minSwipe|maxSwipe|dargging|wrapAll|clearTimeout|clientY|clientX|option|mouseover|mouseout|select|textarea|lazyOwl|input|dragstart|checked|round|push|controls|toggleClass|clickable|removeAttr|appendTo|msMaxTouchPoints|fadeIn|400|navigator|img|onstartup|undefined|buttons|out|match|relative|wrapperWidth|createElement|duration|webkitAnimationEnd|oAnimationEnd|MSAnimationEnd|animationend|getJSON|text|numbers|baseElement|destroyControls|new|prototype|destroy|removeData|reinit|addItem|after|before|removeItem|1199|979|768|479|800|1e3|carousel|jQuery|window|document".split("|"),
0, {})); $(function () { crawler.run(); common.initCommon() }); $(function () { if (typeof Parser != "undefined") { Parser.SITE_URL = base_url; Parser.URL = js_url; Parser.FLASH_URL = flash_url; Parser.SITE_ID = site_id; Parser.AUTO_PLAY = 1; Parser.parseAll() } }); $(window).scroll(function () { if ($(window).scrollTop() >= 200) $("#to_top").fadeIn(); else $("#to_top").fadeOut() });
$(document).ready(function () {
    common.clock(); if (PAGE_FOLDER != SITE_ID) if ($("#box_news_top .box_sub_hot_news .scroll-pane").size() > 0) $("#box_news_top .box_sub_hot_news .scroll-pane").niceScroll(".box_sub_hot_news .content_scoller", { touchbehavior: false, autohidemode: false }); if ($("#box_khuyenmai .content_box_category .scroll-pane").size() > 0) $("#box_khuyenmai .content_box_category .scroll-pane").niceScroll("#box_khuyenmai .content_box_category .content_scoller", { touchbehavior: false, autohidemode: false });
    if ($("#box_raovat .content_box_category .scroll-pane").size() > 0) $("#box_raovat .content_box_category .scroll-pane").niceScroll("#box_raovat .content_box_category .content_scoller", { touchbehavior: false, autohidemode: false }); if ($("#box_cactacgia .content_box_category .scroll-pane").size() > 0) $("#box_cactacgia .content_box_category .scroll-pane").niceScroll("#box_cactacgia .content_box_category .content_scoller", { touchbehavior: false, autohidemode: false }); if ($("#binhluanmoinhat .content_box_category .scroll-pane").size() >
    0) $("#binhluanmoinhat .content_box_category .scroll-pane").niceScroll("#binhluanmoinhat .content_box_category .content_scoller", { touchbehavior: false, autohidemode: false })
}); (function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/vi_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs) })(document, "script", "facebook-jssdk");
if (typeof $.fn.fancybox != "undefined") {
    var $setHomePage = $("#aSetHomePage"); var $setHomePageIE = $("#aSetHomePageIE"); if ($setHomePage[0] != undefined && $setHomePageIE[0] != undefined) if ($.browser.msie) $setHomePageIE.show(); else {
        var userLang = navigator.language ? navigator.language : navigator.userLanguage; userLang = userLang.toLowerCase().substr(0, 2); var userAgent = navigator.userAgent; var checkSHP = false; if (RegExp("Chrome").test(userAgent)) {
            checkSHP = true; if (userLang == "vi") $setHomePage.attr("href", base_url + "/sethomepage/chrome-vi.html");
            else $setHomePage.attr("href", base_url + "/sethomepage/chrome-us.html")
        } else if (RegExp("Firefox").test(userAgent)) { checkSHP = true; if (userLang == "vi") $setHomePage.attr("href", base_url + "/sethomepage/firefox-vi.html"); else $setHomePage.attr("href", base_url + "/sethomepage/firefox-us.html") } else if (RegExp("Opera").test(userAgent)) { checkSHP = true; if (userLang == "vi") $setHomePage.attr("href", base_url + "/sethomepage/opera-vi.html"); else $setHomePage.attr("href", base_url + "/sethomepage/opera-us.html") } else if (RegExp("Safari").test(userAgent)) {
            checkSHP =
            true; $setHomePage.attr("href", base_url + "/sethomepage/safari-us.html")
        } else $setHomePageIE.show(); if (checkSHP) { $setHomePageIE.hide(); $setHomePage.show().fancybox() }
    }
} var Vnexpress = {};

Vnexpress.widget = {
    data: [], initData: function (v) { if (v) this.data.push(v) }, video: function () {
        var video_cate = this.data; if (typeof video_cate != "undefined" && video_cate.length > 0) {
            var videoAPI = "http://video.vnexpress.net/widget/videoapi/?category_id=" + video_cate.join(",") + "&rule=2&limit=7&offset=0&callback=?"; $.getJSON(videoAPI, function (k) {
                if (typeof k == "object" && $.isEmptyObject(k) == false) $.each(k, function (keys, values) {
                    if (typeof values == "object" && $.isEmptyObject(values) == false) if (values.data.length > 0) {
                        var data =
                        values.data.join(","); $.ajax({ method: "GET", url: "/index/getdata/?data=" + data + "&block=video&slug=" + values.catecode + "&name=" + values.catename, dataType: "json" }).done(function (response) { $("#video-" + values.catecode).parents(".box_category").removeAttr("class").replaceWith(response.html); Vnexpress.widget.carousel(".list_video #owl-demo") })
                    }
                })
            })
        }
    }, carousel: function (container) {
        var owl = $(container); owl.owlCarousel({
            loop: false, autoPlay: 5E3, items: 2, itemsDesktop: [1199, 3], itemsTablet: [600, 2], itemsDesktopSmall: [900, 3], itemsMobile: [479,
            2], pagination: false, lazyLoad: true
        }); $(".next_slider").click(function () { owl.trigger("owl.next") }).css("margin", 0); $(".prev_slider").click(function () { owl.trigger("owl.prev") }).css("margin", 0)
    }
};