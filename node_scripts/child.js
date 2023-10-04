
var config = require('./config.json');
var copyDir = require('copy-dir');
var path = require('path');

var name = config.name;
var nameLower = name.toLowerCase();
var nameHyphen = nameLower.replace( / /g, '-' );

var targetUrl = config.build+'/'+nameHyphen+'-child';
var currentTheme = path.resolve( __dirname, '..' );

// Copy Theme
copyDir.sync( currentTheme+'/child/', targetUrl, {

  utimes: true,  // keep add time and modify time
  mode: true,    // keep file mode
  cover: true,    // cover file when exists, default is true

  filter: function( stat, filepath, filename ) {

    // do not want copy files with specific extension
    var extensions = [
      '.psd',
      '.settings'
    ];
    if ( stat === 'file' && extensions.includes( path.extname(filepath) ) ) {
      return false;
    }

    // do not want copy files with specific name and extension
    var fileNames = [
      '.gitignore',
      'package.json',
      'package-lock.json',
      'composer.json',
      'composer.lock',
      'sftp-config.json',
      'build.js',
      'copy.js',
      'init.js',
      'browser_sync.js',
      'README.md',
      'LICENSE.md',
      'mkdocs.yml'
    ];
    if ( stat === 'file' && fileNames.includes( path.basename(filepath) ) ) {
      return false;
    }

    // do not want copy directories
    var directories = [
      '.git',
      '.github',
      '.vscode',
      'node_modules',
      'node_scripts',
      'docs',
      'site',
      'src'
    ];
    if ( stat === 'directory' && directories.includes(path.basename(filename)) ) {
      return false;
    }

    // do not want copy symbolicLink directories
    if ( stat === 'symbolicLink' ) {
      return false;
    }

    return true;  // remind to return a true value when file check passed.

  }

});
console.log( 'Child theme copied successfully.' );
