<?php

namespace Drupal\jsoncontent\Plugin\Field\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Default formatter for the jsoncontent field type.
 *
 * @FieldFormatter(
 *   id = "jsoncontent_formatter",
 *   label = @Translation("JSON Content default"),
 *   field_types = {
 *     "jsoncontent"
 *   }
 * )
 */
class JsonContentFormatter extends JsonContentFormatterBase {

  public function viewFieldElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      foreach ($item->value as $entity_meta) {
        $render_controller = \Drupal::entityTypeManager()->getViewBuilder($entity_meta['entityType']);
        $entity = \Drupal::entityTypeManager()->getStorage($entity_meta['entityType'])->create($entity_meta);
        $element[$delta][] = $render_controller->view($entity, 'full', $langcode);
      }
    }

    return $element;
  }
}
