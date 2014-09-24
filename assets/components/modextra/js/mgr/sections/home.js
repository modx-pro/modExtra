modExtra.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'modextra-panel-home', renderTo: 'modextra-panel-home-div'
		}]
	});
	modExtra.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modExtra.page.Home, MODx.Component);
Ext.reg('modextra-page-home', modExtra.page.Home);