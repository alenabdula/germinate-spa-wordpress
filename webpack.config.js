module.exports = {

  entry: './_src/js/master.js',

  output: {
    path: __dirname + '/js/',
    filename: 'master.min.js'
  },

  module: {
    loaders: [
      { test: /\.vue$/, loader: 'vue' },
      { test: /\.scss$/, loader: 'sass' },
    ]
  }

}