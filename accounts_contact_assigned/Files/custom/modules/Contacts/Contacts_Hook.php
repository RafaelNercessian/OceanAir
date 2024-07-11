<?php

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class Contacts_Hook
{
    public function assignContacts($bean, $event, $arguments)
    {
        global $current_user;
        if (empty($bean->assignContacts) && empty($bean->assigned_user_id) && empty($current_user->isAdmin())) {
            $GLOBALS['log']->fatal("Inside assignContacts");
            $bean->assignContacts = true;
            $bean->assigned_user_id = $current_user->id;
            $bean->save();
        }
    }
}