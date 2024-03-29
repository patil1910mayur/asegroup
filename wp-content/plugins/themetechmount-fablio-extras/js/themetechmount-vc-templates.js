! function(e) {
    "use strict";
    jQuery(document).ready(function(n) {
        vc.TemplateWindowUIPanelBackendEditor = vc.TemplatesPanelViewBackend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
            panelName: "template_window",
            showMessageDisabled: !1,
            initialize: function() {
                vc.TemplateWindowUIPanelBackendEditor.__super__.initialize.call(this), this.trigger("show", this.initTemplatesTabs, this)
            },
            show: function() {
                this.clearSearch(), vc.TemplateWindowUIPanelBackendEditor.__super__.show.call(this), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates ul > li').each(function() {
                    "all" == n(this).attr("data-sort") ? n(this).find(".count").html(n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').length) : n(this).find(".count").html(n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template.' + n(this).attr("data-sort")).length)
                }), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li[data-sort="all"]').addClass("active").trigger("click"), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li').on("click", function() {
                    n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li').removeClass("active"), n(this).addClass("active");
                    var e = n(this).attr("data-sort");
                    n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').removeClass("hidden"), "all" != e && n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template:not(.' + e + ")").addClass("hidden")
                }), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template', n(this.el)).removeClass("is-loading").find(".vc-composer-icon").removeClass("vc-c-icon-sync"), n(".vc_ui-control-button i", n(this.el)).removeClass("rotating"), n(this.el).on("click", '.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template [data-template-handler]', function() {
                    n(this).closest('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').addClass("is-loading"), n(this).is(".vc_ui-control-button") ? n(this).find(".vc-composer-icon").addClass("vc-c-icon-sync rotating") : n(this).next(".vc_ui-list-bar-item-actions").find(".vc-composer-icon").addClass("vc-c-icon-sync rotating")
                })
            },
            initTemplatesTabs: function() {
                this.$el.find('[data-vc-ui-element="panel-tabs-controls"]').vcTabsLine("moveTabs")
            },
            showMessage: function(e, t) {
                var a;
                if (this.showMessageDisabled) return !1;
                a = "vc_col-xs-12 wpb_element_wrapper", this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
                var i, c = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
                switch (t) {
                    case "error":
                        i = n('<div class="' + a + '" data-vc-panel-message>').html(c({
                            color: "danger",
                            icon: "times",
                            text: e
                        }));
                        break;
                    case "warning":
                        i = n('<div class="' + a + '" data-vc-panel-message>').html(c({
                            color: "warning",
                            icon: "exclamation-triangle",
                            text: e
                        }));
                        break;
                    case "success":
                        i = n('<div class="' + a + '" data-vc-panel-message>').html(c({
                            color: "success",
                            icon: "check",
                            text: e
                        }))
                }
                i.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), i.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
                    i.remove()
                }, 6e3)
            },
            changeTab: function(e) {
                e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
                var t = n(e.currentTarget);
                t.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), t.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find(t.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
            },
            setPreviewFrameHeight: function(e, t) {
                parseInt(t) < 100 && (t = 100), n('data-vc-template-preview-frame="' + e + '"').height(t)
            }
        }), vc.TemplateWindowUIPanelBackendEditor.prototype.events = n.extend(!0, vc.TemplateWindowUIPanelBackendEditor.prototype.events, {
            'click [data-vc-ui-element="button-save"]': "save",
            'click [data-vc-ui-element="button-close"]': "hide",
            'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
            "keyup [data-vc-templates-name-filter]": "searchTemplate",
            "search [data-vc-templates-name-filter]": "searchTemplate",
            "click .vc_template-save-btn": "saveTemplate",
            "click [data-template_id] [data-template-handler]": "loadTemplate",
            'click [data-vc-container=".vc_ui-list-bar"][data-vc-preview-handler]': "buildTemplatePreview",
            'click [data-vc-ui-delete="template-title"]': "removeTemplate",
            'click [data-vc-ui-element="panel-tab-control"]': "changeTab"
        }), vc.TemplateWindowUIPanelFrontendEditor = vc.TemplatesPanelViewFrontend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
            panelName: "template_window",
            showMessageDisabled: !1,
            show: function() {
                this.clearSearch(), vc.TemplateWindowUIPanelFrontendEditor.__super__.show.call(this), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates ul > li').each(function() {
                    "all" == n(this).attr("data-sort") ? n(this).find(".count").html(n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').length) : n(this).find(".count").html(n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template.' + n(this).attr("data-sort")).length)
                }), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li[data-sort="all"]').addClass("active").trigger("click"), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li').on("click", function() {
                    n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .sortable_templates li').removeClass("active"), n(this).addClass("active");
                    var e = n(this).attr("data-sort");
                    n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').removeClass("hidden"), "all" != e && n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template:not(.' + e + ")").addClass("hidden")
                }), n('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template', n(this.el)).removeClass("is-loading").find(".vc-composer-icon").removeClass("vc-c-icon-sync"), n(".vc_ui-control-button i", n(this.el)).removeClass("rotating"), n(this.el).on("click", '.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template [data-template-handler]', function() {
                    n(this).closest('.vc_edit-form-tab[data-tab="ttm_vc_templates"] .vc_ui-template-list > .vc_ui-template').addClass("is-loading"), n(this).is(".vc_ui-control-button") ? n(this).find(".vc-composer-icon").addClass("vc-c-icon-sync rotating") : n(this).next(".vc_ui-list-bar-item-actions").find(".vc-composer-icon").addClass("vc-c-icon-sync rotating")
                })
            },
            showMessage: function(e, t) {
                if (this.showMessageDisabled) return !1;
                this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
                var a, i, c = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
                switch (i = "vc_col-xs-12 wpb_element_wrapper", t) {
                    case "error":
                        a = n('<div class="' + i + '" data-vc-panel-message>').html(c({
                            color: "danger",
                            icon: "times",
                            text: e
                        }));
                        break;
                    case "warning":
                        a = n('<div class="' + i + '" data-vc-panel-message>').html(c({
                            color: "warning",
                            icon: "exclamation-triangle",
                            text: e
                        }));
                        break;
                    case "success":
                        a = n('<div class="' + i + '" data-vc-panel-message>').html(c({
                            color: "success",
                            icon: "check",
                            text: e
                        }))
                }
                a.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), a.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
                    a.remove()
                }, 6e3)
            },
            changeTab: function(e) {
                e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
                var t = n(e.currentTarget);
                t.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), t.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find(t.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
            }
        }), n.fn.vcAccordion.Constructor.prototype.collapseTemplate = function(t) {
            var e, a, i;
            if (e = this.$element, i = 0, (a = this.getContainer().find("[data-vc-preview-handler]").each(function() {
                    var e, t;
                    void 0 === (e = (t = n(this)).data("vc.accordion")) && (t.vcAccordion(), e = t.data("vc.accordion")), e && e.setIndex && e.setIndex(i++)
                }).filter(function() {
                    var e;
                    return (e = n(this).data("vc.accordion")).getTarget().hasClass(e.activeClass)
                }).filter(function() {
                    return e[0] !== this
                })).length && n.fn.vcAccordion.call(a, "hide"), this.isActive()) n.fn.vcAccordion.call(e, "hide");
            else {
                n.fn.vcAccordion.call(e, "show");
                var c = e.closest(".vc_ui-list-bar-item"),
                    s = e.closest("[data-template_id]"),
                    l = s.closest("[data-vc-ui-element=panel-content]").parent();
                setTimeout(function() {
                    if (Math.round(s.offset().top - l.offset().top) < 0) {
                        var e = Math.round(s.offset().top - l.offset().top + l.scrollTop() - c.height());
                        l.animate({
                            scrollTop: e
                        }, 400)
                    }
                    "function" == typeof t && t(s, l)
                }, 400)
            }
        }
    })
}(jQuery);