<?php

class Volunteer extends BaseVolunteer
{
    function __toString(){
        return $this->getLastName(). ', ' . $this->getFirstName();
    }
}
