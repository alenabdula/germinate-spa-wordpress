## Germinate SPA

Single Page Application (SPA) WordPress theme using [VueJS](http://vuejs.org/)

### Installation

1. Node Modules
  - `npm install` : install Node dependencies
  - `npm run build` : run WebPack build script `webpack.config.js`
2. Composer
  - `composer install`: will
    + **generate** `vendor/autoload.php` file which is included in `functions.php`
    + **install** TinyMCE Advanced, you can [activate it](/wp-admin/plugins.php) and [head over to settings page](/wp-admin/options-general.php?page=tinymce-advanced) and check __Stop removing the `<p>` and `<br />` tags when saving and show them in the Text editor__.
3. Create WordPress Page: **Home**