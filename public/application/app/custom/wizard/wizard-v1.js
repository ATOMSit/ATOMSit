"use strict";
var KTWizard1 = function () {
    var e, r, t;
    return {
        init: function () {
            var i;
            KTUtil.get("kt_wizard_v1"), e = $("#kt_form"), (t = new KTWizard("kt_wizard_v1", {startStep: 1})).on("beforeNext", function (e) {
                !0 !== r.form() && e.stop()
            }), t.on("change", function (e) {
                setTimeout(function () {
                    KTUtil.scrollTop()
                }, 500)
            }), r = e.validate({
                ignore: ":hidden",
                invalidHandler: function (e, r) {
                    KTUtil.scrollTop(), swal.fire({
                        title: "",
                        text: "Le formulaire comporte des erreurs, veuillez les corriger avant de continuer.",
                        type: "error",
                        confirmButtonClass: "btn btn-principal"
                    })
                },
                submitHandler: function (e) {
                }
            }), (i = e.find('[data-ktwizard-type="action-submit"]')).on("click", function (t) {
                e.submit();
            })
        }
    }
}();
jQuery(document).ready(function () {
    KTWizard1.init()
});