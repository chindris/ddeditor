<?php

namespace Drupal\jsoncontent_entity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class JsonContentEntitySettingsForm extends FormBase {

  public function getFormId() {
    return 'jsoncontent_entity_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['jsoncontent_entity_settings']['#markup'] = 'Settings form for JSONContent Entity. Manage field settings here.';
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }
}
