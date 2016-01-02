<template>
  <div v-for="category in categories">
    <a href="#">{{ category.name }}</a>
  </div>
  <article v-show="!single" v-for="post in content">
    <h2><a @click.prevent="displaySingle(post)" href="{{ post.permalink }}">{{ post.post_title }}</a></h2>
  </article>
  <article v-else v-for="post in single">
    <a v-show="single" @click="single = false" href="">Back</a>
    <h2>{{ post.post_title }}</h2>
    {{{ post.post_content }}}
    <p>{{ post.post_date }}</p>
    <p>{{ post.post_type }}</p>
  </article>
</template>
<script>
  export default {
    data() {
      return {
        content : this.get_content(),
        single : false,
        categories : [],
      }
    },
    methods: {
      get_content() {
        this.$http.get('wp-json/wp/v2/content').then(function (response) {
          console.log(response.data);
          this.$set('content', response.data);
          this.$set('categories', response.data['categories']);
        }, function (response) {
          console.log('Error!');
        });
      },
      displaySingle(post) {
        this.single = [post];
      }
    }
  }
</script>
<style lang="sass">
  body {
    background-color: red;
  }
</style>