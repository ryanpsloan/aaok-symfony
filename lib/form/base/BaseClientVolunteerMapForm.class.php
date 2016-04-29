<?php

/**
 * ClientVolunteerMap form base class.
 *
 * @package    aaok
 * @subpackage form
 * @author     Your name here
 */
class BaseClientVolunteerMapForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'client_id'    => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'volunteer_id' => new sfWidgetFormPropelChoice(array('model' => 'Volunteer', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'ClientVolunteerMap', 'column' => 'id', 'required' => false)),
      'client_id'    => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'volunteer_id' => new sfValidatorPropelChoice(array('model' => 'Volunteer', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_volunteer_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientVolunteerMap';
  }


}
