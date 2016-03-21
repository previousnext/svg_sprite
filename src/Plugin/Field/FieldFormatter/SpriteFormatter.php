<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Plugin\Field\FieldFormatter\SpriteFormatter.
 */

namespace Drupal\svg_sprite\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'sprite_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "sprite_formatter",
 *   label = @Translation("Sprite formatter"),
 *   field_types = {
 *     "sprite_field"
 *   }
 * )
 */
class SpriteFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    /* @var \Drupal\Core\Field\FieldItemInterface $item */
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'svg_sprite',
        '#sprite_id' => $item->get('sprite_id'),
        '#width' => $item->get('width'),
        '#height' => $item->get('height'),
        '#role' => $item->get('role'),
      ];
    }

    return $elements;
  }

}
