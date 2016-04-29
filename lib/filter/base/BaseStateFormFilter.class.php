<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * State filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseStateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'state_name'         => new sfWidgetFormFilterInput(),
      'state_abbreviation' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'state_name'         => new sfValidatorPass(array('required' => false)),
      'state_abbreviation' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('state_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'State';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'state_name'         => 'Text',
      'state_abbreviation' => 'Text',
    );
  }
}
