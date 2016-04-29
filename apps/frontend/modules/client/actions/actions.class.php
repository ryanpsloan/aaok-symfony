<?php

/**
 * client actions.
 *
 * @package    aaok
 * @subpackage client
 * @author     Your name here
 */
class clientActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->client_list = ClientPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->client = ClientPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->client);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ClientForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($client);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object client does not exist (%s).', $request->getParameter('id')));
    $client->delete();

    $this->redirect('client/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $client = $form->save();

      $this->redirect('client/edit?id='.$client->getId());
    }
  }
}