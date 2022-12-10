
For theme options we use [Kirki Customizer Framework](https://kirki.org/) which is a complete toolkit for WordPress theme developers. Please check out their documentation on how to add panels, sections and controls. 

## Options Folder

Customizer options are auto-loaded from `/models/theme-options/` folder, you don't need to include them. You can delete existing options if not needed or add more as per [Kirki Customizer Framework](https://kirki.org/docs/) documentation.

## Priority

If you open `theme-options.php` file inside `/models/` folder you will notice that there is an array to define priority for customizer panels/sections. Priority can be easily added for new panels/sections. 

    De::$priority = array(
      // ...
    );

`$priority` is a static property of [Class Defaults](defaults.md) which lives inside `Helpers` namespace.

<br>
