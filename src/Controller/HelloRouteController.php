<?php
 
/**
 * @file
 * Contains of \Drupal\hello\Controller\HelloRouteController.php
 */
 
namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
 
/**
 * Returns responses for User module routes.
 */
class HelloRouteController extends ControllerBase {
 
  /**
   * Returns the route content.
   *
   * @return array
   *   A renderable array containing the page content.
   */
  public function index1() { //most simple
    return array('#markup' => 'Hello1 world page text (from controller) !');
  }
  public function index2() { // with translated text
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Hello2 world page text (from controller) !')
    ];
  }

  public function index3() { //with call to call to config
    return ['#theme' => 'hello_text', 
            '#text' => \Drupal::config('hello.settings')->get('hello_value')
    ];
  }
  public function index4($name) { // with parameter
    return array('#markup' => "Hello4 $name page text (from controller) !");
  }
 
  function index5() { 
    $user = \Drupal::currentUser();
    if ($user->hasPermission('access administration menu')) {
      return array('#markup' => 'Hello5 world page text (you have permissions) !');
    } else {
      return array('#markup' => 'Hello5 world page text (you DONT have permissions) !');
    }
  }
}
 
