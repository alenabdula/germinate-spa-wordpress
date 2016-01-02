<style lang="sass">
  .page {
    display: flex;
      .left { width: 25%; }
      .right { width: 75%; }
  }
</style>

<template>
  <h2>Pages</h2>
  <div class="page">
    <div class="left">
      <div v-for="post in posts">
        <article>
          <h2><a @click.prevent="showSingle(post)" href="{{ post.ID }}">{{ post.post_title }}</a></h2>
        </article>
      </div>
    </div>
    <div class="right">
      <div v-show="single" v-for="post in single">
        <h2>{{ post.post_title }}</h2>
        <img v-show="post.thumb_url" v-bind:src="post.thumb_url" alt="{{ post.thumb_alt }}">
        {{{ post.post_content }}}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts : this.getPosts(),
      single : [],
    }
  },
  methods : {
    getPosts () {
      this.$http.get('wp-json/wp/v2/pages/:slug').then(function (response) {
        console.log(response.data);
        this.$set('posts', response.data);
        this.showSingle(response.data[0]);
      }, function (response) {
        console.log('Error!');
      });
    },
    showSingle (post) {
      this.single = [post];
    }
  },
}
</script>