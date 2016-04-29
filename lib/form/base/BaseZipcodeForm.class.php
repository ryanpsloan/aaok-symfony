<?php

/**
 * Zipcode form base class.
 *
 * @package    aaok
 * @subpackage form
 * @author     Your name here
 */
class BaseZipcodeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'zip_code' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Zipcode', 'column' => 'id', 'required' => false)),
      'zip_code' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Zipcode', 'column' => array('zip_code')))
    );

    $this->widgetSchema->setNameFormat('zipcode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zipcode';
  }


}
