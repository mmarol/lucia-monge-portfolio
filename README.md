## Kirby + Laravel Mix Starter
- Kirby installed through composer for easy updating
- Laravel Mix for JS and CSS asset compiling, as well as live reloading

## Setup
- `composer install` to make sure kirby is installed
- `npm install` to load all dependencies
- `npx mix watch` for development
- `npm mix --production` for production
- `composer update getkirby/cms` to update the Kirby version

## Notes
- `/package.json` has scripts for watching and building
- Uses Laravel Valet to make a local dev server. Laravel Mix proxies this server for live reloading.
- Make sure you change the local dev URL to proxy in the `/package.json` scripts

## To-do
- [ ] figure out rsync
