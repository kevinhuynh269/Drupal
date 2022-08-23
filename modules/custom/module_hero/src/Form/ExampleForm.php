<?php
namespace Drupal\module_hero\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Messenger;

class ExampleForm extends FormBase{

    public function getFormId(){
        return "example_form";
    }
    public function buildForm(array $form, FormStateInterface $form_state){

        $form['text'] = array(
            '#type' => 'textarea',
            '#title' => $this
              ->t('Text'),
          );
          $form['copy'] = array(
            '#type' => 'checkbox',
            '#title' => $this
              ->t('Send me a copy'),
          );
          $form['settings']['active'] = array(
            '#type' => 'radios',
            '#title' => $this
              ->t('Poll status'),
            '#default_value' => 1,
            '#options' => array(
              0 => $this
                ->t('Closed'),
              1 => $this
                ->t('Active'),
            ),
          );
          $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this
              ->t('Select element'),
            '#options' => [
              '1' => $this
                ->t('One'),
              '2' => $this
              ->t('Two'),
              '3' => $this
                ->t('Three'),
            ],
          ];


          $form['expiration'] = [
            '#type' => 'date',
            '#title' => $this
              ->t('Content expiration'),
            '#default_value' => '2020-02-05',
          ];
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
        \Drupal::messenger()->addMessage('Processsing form .....');
    }
}