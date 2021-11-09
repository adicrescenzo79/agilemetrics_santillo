Vue.config.devtools = true;
let app = new Vue({
  el: '#main-guests-posts-index',
  data: {
    api_token: '',
    posts: [],
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
    getPosts: function () {
      if (this.logged) {
        axios.get('/api/postsLogged', {
        }).then((response) => {
          // console.log(response.data.data);
          this.posts = response.data.data;
          this.posts.forEach((post, i) => {
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
          });

        });

      } else {
        axios.get('/api/postsNotLogged', {
        }).then((response) => {
          // console.log(response.data.data);
          this.posts = response.data.data;
          this.posts.forEach((post, i) => {
            post.created_at = dayjs(post.created_at).format('MMMM D, YYYY');
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
        this.getPosts();



      });

    },

  },
})
