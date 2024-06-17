## Kirby + Laravel Mix Starter
- Kirby installed through composer for easy updating
- esbuild and PostCSS for JS and CSS asset compiling
- BrowserSync for live reloading

## Setup
- `composer install` to make sure kirby is installed
- `npm install` to load all dependencies
- `npm run dev` for development
- `npm run build` for production
- `composer update getkirby/cms` to update the Kirby version

## Notes
- No hot module replacement
- Targets latest CSS and JS specifications. Can change that in the scripts.
- `/package.json` has scripts for watching and building
- esbuild is bundling `main.js` and `main.css` with imports. It is also building JS and CSS files in the relevant `/templates` folders to take advantage of Kirby’s template specific CSS and JS autoloading.
- Uses Laravel Valet to make a local dev server. Browsersync proxies this server for live reloading.
- Make sure you change the local dev URL to proxy in the `/package.json` scripts
- Add PostCSS plugins to `/postcss.config.js`. Currently doesn't use any plugins.
- `rsync` scripts must be updated to replace `ftpuser@server:directory` with your specific server’s details.
- Includes a bunch of Kirby blueprints and templates.

## Syncing remote and local files
- rSync scripts set up in `/package.json` to push and pull from prod url
- Base files stored on GitHub
- Stop any dev processes and run `npm run build` first
- **Dry push and pull** to check so you don't overwrite anything unintended
  - `npm run push-content-dry`
  - `npm run push-vendor-dry`
  - `npm run push-assets-dry`
  - `npm run push-templates-dry`
  - `npm run pull-content-dry`
  - `npm run pull-assets-dry`
- Push and pull using the following
  - `npm run push-content`
  - `npm run push-vendor`
  - `npm run push-assets`
  - `npm run push-templates`
  - `npm run pull-content`
  - `npm run pull-assets`

## To-do
- [x] Clean up esbuild npm scripts. Maybe move it to the esbuild JavaScript API instead. Alternatively define variables in package.json?
- [ ] General styles
  - [ ] Mouse glow effect
  - [ ] Fonts
- [ ] Homepage styles
  - [x] Figure out main logo SVG/h1 accessibility
  - [x] Project grid
  - [ ] More projects link
  - [ ] Move ticker logic to /controllers
- [ ] News styles
  - [x] News grid
- [ ] About styles
  - [ ] image treatment
  - [x] publications grid
- [ ] Works styles
  - [x] duplicate homepage styles
- [ ] Project styles
  - [x] Image grid
  - [ ] Lightbox with(?) carousel