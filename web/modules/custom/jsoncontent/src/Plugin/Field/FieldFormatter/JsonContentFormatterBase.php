<?php

namespace Drupal\jsoncontent\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Default (raw) formatter for the jsoncontent field type.
 *
 * @FieldFormatter(
 *   id = "jsoncontent_formatter",
 *   label = @Translation("JSONContent Raw"),
 *   field_types = {
 *     "jsoncontent"
 *   }
 * )
 */
class JsonContentFormatterBase extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    foreach ($items as $delta => &$item) {
      $item->value = json_decode($item->value, TRUE);
    }
    return $this->viewFieldElements($items, $langcode);
  }

  public function viewFieldElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      foreach ($item->value as $entity_meta) {
        $element[$delta]['#markup'] = json_encode($entity_meta);
      }
    }

    return $element;
  }
}
