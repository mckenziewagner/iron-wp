const purgecss = require('@fullhuman/postcss-purgecss')({
  content: ['./*.php', './template-parts/**/*.php'],
  defaultExtractor: content => content.match(/[A-Za-z0-9-_:\!/]+/g) || []
})

module.exports = {
  plugins: [
    require('tailwindcss'),
    require('postcss-preset-env'),
    ...process.env.NODE_ENV === 'production'
      ? [purgecss, require('cssnano')]
      : []
  ]
}
