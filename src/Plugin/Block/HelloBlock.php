<?php
 
// hello world D8 block
 
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlock.php
 */
 
namespace Drupal\hello\Plugin\Block;
 
use Drupal\block\BlockBase;
use Drupal\block\Annotation\Block;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Hello' block.
 ** @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello world block title")
 * )
 */
class HelloBlock extends BlockBase {
 
  public function access(AccountInterface $account) {
//    return $account->hasPermission('access comments');
    return true;
  }

 
  public function build() {
//    return array('#markup' => 'Hello workd block text !');
//    return array('#markup' => _theme('hello_text', array('text' => 'anonymous')),);
    return array('#markup' => _theme('hello_text', array('text' => \Drupal::config('hello.settings')->get('hello_value'))),);
  }
 
}