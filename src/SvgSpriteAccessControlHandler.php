<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\SvgSpriteAccessControlHandler.
 */

namespace Drupal\svg_sprite;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the SVG Sprite entity.
 *
 * @see \Drupal\svg_sprite\Entity\SvgSprite.
 */
class SvgSpriteAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\svg_sprite\SvgSpriteInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished svg sprite entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published svg sprite entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit svg sprite entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete svg sprite entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add svg sprite entities');
  }

}
