Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    posts:[],
  },
  created(){
    axios.get('http://localhost:8000/api/posts',{
    }).then((response)=>{
      this.posts = response.data.data;
    });
  },
  methods:{

  },
})
