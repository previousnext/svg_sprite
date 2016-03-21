<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Plugin\Field\FieldWidget\SpriteWidget.
 */

namespace Drupal\svg_sprite\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'sprite_widget' widget.
 *
 * @FieldWidget(
 *   id = "sprite_widget",
 *   label = @Translation("Sprite widget"),
 *   field_types = {
 *     "sprite_field"
 *   }
 * )
 */
class SpriteWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = [];

    $element['sprite_id'] = $element + [
        '#type' => 'textfield',
        '#default_value' => isset($items[$delta]->sprite_id) ? $items[$delta]->sprite_id : NULL,
        '#size' => $this->getSetting('size'),
        '#placeholder' => $this->getSetting('placeholder'),
        '#maxlength' => $this->getFieldSetting('max_length'),
      ];
    $element['width'] = [
      '#type' => 'number',
      '#title' => $this->t('Width'),
      '#default_value' => isset($items[$delta]->width) ? $items[$delta]->width : 1,
      '#size' => 4,
    ];
    $element['height'] = [
      '#type' => 'number',
      '#title' => $this->t('Height'),
      '#default_value' => isset($items[$delta]->height) ? $items[$delta]->height : 1,
      '#size' => 4,
    ];
    $element['role'] = [
      '#type' => 'select',
      '#title' => $this->t('Role'),
      '#default_value' => isset($items[$delta]->role) ? $items[$delta]->role : 'presentation',
      '#options' => [
        'img' => $this->t('img'),
        'presentation' => $this->t('presentation'),
      ],
    ];

    return $element;
  }

}
