import * as esbuild from 'esbuild'
import browserslistToEsbuild from 'browserslist-to-esbuild'

// Main JS file
let mainJs = await esbuild.context({
  entryPoints: ['src/js/main.js'],
  bundle: true,
  sourcemap: true,
  target: browserslistToEsbuild(),
  outfile: 'assets/js/main.js',
})

// JS Templates folder
let templatesJs = await esbuild.context({
  entryPoints: ['src/js/templates/**'],
  bundle: true,
  sourcemap: true,
  target: browserslistToEsbuild(),
  outdir: 'assets/js/templates/',
})

// Main CSS file
let mainCss = await esbuild.context({
  entryPoints: ['src/css/main.css'],
  bundle: true,
  sourcemap: true,
  target: browserslistToEsbuild(),
  outfile: 'assets/css/main.css',
  loader: {
    '.woff': 'file',
    '.woff2': 'file',
  },
})

// CSS Templates folder
let templatesCss = await esbuild.context({
  entryPoints: ['src/css/templates/**'],
  bundle: true,
  sourcemap: true,
  target: browserslistToEsbuild(),
  outdir: 'assets/css/templates/',
  loader: {
    '.woff': 'file',
    '.woff2': 'file',
  },
})

await mainJs.watch();
await templatesJs.watch();
await mainCss.watch();
await templatesCss.watch();