<?php

class Client extends BaseClient
{
    function __toString()
    {
        return $this->getLastName() . ', ' . $this->getFirstName();
    }
}
