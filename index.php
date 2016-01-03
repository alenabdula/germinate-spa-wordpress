<?php get_header(); ?>
<div id="app">
    <ul>
      <li v-show="pages" v-for="page in pages">
        <a @click.prevent="this.single = page"
           v-link="{ name: 'page' }"
           href="#"
        >{{ page.post_title }}</a>
      </li>
      <li>
        <a v-link="{ name: 'article' }" href="#">Articles</a>
        <ul>
          <li v-for="article in articles">
            <a @click.prevent="this.single = article" href="#">{{ article.post_title }}</a>
          </li>
        </ul>
      </li>
    </ul>
    <router-view keep-alive
                 :pages.sync="pages"
                 :single.sync="single"
                 :articles.sync="articles"
    ></router-view>
</div>
<?php get_footer(); ?>