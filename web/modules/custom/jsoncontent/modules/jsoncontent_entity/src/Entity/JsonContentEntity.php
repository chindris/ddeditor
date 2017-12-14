<?php

namespace Drupal\jsoncontent_entity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\jsoncontent_entity\JsonContentEntityInterface;

/**
 * @ContentEntityType(
 *   id = "jsoncontent_entity",
 *   label = @Translation("JSONConten Entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\jsoncontent_entity\Entity\Controller\JsonContentListBuilder",
 *     "form" = {
 *       "add" = "Drupal\jsoncontent_entity\Form\JsonContentEntityForm",
 *       "edit" = "Drupal\jsoncontent_entity\Form\JsonContentEntityForm",
 *       "delete" = "Drupal\jsoncontent_entity\Form\JsonContentEntityDeleteForm",
 *     },
 *     "access" = "Drupal\jsoncontent_entity\JsonContentEntityAccessControlHandler",
 *   },
 *   base_table = "jsoncontent_entity",
 *   admin_permission = "administer jsoncontent entity",
 *   fieldable = TRUE,
 *   entity_keys = {
 *     "id" = "id"
 *   },
 *   links = {
 *     "canonical" = "/jsoncontent_entity/{jsoncontent_entity}",
 *     "edit-form" = "/jsoncontent_entity/{jsoncontent_entity}/edit",
 *     "delete-form" = "/jsoncontent_entity/{jsoncontent_entity}/delete",
 *     "collection" = "/jsoncontent_entity/list"
  *   },
 *   field_ui_base_route = "jsoncontent_entity.settings",
 * )
 */
class JsonContentEntity extends ContentEntityBase implements JsonContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the JSON Content entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the JSON Content entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    return $fields;
  }
}
