<?php

class Zipcode extends BaseZipcode
{
    function __toString()
    {
        return $this->getZipCode();
    }
}
