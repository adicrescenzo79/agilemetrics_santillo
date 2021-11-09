/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/welcome.js":
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

Vue.config.devtools = true;
var app = new Vue({
  el: '#main-welcome',
  data: {
    api_token: '',
    posts: [],
    lastVisit: '',
    cookieConsentVar: false,
    cookieMsg: false,
    logged: null
  },
  mounted: function mounted() {
    this.cookieConsentVar = this.getCookie('cookieConsent');

    if (!this.cookieConsentVar) {
      this.cookieMsg = true;
    } // axios.get('http://localhost:8000/api/user', {
    // }).then((response)=>{
    // // handle success
    //   console.log(response);
    // }).catch((error)=>{
    // // handle error
    //   console.log(error);
    // });
    // let cookieSplitted = document.cookie.split(';');
    // let visita = cookieSplitted[cookieSplitted.indexOf('lastVisit')];


    var inOneYear = dayjs().add(1, 'year').$d; // console.log(inOneYear);

    this.cookieConsentVar = Boolean(this.getCookie('cookieConsent')); // this.cookieConsentVar = false;
    //  console.log('riga 33 ' + this.cookieConsentVar);

    if (this.cookieConsentVar) {
      this.dateCheck();
    }

    this.getUser(); ////azzeramento cookies
    //  document.cookie = "cookieConsent=true; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    //  document.cookie = "cookieControl=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
    //  document.cookie = "cookieLastVisit=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
    /////fine azzeramento cookies
  },
  methods: {
    getPosts: function getPosts() {
      var _this = this;

      if (this.logged) {
        axios.get('/api/postsLogged', {}).then(function (response) {
          // console.log(response.data.data);
          _this.posts = response.data.data;

          _this.posts.forEach(function (post, i) {
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
          });
        });
      } else {
        axios.get('/api/postsNotLogged', {}).then(function (response) {
          // console.log(response.data.data);
          _this.posts = response.data.data;

          _this.posts.forEach(function (post, i) {
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
          });
        });
      }
    },
    getUser: function getUser() {
      var _this2 = this;

      axios.get('/usersapi', {}).then(function (response) {
        // console.log(response.data.success);
        if (response.data.success) {
          _this2.logged = true; // console.log(this.logged);
        } else {
          _this2.logged = false; // console.log(this.logged);
        }

        _this2.getPosts();
      });
    },
    cookieConsentFun: function cookieConsentFun() {
      var inOneYear = dayjs().add(1, 'year').$d;
      document.cookie = "cookieConsent=true; expires=" + inOneYear + "; path=/";
      this.cookieConsentVar = this.getCookie('cookieConsent'); // console.log('riga 68' + this.cookieConsentVar);

      this.dateCheck();
      this.cookieMsg = false;
    },
    getCookie: function getCookie(name) {
      var value = "; ".concat(document.cookie);
      var parts = value.split("; ".concat(name, "="));
      if (parts.length === 2) return parts.pop().split(';').shift();
    },
    dateCheck: function dateCheck() {
      var cookieLastVisit = this.getCookie('cookieLastVisit');
      this.lastVisit = cookieLastVisit; //  console.log('ultima visita ' + cookieLastVisit);

      var cookieControl = this.getCookie('cookieControl'); // console.log('controllo ' + cookieControl);
      // dayjs.extend(LocalizedFormat)

      var now = new Date();
      now = dayjs(now).format('MMMM D, YYYY'); // console.log('oggi ' + now);
      // let nowFormat = dayjs(now).format('MM/DD/YYYY');
      // console.log(nowFormat);
      // let cookieLastVisitFormat = dayjs(cookieLastVisit).format('MM/DD/YYYY');
      // console.log(cookieLastVisitFormat);
      // let cookieLastVisitNewFormat = dayjs(cookieLastVisitNew).format('MM/DD/YYYY');
      // console.log(cookieLastVisitNewFormat);
      // console.log(cookieLastVisitFormat);

      if (now === cookieControl) {//console.log('non cambio');
      } else {
        // console.log('cambio');
        var inOneYear = dayjs().add(1, 'year').$d;
        document.cookie = "cookieControl=" + now + "; expires=" + inOneYear + "; path=/"; // document.cookie = 'cookieControl=${now};expires=${inOneYear};'

        document.cookie = "cookieLastVisit=" + now + "; expires=" + inOneYear + "; path=/";
      }
    }
  }
});

/***/ }),

/***/ 3:
/*!***************************************!*\
  !*** multi ./resources/js/welcome.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\adicr\Documents\progetti\agilemetrics_santillo\resources\js\welcome.js */"./resources/js/welcome.js");


/***/ })

/******/ });