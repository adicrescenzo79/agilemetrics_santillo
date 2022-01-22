Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data: {
    api_token: '',
    posts: [],
    articles: [],

    lastVisit: '',
    cookieConsentVar: false,
    cookieMsg: false,
    role: null,
    txt: "",

    mixedItems: [],
    carouselLoaded: false,

  },

  mounted() {

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

  methods: {

    getPosts: function () {
      axios({
        method: "get",
        url: window.location.origin + "/api/posts",
        params: {
          role: this.role,
        },
      })
        .then((response) => {
          this.posts = response.data.data;
          this.posts.forEach((post, i) => {

            if (new Date(post.created_at) > new Date(this.lastVisit)) {
              
              post['new'] = true;
            } else {
              post['new'] = false;
            }
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
            post['type'] = 'posts';

            

          });
          this.getArticles();

        });

    },

    getArticles: function () {
      axios({
        method: "get",
        url: window.location.origin + "/api/articles",
        params: {
          role: this.role,
        },
      })
        .then((response) => {
          this.articles = response.data.data;


          this.articles.forEach((article, i) => {
            if (new Date(article.created_at) > this.lastVisit) {
              
              article['new'] = true;
            } else {
              article['new'] = false;
            }

            article.created_at = dayjs(article.created_at).format('MMMM D, YYYY');
            article['type'] = 'articles';



          });

          if (this.posts.length && this.articles.length) {
            
            this.mixItems();
          } else {
            if (this.posts.length) {
              this.mixedItems = this.posts;
            } else {
              this.mixedItems = this.articles;
            }
            this.carouselLoaded = true;
            // console.log(this.carouselLoaded);
      
            setTimeout(() => {
              $('.carousel-item#0').addClass('active');
      
            }, 200);
      
          }


        });

    },

    mixItems: function () {
      // FUNZIONE PER MISCHIARE POST E ARTICOLI
      let run = 0, first = 0, second = 0;
      while (run < this.posts.length + this.articles.length) {
        if (first > second) {
          this.mixedItems[run] = this.articles[second];
          second++;
        } else {
          this.mixedItems[run] = this.posts[first];
          first++;
        }
        run++;
      };
      // console.log(this.mixedItems);

      this.carouselLoaded = true;
      // console.log(this.carouselLoaded);

      setTimeout(() => {
        $('.carousel-item#0').addClass('active');

      }, 200);

    },

    getUser: function () {
      axios.get('/usersapi', {
      }).then((response) => {
        // console.log(response.data.success);
        if (response.data.success) {
          this.role = response.data.data.role;

          // console.log(this.logged);
        } else {
          this.role = null;
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



