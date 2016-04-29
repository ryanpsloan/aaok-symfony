<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Zipcode filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseZipcodeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'zip_code' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'zip_code' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zipcode_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zipcode';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'zip_code' => 'Text',
    );
  }
}
