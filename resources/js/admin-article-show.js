Vue.config.devtools = true;
let app = new Vue({
  el: '#main-admin-article-show',
  data:{
    currentUrl: window.location.href,
    id: '',
    api_token: '',
    article: [],
    background: '',
  },
  mounted(){
    let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    this.id = stringSplitted[5];
    console.log(this.id);

    this.articleById();

  },
  methods:{
    articleById: function(){
    axios.get(`/api/articles/id/${this.id}`,{
    }).then((response)=>{
      this.article = response.data.data;
       console.log(response.data.data);
      //this.background = 'background-image: url(' + this.article.cover + ')';

      $('#content').append(this.article.content);
     // console.log(this.article.content);

    });

  },


  },
})
