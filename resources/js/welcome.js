Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    api_token: '',
    posts: [],
    lastVisit: '',
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
    this.dateCheck();


  axios.get('http://localhost:8000/usersapi',{
  }).then((response)=>{
    // console.log(response.data.success);
    if (response.data.success) {
      axios.get('http://localhost:8000/api/postsLogged', {
      }).then((response)=>{
        // console.log(response.data.data);
        this.posts = response.data.data;
      });
    } else {
      axios.get('http://localhost:8000/api/postsNotLogged', {
      }).then((response)=>{
        // console.log(response.data.data);
        this.posts = response.data.data;
      });
    }
  });
},
methods:{
  getCookie: function(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  },
  dateCheck: function(){
    let cookieLastVisit = this.getCookie('cookieLastVisit');
    let cookieLastVisitNew = this.getCookie('cookieLastVisitNew');

    var now = new Date();
    // dayjs.extend(LocalizedFormat)
    let nowFormat = dayjs(now).format('MM/DD/YYYY');
    let cookieLastVisitFormat = dayjs(cookieLastVisit).format('MM/DD/YYYY');
    let cookieLastVisitNewFormat = dayjs(cookieLastVisitNew).format('MM/DD/YYYY');


    console.log(cookieLastVisitFormat);


    if (nowFormat === cookieLastVisitNewFormat) {
      console.log('non cambio');
    } else {
      console.log('cambio');
      document.cookie = "cookieLastVisitNew="+now;
      document.cookie = "cookieLastVisit="+now;
    }

  },
},
})
