"use strict";
var KTAppInboxCompose = function () {
    const e = e => {
            const t = e.querySelector('[data-kt-inbox-form="cc"]'),
                a = e.querySelector('[data-kt-inbox-form="cc_button"]'),
                n = e.querySelector('[data-kt-inbox-form="cc_close"]'),
                o = e.querySelector('[data-kt-inbox-form="bcc"]'),
                r = e.querySelector('[data-kt-inbox-form="bcc_button"]'),
                l = e.querySelector('[data-kt-inbox-form="bcc_close"]');
            a.addEventListener("click", (e => {
                e.preventDefault(), t.classList.remove("d-none"), t.classList.add("d-flex")
            })), n.addEventListener("click", (e => {
                e.preventDefault(), t.classList.add("d-none"), t.classList.remove("d-flex")
            })), r.addEventListener("click", (e => {
                e.preventDefault(), o.classList.remove("d-none"), o.classList.add("d-flex")
            })), l.addEventListener("click", (e => {
                e.preventDefault(), o.classList.add("d-none"), o.classList.remove("d-flex")
            }))
        },
        n = e => {
            new Quill("#kt_inbox_form_editor", {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, 3, 4, 5, !1]
                        }],
                        ["bold", "italic", "underline"],
                        ["image", "code-block"]
                    ]
                },
                placeholder: "Type your text here...",
                theme: "snow"
            });
            const t = e.querySelector(".ql-toolbar");
            if (t) {
                const e = ["px-5", "border-top-0", "border-start-0", "border-end-0"];
                t.classList.add(...e)
            }
        },
        o = e => {
            const t = '[data-kt-inbox-form="dropzone"]',
                a = e.querySelector(t),
                n = e.querySelector('[data-kt-inbox-form="dropzone_upload"]');
            var o = a.querySelector(".dropzone-item");
            o.id = "";
            var r = o.parentNode.innerHTML;
            o.parentNode.removeChild(o);
            var l = new Dropzone(t, {
                url: "https://preview.keenthemes.com/api/dropzone/void.php",
                parallelUploads: 20,
                maxFilesize: 1,
                previewTemplate: r,
                previewsContainer: t + " .dropzone-items",
                clickable: n
            });
            l.on("addedfile", (function (e) {
                a.querySelectorAll(".dropzone-item").forEach((e => {
                    e.style.display = ""
                }))
            })), l.on("totaluploadprogress", (function (e) {
                a.querySelectorAll(".progress-bar").forEach((t => {
                    t.style.width = e + "%"
                }))
            })), l.on("sending", (function (e) {
                a.querySelectorAll(".progress-bar").forEach((e => {
                    e.style.opacity = "1"
                }))
            })), l.on("complete", (function (e) {
                const t = a.querySelectorAll(".dz-complete");
                setTimeout((function () {
                    t.forEach((e => {
                        e.querySelector(".progress-bar").style.opacity = "0", e.querySelector(".progress").style.opacity = "0"
                    }))
                }), 300)
            }))
        };
    return {
        init: function () {
            (() => {
                const r = document.querySelector("#kt_inbox_compose_form");
                e(r), n(r), o(r)
            })()
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTAppInboxCompose.init()
}));
