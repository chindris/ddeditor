<?php

namespace Drupal\jsoncontent\Plugin\Field\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * The default widget for the jsoncontent field type.
 *
 * @FieldWidget(
 *   id = "jsoncontent_widget",
 *   label = @Translation("JSON Content default"),
 *   field_types = {
 *     "jsoncontent",
 *   }
 * )
 */
class JsonContentWidget extends WidgetBase  implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = $element + [
      '#type' => 'textarea',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
    ];
    return $element;
  }
}
