Vue.config.devtools = true;
let app = new Vue({
  el: '#main-guests-articles-index',
  data: {
    api_token: '',
    articles: [],
    logged: null,
  },
  mounted() {
    // axios.get('http://localhost:8000/api/user', {
    // }).then((response)=>{
    // // handle success
    //   console.log(response);
    // }).catch((error)=>{
    // // handle error
    //   console.log(error);
    // });
    this.getUser();

  },
  methods: {
    getarticles: function () {
      if (this.logged) {
        axios.get('/api/articlesLogged', {
        }).then((response) => {
          // console.log(response.data.data);
          this.articles = response.data.data;
          this.articles.forEach((article, i) => {
            article.created_at = dayjs(article.created_at).format('MMMM D, YYYY');
          });

        });

      } else {
        axios.get('/api/articlesNotLogged', {
        }).then((response) => {
          // console.log(response.data.data);
          this.articles = response.data.data;
          this.articles.forEach((article, i) => {
            article.created_at = dayjs(article.created_at).format('MMMM D, YYYY');
          });
        });

      }
    },
    getUser: function () {
      axios.get('/usersapi', {
      }).then((response) => {
        // console.log(response.data.success);
        if (response.data.success) {
          this.logged = true;
          console.log(this.logged);
        } else {
          this.logged = false;
          console.log(this.logged);

        }
        this.getarticles();



      });

    },

  },
})
