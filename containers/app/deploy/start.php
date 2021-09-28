<?php

	openlog('carrotstick', LOG_PID | LOG_PERROR, LOG_LOCAL0);

	syslog(LOG_INFO, 'Starting Carrot Stick...');
	syslog(LOG_INFO, 'Finished starting Carrot Stick.');

	closelog();
	
?>