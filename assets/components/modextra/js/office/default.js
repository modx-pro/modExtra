Ext.onReady(function() {
	modExtra.config.connector_url = OfficeConfig.actionUrl;

	var grid = new modExtra.panel.Home();
	grid.render('office-modextra-wrapper');

	var preloader = document.getElementById('office-preloader');
	if (preloader) {
		preloader.parentNode.removeChild(preloader);
	}
});