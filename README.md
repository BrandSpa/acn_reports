# ACN International [![Build Status](https://semaphoreci.com/api/v1/developersoul/acn_int/branches/master/shields_badge.svg)](https://semaphoreci.com/developersoul/acn_int)

### Wordpress Shortcode
[Documentation](https://codex.wordpress.org/Shortcode_API)

### Visual composer Map
[Documentation](https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524332)

### install javascript dependencies
First install node version higher to 6 [link to download](https://nodejs.org/en/)

```bash
npm install
``` 
Yarn it's like npm, but more faster 
```bash
npm i -g yarn
yarn install
``` 

### Run Tests
```bash
yarn jest
```

### Compile frontend
[webpack](https://webpack.js.org/) compile all js and sass
```bash
yarn build
```

### deploy 
```bash
ssh -i key.pem user@ip 'cd wp/wp-content/themes/acn_int && git pull origin master'
```

### install php dependencies
Only neccesary when a new copy the this theme is installed
[composer](https://getcomposer.org/)
```bash
composer install
``` 

## frontend
- [babel](https://babeljs.io/)
- [react](https://facebook.github.io/react/)
- [axios](https://github.com/mzabriskie/axios)
- [sass](http://sass-lang.com/)

#### tests
- [jest](https://facebook.github.io/jest/)
- [enzyme](http://airbnb.io/enzyme/)
- [moxios for mock ajax requests](https://github.com/mzabriskie/moxios)

## backend
- Wordpress

## notes 
All javascript it's written on ecmacript 6 or es2015 then compiled with babel and webpack to ecmascript 5

## todos
- [ ] help code to be more readable with async/await.
- [ ] fix tests and improve it.
