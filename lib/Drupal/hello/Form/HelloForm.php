<?php
 
/**
* @file
* Contains \Drupal\hello\Form\HelloForm.
*/
 
namespace Drupal\hello\Form;
 
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormBase; 

//class HelloForm implements FormInterface {
class HelloForm extends FormBase {
 
  public function getFormID() {
    return 'hello_form';
  }

  public function buildForm(array $form, array &$form_state) {
    $form['hello_config'] = array(
      '#type' => 'textfield',
      '#title' => t('Who are you ?'),
      '#size' => 60,
      '#description' => t('This text will appear in the hello world block.'),
      '#default_value' => config('hello.settings')->get('hello_value'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
    return $form;
  }
 

  public function submitForm(array &$form, array &$form_state) {
    config('hello.settings')
      ->set('hello_value', $form_state['values']['hello_config'])
      ->save(); 
  }
 
}
