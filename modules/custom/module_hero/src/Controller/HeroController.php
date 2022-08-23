<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\HeroAddService;
/**
 * This is our hero controller.
 */
class HeroController extends ControllerBase {
  private $addHeroService;
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('module_hero.hero_add')
    );
  }

  public function __construct(HeroAddService $addHeroService){
    $this->addHeroService = $addHeroService;
  }

  public function heroList() {
    
    $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Luke Cage'],
      ['name' => 'Black Widow'],
      ['name' => 'Daredevil'],
      ['name' => 'Captain America'],
      ['name' => 'Wolverine']
    ];

    
    $heroes1 = $this->addHeroService->addHero();
    $new = array_push($heroes,$heroes1);
    return [
      '#theme' => 'hero_list',
      '#items' => $heroes,
      '#title' => $this->t('Our wonderful heroes list'),
    ];

  }
}
