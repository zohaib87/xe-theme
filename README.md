# About XeFramework

[![Issues](https://img.shields.io/github/issues/XeCreators/xe-framework)](https://github.com/XeCreators/xe-framework/issues)
[![Download Latest](https://img.shields.io/github/downloads/XeCreators/xe-framework/total)](https://github.com/XeCreators/xe-framework/releases/latest)
[![Release Latest](https://img.shields.io/github/v/release/XeCreators/xe-framework?color=yellowgreen)](https://github.com/XeCreators/xe-framework/releases/latest)
[![XeFramework Demo](https://img.shields.io/badge/XeFramework-demo-blue)](https://demos.xecreators.pk/)
![Repo Size](https://img.shields.io/github/repo-size/XeCreators/xe-framework.svg)
[![License](https://img.shields.io/badge/License-GPL-2.0-orange.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)

This is just another WordPress framework. It is built for developers to create awesome and highly customizable themes for clients or sell it on any marketplace.

## Getting Started

1. You must have latest version of [Nodejs](https://nodejs.org/en/) installed.
2. Install `gulp` globally using `npm install gulp -g` from your command line.
3. Change folder name to your theme name. e.g: `xurais` or `xu-rais`.
4. Navigate to `node_scripts` folder and open `config.json` with your favorite editor, Change `"name"` to your theme name eg: `Xurais` or `Xu Rais` and change the `"proxy"` to your local WordPress site url.
5. Open command line, navigate to project folder and run `npm install` to install dependencies.
6. Now run `gulp init` command to automatically change text-domain, prefixes, DocBlocks etc to your theme name.
7. Run `gulp` command to watch your theme files for changes and start making an awesome WordPress Theme. ;-)
8. Once you have completed your theme run `gulp build` command to generate a clean copy of your theme on desktop. `.pot` file will also be generated inside languages folder.
9. Run `gulp child` to generate child-theme.

## Useful Commands

* `gulp css`: Concatenate and minify CSS files.
* `gulp js`: Concatenate and minify JS files.
* `gulp img`: Optimize images.
* To automate all the above just use `gulp`. To stop automation use `CTRL+C` in windows and `CMD+C` on mac.

## Features

* Auto browser reload.
* Auto/manual `concatenate` or `minify` CSS and JavaScript files.
* Auto/manual `image optimization`.
* Theme Options (Customizer).
* Highly Customizable and Easy to Customize.
* Bootstrap 4 and Fontawesome 5 Icons.
* Wide, Fluid and Boxed Layout.
* Right, Left or Both Sides Sidebar Supported.
* WooCommerce Ready.
* One Click Demo Import.
* Forever Free.
* Professional and Outstanding Support.
