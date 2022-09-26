# About XeFramework

[![Issues](https://img.shields.io/github/issues/XeCreators/xe-framework)](https://github.com/XeCreators/xe-framework/issues)
[![Release Latest](https://img.shields.io/github/v/release/XeCreators/xe-framework?color=yellowgreen)](https://github.com/XeCreators/xe-framework/releases/latest)
[![Downloads](https://img.shields.io/github/downloads/XeCreators/xe-framework/total)](https://github.com/XeCreators/xe-framework/releases/latest)
[![XeFramework Demo](https://img.shields.io/badge/XeFramework-Demo-blue)](https://demos.xecreators.pk/)
![Repo Size](https://img.shields.io/github/repo-size/XeCreators/xe-framework.svg)
[![License](https://img.shields.io/github/license/XeCreators/xe-framework)](https://github.com/XeCreators/xe-framework/blob/master/LICENSE.md)

This is just another WordPress framework. It is built for developers to create awesome and highly customizable themes for clients or sell it on any marketplace.

## Getting Started

1. You must have latest version of [Nodejs](https://nodejs.org/en/) installed.
2. Change folder name to your theme name. e.g: `xurais` or `xu-rais`.
3. Navigate to `node_scripts` folder and open `config.json` with your favorite editor.
    1. Change `"name"` to your theme name eg: `Xurais` or `Xu Rais`.
    2. Change `"proxy"` to your local WordPress site url.
    3. Change `"global"` to a unique prefix. e.g: `xurais` or `xus`.
    4. Change `"build"` to your desired folder path. Your theme will be saved there when run build command.
5. Open command line, navigate to project folder and run `npm install` to install dependencies.
6. Now run `npm run init` command to automatically change text-domain, prefixes, DocBlocks etc to your theme name.
7. Run `npm run serve` command to watch your theme files for changes and auto reload browser. ;-)
8. Once you have completed your theme run `npm run build` command to generate a clean copy of your theme. `.pot` file will also be generated inside languages folder.
9. Run `npm run child` to generate child-theme.
10. To stop auto browser reload use `CTRL+C` in windows and `CMD+C` on mac.

## Features

* Auto browser reload.
* Theme Options (Customizer).
* Highly Customizable and Easy to Customize.
* Bootstrap 4 and Fontawesome 5 Icons.
* Wide, Fluid and Boxed Layout.
* Right, Left or Both Sides Sidebar Supported.
* WooCommerce Ready.
* One Click Demo Import.
* Forever Free.
* Professional and Outstanding Support.
