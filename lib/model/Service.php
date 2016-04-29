<?php

class Service extends BaseService
{
    function __toString()
    {
        return $this->getServiceName();
    }
}
