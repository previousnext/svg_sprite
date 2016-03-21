<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Form\SvgSpriteSettingsForm.
 */

namespace Drupal\svg_sprite\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SvgSpriteSettingsForm.
 *
 * @package Drupal\svg_sprite\Form
 *
 * @ingroup svg_sprite
 */
class SvgSpriteSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'SvgSprite_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Defines the settings form for SVG Sprite entities.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   Form definition array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['SvgSprite_settings']['#markup'] = 'Settings form for SVG Sprite entities. Manage field settings here.';
    return $form;
  }

}
