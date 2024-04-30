import * as esbuild from 'esbuild'
import browserslistToEsbuild from 'browserslist-to-esbuild'

// Main JS file
await esbuild.build({
  entryPoints: ['src/js/main.js'],
  bundle: true,
  minify: true,
  sourcemap: false,
  target: browserslistToEsbuild(),
  outfile: 'assets/js/main.js',
})

// JS Templates folder
await esbuild.build({
  entryPoints: ['src/js/templates/**'],
  bundle: true,
  minify: true,
  sourcemap: false,
  target: browserslistToEsbuild(),
  outdir: 'assets/js/templates/',
})

// Main CSS file
await esbuild.build({
  entryPoints: ['src/css/main.css'],
  bundle: true,
  minify: true,
  sourcemap: false,
  target: browserslistToEsbuild(),
  outfile: 'assets/css/main.css',
  loader: {
    '.woff': 'file',
    '.woff2': 'file',
  },
})

// CSS Templates folder
await esbuild.build({
  entryPoints: ['src/css/templates/**'],
  bundle: true,
  minify: true,
  sourcemap: false,
  target: browserslistToEsbuild(),
  outdir: 'assets/css/templates/',
  loader: {
    '.woff': 'file',
    '.woff2': 'file',
  },
})