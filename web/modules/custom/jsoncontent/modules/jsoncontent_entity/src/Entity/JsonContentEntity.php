<?php

namespace Drupal\jsoncontent_entity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\jsoncontent_entity\JsonContentEntityInterface;

/**
 * @ContentEntityType(
 *   id = "jsoncontent_entity",
 *   label = @Translation("JSONContent Entity"),
 *   bundle_label = @Translation("JSONContent Entity type"),
 *   handlers = {
 *     "storage" = "Drupal\jsoncontent_entity\JsonContentEntityStorage",
 *     "storage_schema" = "Drupal\jsoncontent_entity\JsonContentEntityStorageSchema",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\jsoncontent_entity\Entity\Controller\JsonContentListBuilder",
 *     "form" = {
 *       "add" = "Drupal\jsoncontent_entity\Form\JsonContentEntityForm",
 *       "edit" = "Drupal\jsoncontent_entity\Form\JsonContentEntityForm",
 *       "delete" = "Drupal\jsoncontent_entity\Form\JsonContentEntityDeleteForm",
 *     },
 *     "access" = "Drupal\jsoncontent_entity\JsonContentEntityAccessControlHandler",
 *   },
 *   admin_permission = "administer jsoncontent entity",
 *   fieldable = TRUE,
 *   entity_keys = {
 *     "id" = "id",
 *     "bundle" = "type",
 *   },
 *   bundle_entity_type = "jsoncontent_entity_type",
 *   links = {
 *     "canonical" = "/jsoncontent_entity/{jsoncontent_entity}",
 *     "edit-form" = "/jsoncontent_entity/{jsoncontent_entity}/edit",
 *     "delete-form" = "/jsoncontent_entity/{jsoncontent_entity}/delete",
 *     "collection" = "/jsoncontent_entity/list"
  *   },
 *   field_ui_base_route = "entity.jsoncontent_entity_type.edit_form",
 * )
 */
class JsonContentEntity extends ContentEntityBase implements JsonContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the JSON Content entity.'))
      ->setReadOnly(TRUE);

    $fields['type'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Type'))
      ->setDescription(t('The jsoncontent entity type.'))
      ->setSetting('target_type', 'jsoncontent_entity_type')
      ->setReadOnly(TRUE);
    return $fields;
  }
}
