## Germinate SPA

Single Page Application (SPA) WordPress theme using [VueJS](http://vuejs.org/)

### Installation

1. Node Modules
  - `npm install`: install Node dependencies
  - `npm run build`: run WebPack build script `webpack.config.js`
2. Composer
  - `composer install`: will
    + **generate** `vendor/autoload.php` file, from `lib` folder, which is included in `functions.php`
    + **install** [Disable Embeds](https://wordpress.org/plugins/disable-embeds/) WordPress Plug-in, you can [activate it](/wp-admin/plugins.php) to remove [WordPress Embeds](https://codex.wordpress.org/Embeds).
3. Create WordPress Page: **Home**