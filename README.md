# Grav MixItUp Plugin

`mixitup` is a [Grav](http://github.com/getgrav/grav) plugin that adds a unique blog layout with filterable results based on Grav's included taxonomy tags.
It uses the jQuery plugin [MixItUp](https://mixitup.kunkalabs.com/), hence the name.

MixItUp Licenses
=========

For use in commercial projects and products MixItUp requires that you purchase a commercial license.

For more information see [mixitup.kunkalabs.com/licenses](https://mixitup.kunkalabs.com/licenses).


# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `mixitup`.

You should now have all the plugin files under

	/your/site/grav/user/plugins/mixitup


# Digging Deeper

You can find out more about the script used in this plugin here [mixitup](https://mixitup.kunkalabs.com/).

Use page headers to tweak the settings that Mixitup comes with. 

*Use the following example as a new menu item with the [Grav Skeleton Blog Site](https://github.com/getgrav/grav-skeleton-blog-site) to see Mixitup in action*

eg:

```
---
title: 'Mixitup Demo'
body_classes: 'header-image fullwidth'
menu: Mixitup
content:
    items:
       @taxonomy.category: [blog]
---

# Mixitup Blog Tests
## Blog articles should be sortable by tag!
```

