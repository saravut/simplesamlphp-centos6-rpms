<?php

include('/etc/simplesamlphp/config/openmooc_components.php');

$config = array('sets' => array());

foreach ($components as $component) {

	foreach ($component as $key => $url) {

	    $config['sets'][$key] = array (
                                    'cron'	=> array('metarefresh'),
                                    'sources'	=> array(
                                        array(
                                            'src' => $url,
                                            #'validateFingerprint' => '',
                                        ),
                                    ),
                                    'expireAfter'  => 60*60*24*1, // Maximum 1 days cache time.
                                    'outputDir'    => "/var/lib/simplesamlphp/metadata/$key/",
                                    'outputFormat' => 'flatfile',
	    );
	}
}
