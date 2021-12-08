Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data: {
    api_token: '',
    posts: [],
    lastVisit: '',
    cookieConsentVar: false,
    cookieMsg: false,
    logged: null,
    move: 0,
    activePost: 0,
    windowWidth: window.innerWidth,
    txt: "",
    moveStep: null,
    carouselLeft: null,


  },
  watch: {
    windowWidth(newWidth, oldWidth) {
      this.txt = `it changed to ${newWidth} from ${oldWidth}`;
      // console.log(this.txt);
      if (newWidth > 1200) {
        this.moveStep = 50;
        this.carouselLeft = 22;
      } else if (newWidth > 576 && newWidth <= 1200) {
        this.moveStep = 50;
        this.carouselLeft = 5;
        this.move = 10;


      } else if (newWidth <= 576) {
        this.moveStep = 85; // verificare ipad
      }
    },
  },

  mounted() {
    var width = $(window).width();
    if (width > 1200) {
      this.moveStep = 50;
      this.carouselLeft = 22;
    } else if (width > 576 && width <= 1200) {
      this.moveStep = 50;
      this.carouselLeft = 5;
      this.move = 10;

    } else if (width <= 576) {
      this.moveStep = 85; // verificare ipad
    }
    this.$nextTick(() => {
      window.addEventListener("resize", this.onResize);
    });

    this.cookieConsentVar = this.getCookie('cookieConsent');
    if (!this.cookieConsentVar) {
      this.cookieMsg = true;
    }

    // axios.get('http://localhost:8000/api/user', {
    // }).then((response)=>{
    // // handle success
    //   console.log(response);
    // }).catch((error)=>{
    // // handle error
    //   console.log(error);
    // });
    // let cookieSplitted = document.cookie.split(';');
    // let visita = cookieSplitted[cookieSplitted.indexOf('lastVisit')];

    let inOneYear = dayjs().add(1, 'year').$d;

    // console.log(inOneYear);



    this.cookieConsentVar = Boolean(this.getCookie('cookieConsent'));
    // this.cookieConsentVar = false;


    //  console.log('riga 33 ' + this.cookieConsentVar);

    if (this.cookieConsentVar) {
      this.dateCheck();

    }

    this.getUser();
    ////azzeramento cookies

    //  document.cookie = "cookieConsent=true; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    //  document.cookie = "cookieControl=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
    //  document.cookie = "cookieLastVisit=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"

    /////fine azzeramento cookies


  },
  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },

  methods: {
    onResize() {
      this.windowWidth = window.innerWidth;
      this.move = 0;
      this.activePost = 0;
    },

    getPosts: function () {
      axios({
        method: "get",
        url: window.location.origin + "/api/posts",
        params: {
          logged: this.logged,
        },
      })
        .then((response) => {
          this.posts = response.data.data;
          this.posts.forEach((post, i) => {
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
          });
          // this.autoCarousel();
        });

    },
    autoCarousel: function () {
      setInterval(() => {
        this.nextPost();
      }, 10000);
    },
    prevPost: function () {
      $('#post-title').addClass('transparent');

      if (this.activePost == 0) {
        this.activePost = this.posts.length - 1;
        this.move = this.moveStep * (this.posts.length - 1);
      } else {
        this.activePost -= 1;
        this.move -= this.moveStep;
      }
      console.log(this.move);
      setTimeout(() => {
        $('#post-title').removeClass('transparent');

      }, 500);

    },

    nextPost: function () {
      $('#post-title').addClass('transparent');
      if (this.activePost == this.posts.length - 1) {
        this.activePost = 0;
        this.move = 0;
      } else {
        this.activePost += 1;
        this.move += this.moveStep;

      }
      console.log(this.move);

      setTimeout(() => {
        $('#post-title').removeClass('transparent');

      }, 500);

    },


    selectPost: function (i) {
      $('#post-title').addClass('transparent');

      this.activePost = i;
      this.move = -50 * i;
      setTimeout(() => {
        $('#post-title').removeClass('transparent');

      }, 500);

    },

    getUser: function () {
      axios.get('/usersapi', {
      }).then((response) => {
        // console.log(response.data.success);
        if (response.data.success) {
          this.logged = true;
          // console.log(this.logged);
        } else {
          this.logged = false;
          // console.log(this.logged);

        }
        this.getPosts();



      });

    },

    cookieConsentFun: function () {
      let inOneYear = dayjs().add(1, 'year').$d;

      document.cookie = "cookieConsent=true; expires=" + inOneYear + "; path=/";
      this.cookieConsentVar = this.getCookie('cookieConsent');
      // console.log('riga 68' + this.cookieConsentVar);
      this.dateCheck();
      this.cookieMsg = false;
    },

    getCookie: function (name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    },

    dateCheck: function () {
      let cookieLastVisit = this.getCookie('cookieLastVisit');
      this.lastVisit = cookieLastVisit;
      //  console.log('ultima visita ' + cookieLastVisit);
      let cookieControl = this.getCookie('cookieControl');
      // console.log('controllo ' + cookieControl);

      // dayjs.extend(LocalizedFormat)
      let now = new Date();
      now = dayjs(now).format('MMMM D, YYYY');
      // console.log('oggi ' + now);
      // let nowFormat = dayjs(now).format('MM/DD/YYYY');
      // console.log(nowFormat);
      // let cookieLastVisitFormat = dayjs(cookieLastVisit).format('MM/DD/YYYY');
      // console.log(cookieLastVisitFormat);
      // let cookieLastVisitNewFormat = dayjs(cookieLastVisitNew).format('MM/DD/YYYY');
      // console.log(cookieLastVisitNewFormat);


      // console.log(cookieLastVisitFormat);


      if (now === cookieControl) {
        //console.log('non cambio');
      } else {
        // console.log('cambio');
        let inOneYear = dayjs().add(1, 'year').$d;
        document.cookie = "cookieControl=" + now + "; expires=" + inOneYear + "; path=/";
        // document.cookie = 'cookieControl=${now};expires=${inOneYear};'
        document.cookie = "cookieLastVisit=" + now + "; expires=" + inOneYear + "; path=/";
      }

    },
  },
});



