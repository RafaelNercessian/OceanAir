<?php
$manifest = array(
    'acceptable_sugar_versions' => array(
        'regex_matches' => array(
            '12.*.*',
            '13.*.*',
            '14.*.*'
        ),
    ),
    'acceptable_sugar_flavors' => array(
        'PRO',
        'ENT',
        'ULT'
    ),
    'readme' => '',
    'key' => 'Assign accounts and contacts to the correct user',
    'author' => 'Rafael Silva Nercessian',
    'description' => 'Assign accounts and contacts to the correct user',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Assign accounts and contacts to the correct user',
    'published_date' => '2024-07-08 21:24:17',
    'type' => 'module',
    'version' => 'oc_reassign_accounts_contacts_1',
    'remove_tables' => false,
);

$installdefs = array(
    'id' => 'ocean_air_reassign_account_contacts',
    'post_install' => array('<basepath>/post_install.php'),
    'logic_hooks' => array(
        array(
            'module' => 'Accounts',
            'hook' => 'after_save',
            'order' => 1,
            'description' => 'Assign accounts',
            'file' => 'custom/modules/Accounts/Accounts_Hook.php',
            'class' => 'Accounts_Hook',
            'function' => 'assignAccounts',
        ),
        array(
            'module' => 'Contacts',
            'hook' => 'after_save',
            'order' => 1,
            'description' => 'Assign contacts',
            'file' => 'custom/modules/Contacts/Contacts_Hook.php',
            'class' => 'Contacts_Hook',
            'function' => 'assignContacts',
        )
    ),
    'copy' => array(
        array(
            'from' => '<basepath>/Files/custom/modules/Contacts/Contacts_Hook.php',
            'to' => 'custom/modules/Contacts/Contacts_Hook.php',
        ),
        array(
            'from' => '<basepath>/Files/custom/modules/Accounts/Accounts_Hook.php',
            'to' => 'custom/modules/Accounts/Accounts_Hook.php',
        )
    )
);