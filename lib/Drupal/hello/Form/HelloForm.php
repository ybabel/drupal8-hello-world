<?php
 
/**
* @file
* Contains \Drupal\hello\Form\HelloForm.
*/
 
namespace Drupal\hello\Form;
 
use Drupal\Core\Form\FormInterface;
 
/**
* Provides a simple example form.
*/
class HelloForm implements FormInterface {
 
/**
* Implements \Drupal\Core\Form\FormInterface::getFormID().
*/
public function getFormID() {
return 'hello_form';
}
 
/**
* Implements \Drupal\Core\Form\FormInterface::buildForm().
*/
public function buildForm(array $form, array &$form_state) {
// Use the Form API to define form elements.
    $form['hello_welcome'] = array(
      '#type' => 'textfield',
      '#title' => t('Welcome message'),
      '#size' => 60,
      '#description' => t('This text will appear in the hello world block.'),
      '#default_value' => 'Hello text by default',
    );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );
return $form;
}
 
/**
* Implements \Drupal\Core\Form\FormInterface::validateForm().
*/
public function validateForm(array &$form, array &$form_state) {
// Validate the form values.
}
 
/**
* Implements \Drupal\Core\Form\FormInterface::submitForm().
*/
public function submitForm(array &$form, array &$form_state) {
// Do something useful.
}
 
}
