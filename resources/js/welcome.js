Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    api_token: '',
    posts: [],
    lastVisit: '',
    cookieConsentVar: false,

  },
  mounted(){
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



    this.cookieConsentVar = this.getCookie('cookieConsent');
    // this.cookieConsentVar = false;


    console.log(this.cookieConsentVar);

    if (this.cookieConsentVar) {
      this.dateCheck();

    }
    // document.cookie = "cookieConsent=true; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    // document.cookie = "cookieControl=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"
    // document.cookie = "cookieLastVisit=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/"

    axios.get('/usersapi',{
    }).then((response)=>{
      // console.log(response.data.success);
      if (response.data.success) {
        axios.get('/api/postsLogged', {
        }).then((response)=>{
          // console.log(response.data.data);
          this.posts = response.data.data;
        });
      } else {
        axios.get('/api/postsNotLogged', {
        }).then((response)=>{
          // console.log(response.data.data);
          this.posts = response.data.data;
        });
      }
    });
  },
  methods:{

    cookieConsentFun: function(){
      let inOneYear = dayjs().add(1, 'year').$d;

      document.cookie = "cookieConsent=true; expires="+inOneYear+"; path=/";
      this.cookieConsentVar = this.getCookie('cookieConsent');
      console.log(this.cookieConsentVar);
      this.dateCheck();
    },

    getCookie: function(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    },

    dateCheck: function(){
      let cookieLastVisit = this.getCookie('cookieLastVisit');
      console.log('ultima visita ' + cookieLastVisit);
      let cookieControl = this.getCookie('cookieControl');
      console.log('controllo ' + cookieControl);

      // dayjs.extend(LocalizedFormat)
      let now = new Date();
      now = dayjs(now).format('MMMM D, YYYY');
      console.log('oggi ' + now);
      // let nowFormat = dayjs(now).format('MM/DD/YYYY');
      // console.log(nowFormat);
      // let cookieLastVisitFormat = dayjs(cookieLastVisit).format('MM/DD/YYYY');
      // console.log(cookieLastVisitFormat);
      // let cookieLastVisitNewFormat = dayjs(cookieLastVisitNew).format('MM/DD/YYYY');
      // console.log(cookieLastVisitNewFormat);


      // console.log(cookieLastVisitFormat);


      if (now === cookieControl) {
        console.log('non cambio');
      } else {
        console.log('cambio');
        let inOneYear = dayjs().add(1, 'year').$d;
        document.cookie = "cookieControl="+now+"; expires="+inOneYear+"; path=/";
        // document.cookie = 'cookieControl=${now};expires=${inOneYear};'
        document.cookie = "cookieLastVisit="+now+"; expires="+inOneYear+"; path=/";
      }

    },
  },
})
