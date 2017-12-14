<?php

namespace Drupal\jsoncontent\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

abstract class JsonContentFormatterBase extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    foreach ($items as $delta => &$item) {
      $item->value = json_decode($item->value, TRUE);
    }
    return $this->viewFieldElements($items, $langcode);
  }

  abstract public function viewFieldElements(FieldItemListInterface $items, $langcode);
}