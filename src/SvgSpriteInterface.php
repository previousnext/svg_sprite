<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\SvgSpriteInterface.
 */

namespace Drupal\svg_sprite;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining SVG Sprite entities.
 *
 * @ingroup svg_sprite
 */
interface SvgSpriteInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the SVG Sprite name.
   *
   * @return string
   *   Name of the SVG Sprite.
   */
  public function getName();

  /**
   * Sets the SVG Sprite name.
   *
   * @param string $name
   *   The SVG Sprite name.
   *
   * @return \Drupal\svg_sprite\SvgSpriteInterface
   *   The called SVG Sprite entity.
   */
  public function setName($name);

  /**
   * Gets the SVG Sprite creation timestamp.
   *
   * @return int
   *   Creation timestamp of the SVG Sprite.
   */
  public function getCreatedTime();

  /**
   * Sets the SVG Sprite creation timestamp.
   *
   * @param int $timestamp
   *   The SVG Sprite creation timestamp.
   *
   * @return \Drupal\svg_sprite\SvgSpriteInterface
   *   The called SVG Sprite entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the SVG Sprite published status indicator.
   *
   * Unpublished SVG Sprite are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the SVG Sprite is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a SVG Sprite.
   *
   * @param bool $published
   *   TRUE to set this SVG Sprite to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\svg_sprite\SvgSpriteInterface
   *   The called SVG Sprite entity.
   */
  public function setPublished($published);

}
