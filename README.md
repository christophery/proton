# Proton

Proton is a personal blogging theme for WordPress. This theme is a port of Proton v5.0 the default theme for the Ghost blogging platform.

# Development

Proton styles are compiled using Gulp/PostCSS to polyfill future CSS spec. You'll need [Node](https://nodejs.org/), [Yarn](https://yarnpkg.com/) and [Gulp](https://gulpjs.com) installed globally. After that, from the theme's root directory:

```bash
# install dependencies
yarn install

# run development server
yarn dev
```

Now you can edit `/assets/css/` files, which will be compiled to `/assets/built/` automatically.

The `zip` Gulp task packages the theme files into `dist/<theme-name>.zip`, which you can then upload to your site.

```bash
# create .zip file
yarn zip
```

# PostCSS Features Used

- Autoprefixer - Don't worry about writing browser prefixes of any kind, it's all done automatically with support for the latest 2 major versions of every browser.
- [Color Mod](https://github.com/jonathantneal/postcss-color-mod-function)


# SVG Icons

Proton uses inline SVG icons, included. You can find all icons inside /template-parts/icons.

To use an icon just use the get_template_part() function:

```
<?php get_template_part('template-parts/icons/website'); ?>
```

# Third-party resources:

Casper, Copyright (c) 2013-2022 Ghost Foundation
License: MIT license.
Source: https://github.com/TryGhost/Casper