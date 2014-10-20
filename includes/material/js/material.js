/* globals ripples */

jQuery(function (){

    if (typeof ripples == "object") {
        ripples.init( ".btn:not(.btn-link)," +
                      ".card-image," +
                      ".navbar a:not(.withoutripple)," +
                      ".nav-tabs a:not(.withoutripple)," +
                      ".withripple" );
    }

    var initInputs = function() {
        // Add fake-checkbox to material checkboxes
        jQuery(".checkbox > label > input").not(".bs-material").addClass("bs-material").after("<span class=check></span>");

        // Add fake-radio to material radios
        jQuery(".radio > label > input").not(".bs-material").addClass("bs-material").after("<span class=circle></span><span class=check></span>");

        // Add elements for material inputs
        jQuery("input.form-control, textarea.form-control, select.form-control").not(".bs-material").each( function() {
            if (jQuery(this).is(".bs-material")) { return; }
            jQuery(this).wrap("<div class=form-control-wrapper></div>");
            jQuery(this).after("<span class=material-input></span>");
            if (jQuery(this).hasClass("floating-label")) {
                var placeholder = jQuery(this).attr("placeholder");
                jQuery(this).attr("placeholder", null).removeClass("floating-label");
                jQuery(this).after("<div class=floating-label>" + placeholder + "</div>");
            }
            if (jQuery(this).is(":empty") || jQuery(this).val() === null || jQuery(this).val() == "undefined" || jQuery(this).val() === "") {
                jQuery(this).addClass("empty");
            }

            if (jQuery(this).parent().next().is("[type=file]")) {
                jQuery(this).parent().addClass("fileinput");
                var jQueryinput = jQuery(this).parent().next().detach();
                jQuery(this).after(jQueryinput);
            }
        });

    };
    initInputs();

    // Support for "arrive.js" to dynamically detect creation of elements
    // include it before this script to take advantage of this feature
    // https://github.com/uzairfarooq/arrive/
    if (document.arrive) {
        document.arrive("input, textarea, select", function() {
            initInputs();
        });
    }

    jQuery(document).on("change", ".checkbox input", function() {
        jQuery(this).blur();
    });

    jQuery(document).on("keyup change", ".form-control", function() {
        var self = jQuery(this);
        setTimeout(function() {
            if (self.val() === "") {
                self.addClass("empty");
            } else {
                self.removeClass("empty");
            }
        }, 1);
    });
    jQuery(document)
    .on("focus", ".form-control-wrapper.fileinput", function() {
        jQuery(this).find("input").addClass("focus");
    })
    .on("blur", ".form-control-wrapper.fileinput", function() {
        jQuery(this).find("input").removeClass("focus");
    })
    .on("change", ".form-control-wrapper.fileinput [type=file]", function() {
        var value = "";
        jQuery.each(jQuery(this)[0].files, function(i, file) {
            console.log(file);
            value += file.name + ", ";
        });
        value = value.substring(0, value.length - 2);
        if (value) {
            jQuery(this).prev().removeClass("empty");
        } else {
            jQuery(this).prev().addClass("empty");
        }
        jQuery(this).prev().val(value);
    });
});
