<?php

namespace Drupal\jsoncontent_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class JsonContentEntityForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $status = parent::save($form, $form_state);

    $entity = $this->entity;
    if ($status == SAVED_UPDATED) {
      drupal_set_message($this->t('The jsoncontent entity %entity has been updated.', ['%entity' => $entity->toLink()->toString()]));
    } else {
      drupal_set_message($this->t('The jsoncontent entity %entity has been added.', ['%entity' => $entity->toLink()->toString()]));
    }

    $form_state->setRedirectUrl($this->entity->toUrl('collection'));
    return $status;
  }
}
