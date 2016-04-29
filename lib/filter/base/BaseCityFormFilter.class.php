<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * City filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseCityFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'city_name' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'city_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('city_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'City';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'city_name' => 'Text',
    );
  }
}
