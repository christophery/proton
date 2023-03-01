# Proton

Proton is a simple personal blogging theme for WordPress. 

This theme is inspired by [Casper](https://github.com/TryGhost/Casper) 5.0, the default theme from the [Ghost](https://ghost.org/) blogging platform. The goal of this theme was to port Casper 5.0 to WordPress while adding personal & opinionated changes.

Feel free to [contact me](https://chrisyee.ca/contact/) if you use Proton in one of your websites.

[View Demo](https://chrisyee.ca/) | [Download Theme](https://github.com/christophery/proton/releases)

![Proton Screenshot](screenshot.png?raw=true)

## Features

- [Gutenberg Editor](https://wordpress.org/gutenberg/) Support
- Search
- Comments
- Customizer
- Social Profiles
- Responsive Design
- Infinite Scroll ([with Jetpack](https://jetpack.com/features/design/infinite-scroll/))
- Dark Mode

## Requirements

- [WordPress](http://wordpress.org/)

## Install

1. In your admin panel, go to **Appearance** > **Themes** and click the **Add New** button.
2. Click **Upload Theme** and **Choose File**, then select the theme's .zip file. Click **Install Now**.
3. Click **Activate** to use your new theme right away.

## Color Scheme

Dark mode is not enabled by default. To enable this feature go to **Appearance** > **Customize** > **Site Identity** > **Color Scheme**.

### Light (default)
This will display the theme in light mode for everyone.

### Dark
This will display the theme in dark mode for everyone.

### Auto
This will automatically adjust the appearance based on the users OS appearance/color preference.

## Editing Proton
The recommended way to edit the theme is to [create a child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/).

This will ensure that none of your changes will be lost when you update the theme.

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

Casper, Copyright (c) 2013-2022 [Ghost Foundation](https://ghost.org/)  
**License:** [MIT license](https://github.com/TryGhost/Casper/blob/master/LICENSE).  
**Source:** [https://github.com/TryGhost/Casper](https://github.com/TryGhost/Casper)  

_s, Copyright 2015-2018 [Automattic, Inc.](https://automattic.com/)  
**License:** [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)  
**Source:** [https://github.com/Automattic/_s/](https://github.com/Automattic/_s/)