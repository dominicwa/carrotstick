<?php

	openlog('rewards', LOG_PID | LOG_PERROR, LOG_LOCAL0);

	syslog(LOG_INFO, 'Starting Rewards...');
	syslog(LOG_INFO, 'Finished starting Rewards.');

	closelog();
	
?>