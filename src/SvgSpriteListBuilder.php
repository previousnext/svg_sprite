<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\SvgSpriteListBuilder.
 */

namespace Drupal\svg_sprite;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of SVG Sprite entities.
 *
 * @ingroup svg_sprite
 */
class SvgSpriteListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('SVG Sprite ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\svg_sprite\Entity\SvgSprite */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.svg_sprite.edit_form', array(
          'svg_sprite' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
