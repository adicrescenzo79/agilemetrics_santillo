Vue.config.devtools = true;
let app = new Vue({
  el: '#main-admin-posts-index',
  data:{
    warning: false,
  },
  mounted(){

  },
  methods:{
    warningToggle: function(){
      this.warning = !this.warning;
      console.log(this.warning);
    }
  },
});
