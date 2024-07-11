<?php

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class Accounts_Hook
{
    public function assignAccounts($bean, $event, $arguments)
    {
        global $current_user;
        if (empty($bean->assignAccounts) && empty($bean->assigned_user_id) && empty($current_user->isAdmin())) {
            $GLOBALS['log']->fatal("Inside assignAccounts");
            $bean->assignAccounts = true;
            $bean->assigned_user_id = $current_user->id;
            $bean->save();
        }
    }
}