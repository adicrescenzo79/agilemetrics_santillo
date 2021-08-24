Vue.config.devtools = true;
let app = new Vue({
  el: '#main-guests-posts-index',
  data:{
    api_token: '',
    posts: [],
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

},
})
