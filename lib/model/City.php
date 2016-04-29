<?php

class City extends BaseCity
{
    function __toString()
    {
        return $this->getCityName();
    }
}
