/* $Id$ */

READ ME FOR NOODLE THEME (BASE THEME BY NOOD.ORG)

This theme is for Drupal v.6

CONCEPT:

This theme is targeted primarily for developers and themers. The theme was developed to allow rapid creation of custom (sub)themes. It includes basic styles and features which I found to be useful on majority of projects over years: from less complicated blogs to more complex corporate sites. Compared to many existing Drupal theme frameworks it works right away, it is lightweight, there are no zillion of settings to obey. Actually, I believe the majority of theme setting should be hardcoded anyway not to allow final user to ruin the original design. Yep I'm a Mac boy ;)

BROWSER COMPATIBILITY:

IE (6,7,8), WebKit (Safari, Chrome), Mozilla (FireFox, Camino, SeaMonkey), Opera (8,9,10). The theme also was created to support older mobile browsers and screen readers.

FEATURES:

Blocks:
- 19 block regions (you can disable them in subtheme.info file)
- accordion block region in the sidebar (nice to crop less used content)
- meerkat block region at the bottom (http://meerkat.jarodtaylor.com/)
- block region in node
- on mouse over block edit badges at any place

Comments:
- nicely styled comments
- compact comment forms
- foldable comment forms to save screen space
- nice forums

More:
- any menu has its own CSS class (even in blocks)
- additional page class with domain name
- ... TBC (to-do)


INSTALLATION:

Just put the whole noodle 'noodle' folder under your themes directory of choice (say /sites/all/themes/). Enable the base theme or any of the subthemes.

TIP: do rearrange your blocks to fit in new block regions. If you don't see navigation just go to http://YOURSITE.COM/admin/build/block


DIRECTORY STRUCTURE:

[themes-folder]
-/noodle
--/base (base theme, don't delete)
---/img (images for base theme)
---/doc (documentation)
--/subtheme
---/img (images for your theme)

CUSTOM MAINTENANCE PAGE:

If you want to enable theme's clean just add following snipet to your settings.php:

$conf = array(
  'maintenance_theme' => 'noodle',
);

If you already use some configuration settings you gust have to add:
  'maintenance_theme' => 'noodle',

