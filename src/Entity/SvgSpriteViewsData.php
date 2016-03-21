<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Entity\SvgSprite.
 */

namespace Drupal\svg_sprite\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for SVG Sprite entities.
 */
class SvgSpriteViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['svg_sprite']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('SVG Sprite'),
      'help' => $this->t('The SVG Sprite ID.'),
    );

    return $data;
  }

}
