<?php

/**
 * @file
 * Contains \Drupal\svg_sprite\Plugin\Field\FieldType\SpriteField.
 */

namespace Drupal\svg_sprite\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'sprite_field' field type.
 *
 * @FieldType(
 *   id = "sprite_field",
 *   label = @Translation("Sprite"),
 *   description = @Translation("Stores information about an individual sprite."),
 *   default_widget = "sprite_widget",
 *   default_formatter = "sprite_formatter"
 * )
 */
class SpriteField extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    // Prevent early t() calls by using the TranslatableMarkup.
    $properties['sprite_id'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Sprite ID'))
      ->setSetting('case_sensitive', $field_definition->getSetting('case_sensitive'))
      ->setRequired(TRUE);
    $properties['width'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Width'))
      ->setRequired(TRUE);
    $properties['height'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Height'))
      ->setRequired(TRUE);
    $properties['role'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Role'))
      ->setRequired(TRUE);
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = [
      'columns' => [
        'sprite_id' => [
          'type' => 'varchar_ascii',
          'length' => 64,
          'not null' => TRUE,
        ],
        'width' => [
          'type' => 'int',
          'unsigned' => TRUE,
          'not null' => TRUE,
        ],
        'height' => [
          'type' => 'int',
          'unsigned' => TRUE,
          'not null' => TRUE,
        ],
        'role' => [
          'type' => 'varchar_ascii',
          'not null' => TRUE,
          'length' => 64,
        ],
      ],
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $sprite_id = $this->get('sprite_id')->getValue();
    $width = $this->get('width')->getValue();
    $height = $this->get('height')->getValue();
    $role = $this->get('role')->getValue();
    return empty($sprite_id) && empty($width) && empty($height) && empty($role);
  }

}
