<?php
 
/**
* @file
* Contains \Drupal\hello\Form\HelloForm.
*/
 
namespace Drupal\hello\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelloForm extends ConfigFormBase {
 
  /**
   * The configuration object.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * Constructs a HelloForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config_factory
   *   The factory for configuration objects.
   */
  public function __construct(ConfigFactory $config_factory) {
    parent::__construct($config_factory);
    $this->config = $this->config('hello.settings');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  public function getFormID() {
    return 'hello_form';
  }

  public function buildForm(array $form, array &$form_state) {
    $form['hello_text'] = array(
      '#type' => 'textfield',
      '#title' => t('Greeting text ?'),
      '#size' => 60,
      '#description' => t('This text will be used to greet people in Hello Block.'),
      '#default_value' => $this->config->get('hello_text'),
    );

    return parent::buildForm($form, $form_state);
  }
 

  public function submitForm(array &$form, array &$form_state) {
    parent::submitForm($form, $form_state);
    $this->config
      ->set('hello_text', $form_state['values']['hello_text'])
      ->save(); 
  }
 
}
