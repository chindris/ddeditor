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
      $render_controller = \Drupal::entityTypeManager()->getViewBuilder($item->value['entityType']);
      $entity = \Drupal::entityTypeManager()->getStorage($item->value['entityType'])->create($item->value);
      $element[$delta] = $render_controller->view($entity, 'full', $langcode);
    }

    return $element;
  }
}
