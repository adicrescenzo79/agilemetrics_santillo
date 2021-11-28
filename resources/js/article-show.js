Vue.config.devtools = true;
let app = new Vue({
  el: '#main-guests-articles-show',
  data:{
    currentUrl: window.location.href,
    slug: '',
    api_token: '',
    article: [],
    background: '',
  },
  mounted(){
    let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    this.slug = stringSplitted[4];

    this.articleBySlug();

  },
  methods:{
    articleBySlug: function(){
    axios.get(`/api/articles/slug/${this.slug}`,{
    }).then((response)=>{
      this.article = response.data.data;
      // console.log(response.data.data);
      this.background = 'background-image: url(' + this.article.cover + ')';

      $('#content').append(this.article.content);
      console.log(this.article.content);

    });

  },


  },
})
