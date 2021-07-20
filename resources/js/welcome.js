Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    posts:[],
  },
  mounted(){
    axios.get('http://localhost:8000/api/posts',{
    }).then((response)=>{
      this.posts = response.data.data;
      console.log(response);
    });
  },
  methods:{

  },
})
