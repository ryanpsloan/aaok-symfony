<?php

/**
 * State form base class.
 *
 * @package    aaok
 * @subpackage form
 * @author     Your name here
 */
class BaseStateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'state_name'         => new sfWidgetFormInput(),
      'state_abbreviation' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id', 'required' => false)),
      'state_name'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'state_abbreviation' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'State', 'column' => array('state_name'))),
        new sfValidatorPropelUnique(array('model' => 'State', 'column' => array('state_abbreviation'))),
      ))
    );

    $this->widgetSchema->setNameFormat('state[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'State';
  }


}
