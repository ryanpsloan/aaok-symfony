<?php

/**
 * client_volunteer_map actions.
 *
 * @package    aaok
 * @subpackage client_volunteer_map
 * @author     Your name here
 */
class client_volunteer_mapActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->client_volunteer_map_list = ClientVolunteerMapPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->client_volunteer_map = ClientVolunteerMapPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->client_volunteer_map);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientVolunteerMapForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ClientVolunteerMapForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client_volunteer_map = ClientVolunteerMapPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_volunteer_map does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientVolunteerMapForm($client_volunteer_map);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($client_volunteer_map = ClientVolunteerMapPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_volunteer_map does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientVolunteerMapForm($client_volunteer_map);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($client_volunteer_map = ClientVolunteerMapPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_volunteer_map does not exist (%s).', $request->getParameter('id')));
    $client_volunteer_map->delete();

    $this->redirect('client_volunteer_map/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $client_volunteer_map = $form->save();

      $this->redirect('client_volunteer_map/edit?id='.$client_volunteer_map->getId());
    }
  }
}
