<?php

/**
 * volunteer actions.
 *
 * @package    aaok
 * @subpackage volunteer
 * @author     Your name here
 */
class volunteerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->volunteer_list = VolunteerPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->volunteer = VolunteerPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->volunteer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VolunteerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new VolunteerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($volunteer = VolunteerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object volunteer does not exist (%s).', $request->getParameter('id')));
    $this->form = new VolunteerForm($volunteer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($volunteer = VolunteerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object volunteer does not exist (%s).', $request->getParameter('id')));
    $this->form = new VolunteerForm($volunteer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($volunteer = VolunteerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object volunteer does not exist (%s).', $request->getParameter('id')));
    $volunteer->delete();

    $this->redirect('volunteer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $volunteer = $form->save();

      $this->redirect('volunteer/edit?id='.$volunteer->getId());
    }
  }
}
