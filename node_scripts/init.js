
var replace = require('replace-in-file');
var config = require('./config.json');
var path = require('path');

var name = config.name;
var nameLower = name.toLowerCase();
var nameHyphen = nameLower.replace(/ /g, '-');
var nameUnderscores = nameLower.replace(/ /g, '_');

var txtDomain = "'"+nameHyphen+"'";
var funcNames = nameUnderscores+"_";
var styleCss = "Text Domain: "+nameHyphen;
var dockBlocks = " "+name;
var preHandles = nameHyphen+"-";
var gloVars = nameUnderscores+"_opt";
var preClasses = name.replace(/ /g, '_')+"_";

var currentTheme = path.resolve(__dirname, '..');

// Replacing strings
var options = {
  files: [
    currentTheme+'/style.css',
    currentTheme+'/**/*.php',
    currentTheme+'/readme.txt',
  ],
  from: [/'_xe'/g, /_xe_/g, /Text Domain: _xe/g, / _xe/g, /_xe-/g, /xe_opt/g, /Xe_/g],
  to: [txtDomain, funcNames, styleCss, dockBlocks, preHandles, gloVars, preClasses],
};

try {
  var results = replace.sync(options);
  console.log('Text Domains, Function Names, Dock Blocks, Prefix Handles and Classes replaced.');
  // console.log('Replacement results:', results);
}
catch (error) {
  console.error('Error occurred:', error);
}
