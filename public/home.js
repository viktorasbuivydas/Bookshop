(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["home"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Aside.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Aside.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home/Index.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Home/Index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Aside_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../components/Aside.vue */ "./resources/js/components/Aside.vue");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Aside: _components_Aside_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      isLoggedIn: false
    };
  },
  created: function created() {// this.loadUser()
  },
  methods: _objectSpread(_objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapActions"])('auth', ['getUserData'])), {}, {
    loadUser: function loadUser() {
      var _this = this;

      this.getUserData().then(function () {
        _this.isLoggedIn = true;
      });
    }
  })
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "aside",
      { staticClass: "left-sidebar", attrs: { "data-sidebarbg": "skin6" } },
      [
        _c("div", { staticClass: "scroll-sidebar" }, [
          _c("nav", { staticClass: "sidebar-nav" }, [
            _c("ul", { attrs: { id: "sidebarnav" } }, [
              _vm._m(0),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "p-15 m-t-10" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "btn d-block w-100 create-btn text-white no-block d-flex align-items-center",
                      attrs: { to: "/user/books/create" }
                    },
                    [
                      _c("i", { staticClass: "fa fa-plus-square" }),
                      _vm._v(" "),
                      _c("span", { staticClass: "hide-menu m-l-5" }, [
                        _vm._v("Create New Book")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/user/books/index",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", { staticClass: "mdi mdi-view-dashboard" }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("My Books")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/admin/books/index",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", { staticClass: "mdi mdi-book" }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("All books")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/admin/books/pending",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", {
                        staticClass: "mdi mdi-notification-clear-all"
                      }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("Approve books")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/admin/genres/index",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", { staticClass: "mdi mdi-account-network" }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("Genres")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/admin/authors/index",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", { staticClass: "mdi mdi-border-all" }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("Authors")
                      ])
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "sidebar-item" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass:
                        "sidebar-link waves-effect waves-dark sidebar-link",
                      attrs: {
                        to: "/admin/reports/index",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _c("i", { staticClass: "mdi mdi-file" }),
                      _c("span", { staticClass: "hide-menu" }, [
                        _vm._v("Reports")
                      ])
                    ]
                  )
                ],
                1
              )
            ])
          ])
        ])
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", [
      _c(
        "div",
        { staticClass: "user-profile d-flex no-block dropdown m-t-20" },
        [
          _c("div", { staticClass: "user-pic" }, [
            _c("img", {
              staticClass: "rounded-circle",
              attrs: {
                src: "assets/images/users/1.jpg",
                alt: "users",
                width: "40"
              }
            })
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "user-content hide-menu m-l-10" }, [
            _c("p"),
            _c("h5", { staticClass: "m-b-0 user-name font-medium" }, [
              _vm._v(" Name ")
            ]),
            _vm._v(" "),
            _c("span", { staticClass: "op-5 user-email" }, [_vm._v(" Email ")]),
            _vm._v(" "),
            _c("p")
          ])
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("Aside"),
      _vm._v(" "),
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-12" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-4" }, [
                _c(
                  "div",
                  {
                    staticClass: "card text-white text-center bg-success mb-4"
                  },
                  [
                    _c("div", { staticClass: "card-body" }, [
                      _c("h4", { staticClass: "card-title" }, [
                        _vm._v("Approved books "),
                        _c("b", [_vm._v(_vm._s(_vm.approved_book_count))])
                      ])
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c(
                  "div",
                  {
                    staticClass: "card text-white text-center bg-warning mb-4"
                  },
                  [
                    _c("div", { staticClass: "card-body" }, [
                      _c("h4", { staticClass: "card-title" }, [
                        _vm._v("Pending books "),
                        _c("b", [_vm._v(_vm._s(_vm.pending_book_count))])
                      ])
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c(
                  "div",
                  { staticClass: "card text-white text-center bg-danger mb-4" },
                  [
                    _c("div", { staticClass: "card-body" }, [
                      _c("h4", { staticClass: "card-title" }, [
                        _vm._v("Rejected books "),
                        _c("b", [_vm._v(_vm._s(_vm.rejected_book_count))])
                      ])
                    ])
                  ]
                )
              ])
            ])
          ])
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "page-breadcrumb" }, [
      _c("div", { staticClass: "row align-items-center" }, [
        _c("div", { staticClass: "col-5" }, [
          _c("h4", { staticClass: "page-title" }, [_vm._v("Stats")]),
          _vm._v(" "),
          _c("div", { staticClass: "d-flex align-items-center" }, [
            _c("nav", { attrs: { "aria-label": "breadcrumb" } }, [
              _c("ol", { staticClass: "breadcrumb" }, [
                _c("li", { staticClass: "breadcrumb-item" }, [
                  _c("a", { attrs: { href: "home" } }, [_vm._v("Dashboard")])
                ]),
                _vm._v(" "),
                _c(
                  "li",
                  {
                    staticClass: "breadcrumb-item active",
                    attrs: { "aria-current": "page" }
                  },
                  [_vm._v("Stats")]
                )
              ])
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Aside.vue":
/*!*******************************************!*\
  !*** ./resources/js/components/Aside.vue ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Aside.vue?vue&type=template&id=0d35e1dd& */ "./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd&");
/* harmony import */ var _Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Aside.vue?vue&type=script&lang=js& */ "./resources/js/components/Aside.vue?vue&type=script&lang=js&");
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Aside.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Aside.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/components/Aside.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Aside.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Aside.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Aside.vue?vue&type=template&id=0d35e1dd& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Aside.vue?vue&type=template&id=0d35e1dd&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Aside_vue_vue_type_template_id_0d35e1dd___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/Home/Index.vue":
/*!*******************************************!*\
  !*** ./resources/js/views/Home/Index.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=789dbce1& */ "./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/views/Home/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Home/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Home/Index.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/views/Home/Index.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1&":
/*!**************************************************************************!*\
  !*** ./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=789dbce1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Home/Index.vue?vue&type=template&id=789dbce1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_789dbce1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);