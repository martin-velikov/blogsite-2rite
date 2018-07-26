<?php

interface ViewInterface
{
    public function render($viewName, $params);
}