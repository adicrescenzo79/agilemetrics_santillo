Vue.config.devtools = true;
let app = new Vue({
  el: '#main-guests-posts-show',
  data:{
    currentUrl: window.location.href,
    slug: '',
    api_token: '',
    post: [],
    background: '',
  },
  mounted(){
    let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    this.slug = stringSplitted[4];

    this.postBySlug();

  },
  methods:{
    postBySlug: function(){
    axios.get(`/api/posts/slug/${this.slug}`,{
    }).then((response)=>{
      this.post = response.data.data;
      // console.log(response.data.data);
      this.background = 'background-image: url(' + this.post.cover + ')';

    });

  },


  },
})
