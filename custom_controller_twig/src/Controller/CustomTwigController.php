<?php
namespace Drupal\custom_controller_twig\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomTwigController extends ControllerBase
{
    public function getData()
    {
        $db = \Drupal::service('database')->select('node__field_employee_name', 'name');
        $db->join('node__field_employee_id', 'id', 'name.entity_id = id.entity_id');
        $db->join('node__field_salary', 'salary', 'name.entity_id = salary.entity_id');
        $db = $db->fields('name', ['field_employee_name_value'])
            ->fields('id', ['field_employee_id_value'])
            ->fields('salary', ['field_salary_value'])->execute();
        return [
            '#theme' => 'custom-twig',
            '#data' => $db,
        ];
    }
}
