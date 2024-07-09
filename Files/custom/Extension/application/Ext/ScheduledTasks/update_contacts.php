<?php

$job_strings[] = 'update_contacts';

function update_contacts()
{
    $GLOBALS['log']->fatal('Inside update contacts');
    $query = new SugarQuery();
    $query->from(BeanFactory::newBean('Accounts'), array('alias' => 'accounts'));
    $query->join('contacts', array('alias' => 'contacts'));
    $query->select(array(
        'contacts.id', 'accounts.assigned_user_id'));
    $query->whereRaw('(contacts.assigned_user_id IS NULL AND accounts.assigned_user_id IS NOT NULL) OR (contacts.assigned_user_id != accounts.assigned_user_id)');
    $query->limit(30);
    $GLOBALS['log']->fatal($query->compile());
    $results = $query->execute();
    $GLOBALS['log']->fatal('Results: ' . print_r($results, 1));

    foreach ($results as $result) {
        if (!empty($result['id'] && !empty($result['assigned_user_id']))) {
            $contactBean = BeanFactory::retrieveBean('Contacts', $result['id']);
            $contactBean->assigned_user_id = $result['assigned_user_id'];
            $contactBean->save();
        }
    }
    return true;
}