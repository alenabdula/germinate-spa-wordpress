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
  },
  
  babel: {
    presets: ['es2015'],
    plugins: ['transform-runtime']
  }

}