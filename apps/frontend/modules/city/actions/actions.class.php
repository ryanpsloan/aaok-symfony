<?php

/**
 * city actions.
 *
 * @package    aaok
 * @subpackage city
 * @author     Your name here
 */
class cityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->city_list = CityPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->city = CityPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->city);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CityForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new CityForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($city = CityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object city does not exist (%s).', $request->getParameter('id')));
    $this->form = new CityForm($city);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($city = CityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object city does not exist (%s).', $request->getParameter('id')));
    $this->form = new CityForm($city);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($city = CityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object city does not exist (%s).', $request->getParameter('id')));
    $city->delete();

    $this->redirect('city/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $city = $form->save();

      $this->redirect('city/edit?id='.$city->getId());
    }
  }
}
