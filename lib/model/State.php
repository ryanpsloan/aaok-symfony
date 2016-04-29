<?php

class State extends BaseState
{
    function __toString()
    {
        return $this->getStateName();
    }
}
