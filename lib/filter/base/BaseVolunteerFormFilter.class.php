<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Volunteer filter form base class.
 *
 * @package    aaok
 * @subpackage filter
 * @author     Your name here
 */
class BaseVolunteerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'last_name'      => new sfWidgetFormFilterInput(),
      'first_name'     => new sfWidgetFormFilterInput(),
      'address_line'   => new sfWidgetFormFilterInput(),
      'city_id'        => new sfWidgetFormPropelChoice(array('model' => 'City', 'add_empty' => true)),
      'state_id'       => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
      'zipcode_id'     => new sfWidgetFormPropelChoice(array('model' => 'Zipcode', 'add_empty' => true)),
      'telephone_home' => new sfWidgetFormFilterInput(),
      'telephone_cell' => new sfWidgetFormFilterInput(),
      'telephone_work' => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'church'         => new sfWidgetFormFilterInput(),
      'city_area'      => new sfWidgetFormFilterInput(),
      'service_id'     => new sfWidgetFormPropelChoice(array('model' => 'Service', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'last_name'      => new sfValidatorPass(array('required' => false)),
      'first_name'     => new sfValidatorPass(array('required' => false)),
      'address_line'   => new sfValidatorPass(array('required' => false)),
      'city_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'City', 'column' => 'id')),
      'state_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'State', 'column' => 'id')),
      'zipcode_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Zipcode', 'column' => 'id')),
      'telephone_home' => new sfValidatorPass(array('required' => false)),
      'telephone_cell' => new sfValidatorPass(array('required' => false)),
      'telephone_work' => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'church'         => new sfValidatorPass(array('required' => false)),
      'city_area'      => new sfValidatorPass(array('required' => false)),
      'service_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Service', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('volunteer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Volunteer';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'last_name'      => 'Text',
      'first_name'     => 'Text',
      'address_line'   => 'Text',
      'city_id'        => 'ForeignKey',
      'state_id'       => 'ForeignKey',
      'zipcode_id'     => 'ForeignKey',
      'telephone_home' => 'Text',
      'telephone_cell' => 'Text',
      'telephone_work' => 'Text',
      'email'          => 'Text',
      'church'         => 'Text',
      'city_area'      => 'Text',
      'service_id'     => 'ForeignKey',
    );
  }
}
