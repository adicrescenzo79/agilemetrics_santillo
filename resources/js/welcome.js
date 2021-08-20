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
    console.log('ciao');
    let cookieSplitted = document.cookie.split(';');
    let visita = cookieSplitted[cookieSplitted.indexOf('lastVisit')];

    var now = new Date();
    document.cookie = "lastVisit="+now;

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

},
})
