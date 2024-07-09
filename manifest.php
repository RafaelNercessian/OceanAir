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
    'key' => 'Reassign contacts to users',
    'author' => 'Rafael Silva Nercessian',
    'description' => 'Update contacts to correct user',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Update contacts to correct user',
    'published_date' => '2024-07-08 21:24:17',
    'type' => 'module',
    'version' => 'oc_rc_2',
    'remove_tables' => false,
);

$installdefs = array(
    'id' => 'ocean_air_reassign_contacts',
    'post_install' => array('<basepath>/post_install.php'),
    'appscheduledefs' => array(
        array(
            'from' => '<basepath>/Files/custom/Extension/application/Ext/ScheduledTasks/update_contacts.php',
        )
    ),
    'language' => array(
        array(
            'from' =>'<basepath>/Files/custom/Extension/application/Ext/Language/en_us.update_contacts.php',
            'to_module' => 'Schedulers',
            'language' => 'en_us'
        )
    )
);