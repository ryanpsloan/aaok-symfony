<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Service filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseServiceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'service_name' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'service_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('service_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'service_name' => 'Text',
    );
  }
}
