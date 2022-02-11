
var config = require('./config.json');
var copydir = require('copy-dir');
var path = require('path');

var name = config.name;
var nameLower = name.toLowerCase();
var nameHyphen = nameLower.replace(/ /g, '-');
var nameUnderscores = nameLower.replace(/ /g, '_');

var targetUrl = config.build+'/'+nameHyphen+'-child';
var currentTheme = path.resolve(__dirname, '..');

// Copy Theme
copydir.sync( currentTheme+'/child/', targetUrl, {

  utimes: true,  // keep add time and modify time
  mode: true,    // keep file mode
  cover: true,    // cover file when exists, default is true

  filter: function(stat, filepath, filename) {

    // do not want copy directories
    if (stat === 'directory' && path.basename(filename) === '.vscode') {
      return false;
    }
    if (stat === 'directory' && path.basename(filename) === 'node_modules') {
      return false;
    }
    if (stat === 'directory' && path.basename(filename) === 'node_scripts') {
      return false;
    }

    // do not want copy files with specific extension
    if (stat === 'file' && path.extname(filepath) === '.psd') {
      return false;
    }
    if (stat === 'file' && path.extname(filepath) === '.settings') {
      return false;
    }

    // do not want copy files with specific name and extension
    if (stat === 'file' && path.basename(filepath) === 'package.json') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'package-lock.json') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'sftp-config.json') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'build.js') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'copy.js') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'init.js') {
      return false;
    }
    if (stat === 'file' && path.basename(filepath) === 'browser_sync.js') {
      return false;
    }

    // do not want copy symbolicLink directories
    if (stat === 'symbolicLink') {
      return false;
    }

    return true;  // remind to return a true value when file check passed.

  }

});
console.log('Child theme copied successfully.');