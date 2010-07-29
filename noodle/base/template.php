<?php

// let's add some additional js and css
function noodle_preprocess_page(&$vars) {

	//just temporary
	drupal_add_js(drupal_get_path('theme', 'noodle') .'/noodle.js', 'theme');

	if (user_access('administer blocks')) {
	//	drupal_add_js(path_to_theme()  .'/block_edit.js', 'theme');
		drupal_add_js(drupal_get_path('theme', 'noodle') .'/block_edit.js', 'theme');
	}

	// let's add switchtarget.js if the sidebar accordion region is populated 
	if ($vars['sidebar_accordion']) {
		drupal_add_js(drupal_get_path('theme', 'noodle') .'/jquery.switchtarget.js', 'theme');
	}

	// let's add meerkat.js if the bottom message region is populated 
	if ($vars['message_bottom']) {
		drupal_add_js(drupal_get_path('theme', 'noodle') .'/jquery.meerkat.js', 'theme');
	}
	
	// grid support
	// drupal_add_css(drupal_get_path('theme', 'noodle') .'/grid-12.css', 'theme');

	$vars['styles'] = drupal_get_css();
	$vars['scripts'] = drupal_get_js();
}

/**
* Preprocess node.
*/
function noodle_preprocess_node(&$vars, $hook) {
	//block region in node
	$vars['content_inside'] = theme('blocks', 'content_inside');
	//split terms by vocabulary
	$vars['terms_split'] = noodle_print_terms($vars['node']);
	//dsm($vars);
}

/**
* Split out taxonomy terms by vocabulary.
*/
function noodle_print_terms($node){
	$vocabularies = taxonomy_get_vocabularies();
	foreach($vocabularies as $vocabulary){
		if($terms = taxonomy_node_get_terms_by_vocabulary($node, $vocabulary->vid)){	
			$output .= '<div>';
			$output .= '<span>'. $vocabulary->name . ': </span>';
			$output .= '<ul class="links inline">';
			foreach ($terms as $term){
				$output .= '<li class="taxonomy_term_' . $term->tid . '">';
				$output .= l($term->name, taxonomy_term_path($term), array('rel' => 'tag', 'title' => strip_tags($term->description)));
				$output .= '</li>';
			}
			$output .= '</ul>';
			$output .= '</div>';
		}
	}
	return $output;
}

/**
* Block edit links for admins.
*/
function noodle_preprocess_block(&$vars) {
	// block editing code is curtesy block_edit module
  if (user_access('administer blocks')) {
    $block = $vars['block'];

    $vars['block_edit_links_array'] = array();
    $id = 'block-edit-link-'. $block->module .'_'. $block->delta;
    $class = 'block-edit-link';

    // Display 'Configure' link for blocks.
    if ($block->module != 'views') {
      $vars['block_edit_links_array'][] = l(t('[=] '), 'admin/build/block') . l(t('[Configure]'), 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
        array(
          'attributes' => array(
            'title' => t('Configure this block'),
            'id' => $id,
            'class' => $class,
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }

    // Display 'Edit menu' link for menu system blocks.
    if (($block->module == 'menu' || ($block->module == 'user' && $block->delta == 1)) && user_access('administer menu')) {
      $menu_name = ($block->module == 'user') ? 'navigation' : $block->delta;
      $vars['block_edit_links_array'][] = l(t('[Edit menu]'), 'admin/build/menu-customize/' . $menu_name,
        array(
          'attributes' => array(
            'title' => t('Edit this menu'),
            'id' => $id,
            'class' => $class,
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }

    // Display 'Edit menu' link for menu_block blocks.
    elseif ($block->module == 'menu_block' && user_access('administer menu')) {
      list($menu_name, ) = split(':', variable_get("menu_block_{$block->delta}_parent", 'navigation:0'));
      $vars['block_edit_links_array'][] = l(t('[Edit menu]'), 'admin/build/menu-customize/' . $menu_name,
        array(
          'attributes' => array(
            'title' => t('Edit this menu'),
            'id' => $id,
            'class' => $class,
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }

    $original_content = $vars['block']->content;

    $edit_links = '<div class="block-edit-link round" id="'. $id .'">';
    $edit_links .= implode('&nbsp;&nbsp;', $vars['block_edit_links_array']);
    $edit_links .= '</div>';
    
    $vars['block']->content = $edit_links . $original_content;
  }
}


/**
* Theme the output of the comment comment block.
*/
function noodle_comment_block() {
  $items = array();
  foreach (comment_get_recent() as $comment) {
    $items[] = l($comment->subject, 'node/'. $comment->nid, array('fragment' => 'comment-'. $comment->cid)) .'<br />'. t('@time ago', array('@time' => format_interval(time() - $comment->timestamp)));
  }
  if ($items) {
    return theme('item_list', $items);
  }
}

/**
* Implementation of hook_theme().
* Resetting default form values.
*/
function noodle_theme(){
  return array(
    'comment_form' => array(
      'arguments' => array('form' => NULL),
    ),
  );
}

/**
* Theme the output of the comment_form.
* ### still needs more love on rendering more form elements and replacing values
*/
function noodle_comment_form($form) {

	$output = '';
	$output .= '<div class="comment-left">';
	$output .= drupal_render($form['_author']);
	$output .= drupal_render($form['name']);
	$output .= drupal_render($form['mail']);
	$output .= '</div>';
	
	$output .= '<div class="comment-right">';
	$output .= drupal_render($form['homepage']);
	$output .= drupal_render($form['subject']);
	$output .= '</div>';
	
	$output .= '<div class="comment-wide">';
	$output .= '</div>';
	
	$output .= drupal_render($form);
	
	//dsm($form);
	
	return $output;
}

/**
* Preprocess box.
*/
function noodle_preprocess_box(&$vars, $hook) {
	// Adding a wrapper for jqery foldable comment form.
  switch($vars['title']) {
   case 'Post new comment':
    $vars['title'] = '<a href="comment-form-hide" class="comment-hide">' . t('Post new comment') . '</a>';
  }
}

/**
* Theme table sort indicator.
*/
function noodle_tablesort_indicator($style) {
  if ($style == "asc") {
    return theme('image', drupal_get_path('theme', 'noodle') . '/img/arrow-asc.png', t('sort icon'), t('sort ascending'));
  }
  else {
    return theme('image', drupal_get_path('theme', 'noodle') . '/img/arrow-desc.png', t('sort icon'), t('sort descending'));
  }
}

/**
* Add classes to all menus.
*/
function noodle_menu_item_link($link) {
	if (empty($link['localized_options'])) {
		$link['localized_options'] = array();
	}
  $backlink = l($link['title'], $link['href'], $link['localized_options']);
  if (!$GLOBALS['menu_backlink'][$backlink]) {
    $GLOBALS['menu_backlink'][$backlink] = $link;
  }
  return $backlink;
}

function noodle_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
  $class .= ' menu-' . $GLOBALS['menu_backlink'][$link]['mlid'];
  return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}

/**
* Theme buttons.
*/
function noodle_button($element) {
  // Make sure not to overwrite classes.
	if (isset($element['#attributes']['class'])) {
		$element['#attributes']['class'] = 'form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
	}

	else {
		$element['#attributes']['class'] = 'form-'. $element['#button_type'];
	}

	return '<input type="submit" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ') .'id="'. $element['#id'] .'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) .' />';

}


/**
* Reorder links before passing them to default link theme function.
* Original idea taken from href="http://drupal.org/node/44435
*/
function noodle_reorder_links($links, $first_keys = array(), $last_keys = array()) {
    $first_links = array();
    foreach ($first_keys as $key) {
        if (isset($links[$key])) {
            $first_links[$key] = $links[$key];
            unset($links[$key]);
        }
    }
    $links = array_merge($first_links, $links);

    $last_links = array();
    foreach ($last_keys as $key) {
        if (isset($links[$key])) {
            $last_links[$key] = $links[$key];
            unset($links[$key]);
        }
    }
    $links = array_merge($links, $last_links);
    
    return $links;
}

/**
* Override theme_links() so we can reorder the $links array.
*/
function noodle_links($links, $attributes = array('class' => 'links')) {
    // Reorder the links however you need them.
		if($links){
		     $links = noodle_reorder_links($links, array('node_read_more', 'comment_add'), array('statistics_counter'));
		}
    
    // Use the built-in theme_links() function to format the $links array.
    return theme_links($links, $attributes);
}
