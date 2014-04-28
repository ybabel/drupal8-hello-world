<?php
 
// hello world D8 block
 
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlock.php
 */
 
namespace Drupal\hello\Plugin\Block;
 
use Drupal\block\BlockBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Component\Utility\String;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Hello' block.
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello Block Title"),
 *   module = "hello"
 * )
 */
class HelloBlock extends BlockBase {
 
  public function access(AccountInterface $account) {
    return $account->hasPermission('access content');
  }

 
  public function build() {
    // Block level setting
    $name = $this->configuration['hello_block_name'];
    // Module global setting
    $text = \Drupal::config('hello.settings')->get('hello_text');

    $default_conf = $this->defaultConfiguration();
    $default_name = $default_conf['hello_block_name'];
    if (isset($name) && $name !== $default_name) {
      $render_array = array(
        '#theme' => 'hello_default',
        '#hello_text' => String::checkPlain($text),
        '#hello_name' => String::checkPlain($name)
      );
    } else {
      $render_array = array(
        '#markup' => 'No name configured yet'
      );
    }
    return $render_array;

  }
 
  public function blockSubmit($form, &$form_state) {
    $this->configuration['hello_block_name'] = $form_state['values']['hello_block_name'];
  }

  public function blockForm($form, &$form_state) {
    $form['hello_block_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#size' => 15,
      '#description' => t('Name of the person to greet'),
      '#default_value' => $this->configuration['hello_block_name'],
    );

    return $form;
  }

  public function defaultConfiguration() {
    return array(
      'hello_block_name' => t('Default Name'),
    );
  }

}
