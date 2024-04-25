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


## To-do

