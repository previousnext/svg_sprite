<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Form\SvgSpriteForm.
 */

namespace Drupal\svg_sprite\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for SVG Sprite edit forms.
 *
 * @ingroup svg_sprite
 */
class SvgSpriteForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\svg_sprite\Entity\SvgSprite */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label SVG Sprite.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label SVG Sprite.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.svg_sprite.canonical', ['svg_sprite' => $entity->id()]);
  }

}
