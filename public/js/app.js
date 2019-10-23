/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2xvZ2luLmpzPzU0OTgiXSwic291cmNlc0NvbnRlbnQiOlsiYWxlcnQoMTIxMjEyMSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvbG9naW4uanMiXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

eval("\n/**\n * First we will load all of this project's JavaScript dependencies which\n * include Vue and Vue Resource. This gives a great starting point for\n * building robust, powerful web applications using Vue and Laravel.\n */\n\n//require('./material');\n\n//require('./authv');\n\n// window.axios = require('axios');\n//\n// window.axios.defaults.headers.common = {\n//     'X-CSRF-TOKEN': window.Laravel.csrfToken,\n//     'X-Requested-With': 'XMLHttpRequest'\n// };\n/**\n * Next, we will create a fresh Vue application instance and attach it to\n * the page. Then, you may begin adding components to this application\n * or customize the JavaScript scaffolding to fit your unique needs.\n */\n//\n//\n//\n// Vue.component('example', require('./components/Example.vue'));\n//\n//\n//\n//\n// const app = new Vue({\n//     el: '#app'\n// });\n//\n//\n// Vue.component(\n//     'passport-clients',\n//     require('./components/passport/Clients.vue')\n// );\n//\n// Vue.component(\n//     'passport-authorized-clients',\n//     require('./components/passport/AuthorizedClients.vue')\n// );\n//\n// Vue.component(\n//     'passport-personal-access-tokens',\n//     require('./components/passport/PersonalAccessTokens.vue')\n// );\n\n\n\n__webpack_require__(0);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIlxuLyoqXG4gKiBGaXJzdCB3ZSB3aWxsIGxvYWQgYWxsIG9mIHRoaXMgcHJvamVjdCdzIEphdmFTY3JpcHQgZGVwZW5kZW5jaWVzIHdoaWNoXG4gKiBpbmNsdWRlIFZ1ZSBhbmQgVnVlIFJlc291cmNlLiBUaGlzIGdpdmVzIGEgZ3JlYXQgc3RhcnRpbmcgcG9pbnQgZm9yXG4gKiBidWlsZGluZyByb2J1c3QsIHBvd2VyZnVsIHdlYiBhcHBsaWNhdGlvbnMgdXNpbmcgVnVlIGFuZCBMYXJhdmVsLlxuICovXG5cbi8vcmVxdWlyZSgnLi9tYXRlcmlhbCcpO1xuXG4vL3JlcXVpcmUoJy4vYXV0aHYnKTtcblxuLy8gd2luZG93LmF4aW9zID0gcmVxdWlyZSgnYXhpb3MnKTtcbi8vXG4vLyB3aW5kb3cuYXhpb3MuZGVmYXVsdHMuaGVhZGVycy5jb21tb24gPSB7XG4vLyAgICAgJ1gtQ1NSRi1UT0tFTic6IHdpbmRvdy5MYXJhdmVsLmNzcmZUb2tlbixcbi8vICAgICAnWC1SZXF1ZXN0ZWQtV2l0aCc6ICdYTUxIdHRwUmVxdWVzdCdcbi8vIH07XG4vKipcbiAqIE5leHQsIHdlIHdpbGwgY3JlYXRlIGEgZnJlc2ggVnVlIGFwcGxpY2F0aW9uIGluc3RhbmNlIGFuZCBhdHRhY2ggaXQgdG9cbiAqIHRoZSBwYWdlLiBUaGVuLCB5b3UgbWF5IGJlZ2luIGFkZGluZyBjb21wb25lbnRzIHRvIHRoaXMgYXBwbGljYXRpb25cbiAqIG9yIGN1c3RvbWl6ZSB0aGUgSmF2YVNjcmlwdCBzY2FmZm9sZGluZyB0byBmaXQgeW91ciB1bmlxdWUgbmVlZHMuXG4gKi9cbi8vXG4vL1xuLy9cbi8vIFZ1ZS5jb21wb25lbnQoJ2V4YW1wbGUnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvRXhhbXBsZS52dWUnKSk7XG4vL1xuLy9cbi8vXG4vL1xuLy8gY29uc3QgYXBwID0gbmV3IFZ1ZSh7XG4vLyAgICAgZWw6ICcjYXBwJ1xuLy8gfSk7XG4vL1xuLy9cbi8vIFZ1ZS5jb21wb25lbnQoXG4vLyAgICAgJ3Bhc3Nwb3J0LWNsaWVudHMnLFxuLy8gICAgIHJlcXVpcmUoJy4vY29tcG9uZW50cy9wYXNzcG9ydC9DbGllbnRzLnZ1ZScpXG4vLyApO1xuLy9cbi8vIFZ1ZS5jb21wb25lbnQoXG4vLyAgICAgJ3Bhc3Nwb3J0LWF1dGhvcml6ZWQtY2xpZW50cycsXG4vLyAgICAgcmVxdWlyZSgnLi9jb21wb25lbnRzL3Bhc3Nwb3J0L0F1dGhvcml6ZWRDbGllbnRzLnZ1ZScpXG4vLyApO1xuLy9cbi8vIFZ1ZS5jb21wb25lbnQoXG4vLyAgICAgJ3Bhc3Nwb3J0LXBlcnNvbmFsLWFjY2Vzcy10b2tlbnMnLFxuLy8gICAgIHJlcXVpcmUoJy4vY29tcG9uZW50cy9wYXNzcG9ydC9QZXJzb25hbEFjY2Vzc1Rva2Vucy52dWUnKVxuLy8gKTtcblxuXG5cbnJlcXVpcmUoJy4vbG9naW4nKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAuanMiXSwibWFwcGluZ3MiOiJBQUFBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBb0RBIiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);