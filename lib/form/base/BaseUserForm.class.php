<?php

/**
 * User form base class.
 *
 * @package    aaok
 * @subpackage form
 * @author     Your name here
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'email'      => new sfWidgetFormInput(),
      'user_name'  => new sfWidgetFormInput(),
      'password'   => new sfWidgetFormInput(),
      'salt'       => new sfWidgetFormInput(),
      'auth_token' => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'user_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'salt'       => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'auth_token' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('email'))),
        new sfValidatorPropelUnique(array('model' => 'User', 'column' => array('user_name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
