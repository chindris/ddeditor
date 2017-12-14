<?php

namespace Drupal\jsoncontent_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * JSON Content Entity Type
 *
 * @ConfigEntityType(
 *   id = "jsoncontent_entity_type",
 *   label = @Translation("JSONContent Entity Type"),
 *   bundle_of = "jsoncontent_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *   },
 *   config_prefix = "jsoncontent_entity_type",
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\jsoncontent_entity\Form\JsonContentEntityTypeForm",
 *       "edit" = "Drupal\jsoncontent_entity\Form\JsonContentEntityTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\jsoncontent_entity\Controller\JsonContentEntityTypeListBuilder",
 *   },
 *   admin_permission = "administer site configuration",
 *   links = {
 *     "edit-form" = "/admin/structure/jsoncontent_entity_type/{jsoncontent_entity_type}/edit",
 *     "delete-form" = "/admin/structure/jsoncontent_entity_type/{jsoncontent_entity_type}/delete",
 *     "collection" = "/admin/structure/jsoncontent_entity_type",
 *   }
 * )
 */
class JsonContentEntityType extends ConfigEntityBundleBase {

}
