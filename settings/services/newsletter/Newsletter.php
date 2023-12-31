<?php

namespace settings\services\newsletter;

interface Newsletter
{
    public function subscribe($email): void;
    public function unsubscribe($email): void;
}