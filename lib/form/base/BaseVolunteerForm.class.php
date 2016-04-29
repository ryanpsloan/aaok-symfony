<?php

/**
 * Volunteer form base class.
 *
 * @package    aaok
 * @subpackage form
 * @author     Your name here
 */
class BaseVolunteerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'last_name'      => new sfWidgetFormInput(),
      'first_name'     => new sfWidgetFormInput(),
      'address_line'   => new sfWidgetFormInput(),
      'city_id'        => new sfWidgetFormPropelChoice(array('model' => 'City', 'add_empty' => true)),
      'state_id'       => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
      'zipcode_id'     => new sfWidgetFormPropelChoice(array('model' => 'Zipcode', 'add_empty' => true)),
      'telephone_home' => new sfWidgetFormInput(),
      'telephone_cell' => new sfWidgetFormInput(),
      'telephone_work' => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'church'         => new sfWidgetFormInput(),
      'city_area'      => new sfWidgetFormInput(),
      'service_id'     => new sfWidgetFormPropelChoice(array('model' => 'Service', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Volunteer', 'column' => 'id', 'required' => false)),
      'last_name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'first_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_line'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city_id'        => new sfValidatorPropelChoice(array('model' => 'City', 'column' => 'id', 'required' => false)),
      'state_id'       => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id', 'required' => false)),
      'zipcode_id'     => new sfValidatorPropelChoice(array('model' => 'Zipcode', 'column' => 'id', 'required' => false)),
      'telephone_home' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'telephone_cell' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'telephone_work' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'church'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city_area'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'service_id'     => new sfValidatorPropelChoice(array('model' => 'Service', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Volunteer', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('volunteer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Volunteer';
  }


}
