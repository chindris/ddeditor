<?php

namespace Drupal\jsoncontent_entity\Plugin\Field\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\jsoncontent\Plugin\Field\FieldFormatter\JsonContentFormatterBase;

/**
 * Entity formatter for the jsoncontent field type.
 *
 * @FieldFormatter(
 *   id = "jsoncontent_entity_formatter",
 *   label = @Translation("JSONContent Entity View"),
 *   field_types = {
 *     "jsoncontent"
 *   }
 * )
 */
class JsonContentEntityFormatter extends JsonContentFormatterBase {

  public function viewFieldElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      foreach ($item->value as $entity_meta) {
        // @todo: inject the entityTypeManager service.
        $render_controller = \Drupal::entityTypeManager()->getViewBuilder($entity_meta['entityType']);
        $entity = \Drupal::entityTypeManager()->getStorage($entity_meta['entityType'])->create($entity_meta);
        $element[$delta][] = $render_controller->view($entity, 'full', $langcode);
      }
    }

    return $element;
  }
}
