(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["printsheetitems2"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_http__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/js/http */ "./resources/js/http.js");
/* harmony import */ var _js_components_Table_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/js/components/Table.vue */ "./resources/js/components/Table.vue");
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
  name: "PrintSheetItems",
  components: {
    Table: _js_components_Table_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      resultsItems: null,
      contentType: "PrintSheetItem",
      contentKey: "ps_id",
      columns: ["psi_id", "ps_id", "order_item_id", "image_url", "x_pos", "y_pos", "width", "height"],
      filterApplied: []
    };
  },
  mounted: function mounted() {
    this.getData();
  },
  computed: {
    resultsFiltered: function resultsFiltered() {
      if (this.resultsItems != null) {
        // filter logic
        // return ...
        return this.resultsItems.data;
      } else {
        return null;
      }
    }
  },
  methods: {
    getData: function getData() {
      var _this = this;

      _js_http__WEBPACK_IMPORTED_MODULE_0__["default"].get("api/printsheetitems").then(function (response) {
        _this.processData(response.data);
      });
    },
    processData: function processData(data) {
      // ...
      this.resultsItems = data; //this.filterResults;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f& ***!
  \*************************************************************************************************************************************************************************************************************/
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
    { staticClass: "view_PrintSheetItems view" },
    [
      _c("h1", [_vm._v("PRINT SHEET ITEMS")]),
      _vm._v(" "),
      _c("Table", {
        attrs: {
          items: this.resultsFiltered,
          columns: _vm.columns,
          contentType: _vm.contentType,
          contentKey: _vm.contentKey
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/PrintSheetItems.vue":
/*!************************************************!*\
  !*** ./resources/js/views/PrintSheetItems.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PrintSheetItems.vue?vue&type=template&id=5a771c5f& */ "./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f&");
/* harmony import */ var _PrintSheetItems_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PrintSheetItems.vue?vue&type=script&lang=js& */ "./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PrintSheetItems_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/PrintSheetItems.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PrintSheetItems_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./PrintSheetItems.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PrintSheetItems.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PrintSheetItems_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f&":
/*!*******************************************************************************!*\
  !*** ./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./PrintSheetItems.vue?vue&type=template&id=5a771c5f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PrintSheetItems.vue?vue&type=template&id=5a771c5f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrintSheetItems_vue_vue_type_template_id_5a771c5f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);