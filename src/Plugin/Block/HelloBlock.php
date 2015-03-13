<?php
 
// hello world D8 block
 
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlock.php
 */
 
namespace Drupal\hello\Plugin\Block;
 
use Drupal\Core\Block\BlockBase;
use Drupal\block\Annotation\Block;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Hello' block.
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello world block title")
 * )
 */
class HelloBlock extends BlockBase {
 
  public function build() {
//    return array('#markup' => 'Hello workd block text !');
//    return array('#theme' => 'hello_text', '#text' => 'anonymous');
    return array('#theme' => 'hello_text', '#text' => \Drupal::config('hello.settings')->get('hello_value'));
  }
 
}
