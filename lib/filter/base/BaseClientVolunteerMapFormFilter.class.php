<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ClientVolunteerMap filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseClientVolunteerMapFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'    => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'volunteer_id' => new sfWidgetFormPropelChoice(array('model' => 'Volunteer', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'client_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'volunteer_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Volunteer', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('client_volunteer_map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientVolunteerMap';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'client_id'    => 'ForeignKey',
      'volunteer_id' => 'ForeignKey',
    );
  }
}
