<?php
/**
 * @file
 * alter.inc
 *
 * Contains various implementations of hook_*_alter().
 */


/**
 * Implements hook_element_info_alter().
 */
function mcplBootstrap3_element_info_alter(&$elements) {
  foreach ($elements as &$element) {
    // Process all elements.
    $element['#process'][] = '_mcplBootstrap3_process_element';
    // Process input elements.
    if (!empty($element['#input'])) {
      $element['#process'][] = '_mcplBootstrap3_process_input';
    }
    // Process core's fieldset element.
    if (!empty($element['#type']) && $element['#type'] === 'fieldset') {
      $element['#theme_wrappers'] = array('bootstrap_panel');
    }
    if (!empty($element['#theme']) && $element['#theme'] === 'fieldset') {
      $element['#theme'] = 'mcplBootstrap3_panel';
    }
    // Replace #process function.
    if (!empty($element['#process']) && ($key = array_search('form_process_fieldset', $element['#process'])) !== FALSE) {
      $element['#process'][$key] = '_mcplBootstrap3_process_fieldset';
    }
    // Replace #pre_render function.
    if (!empty($element['#pre_render']) && ($key = array_search('form_pre_render_fieldset', $element['#pre_render'])) !== FALSE) {
      $element['#pre_render'][$key] = '_mcplBootstrap3_pre_render_fieldset';
    }
    // Replace #theme_wrappers function.
    if (!empty($element['#theme_wrappers']) && ($key = array_search('fieldset', $element['#theme_wrappers'])) !== FALSE) {
      $element['#theme_wrappers'][$key] = 'bootstrap_panel';
    }
  }
}


/**
 * Include #pre_render callbacks for elements.
 */
mcplBootstrap3_include('mcplBootstrap3', 'theme/pre-render.inc');

/**
 * Include #process callbacks for elements.
 */
mcplBootstrap3_include('mcplBootstrap3', 'theme/process.inc');
