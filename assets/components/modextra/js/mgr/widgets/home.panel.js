modExtra.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'modextra-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('modextra') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('modextra_items'),
				layout: 'anchor',
				items: [{
					html: _('modextra_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'modextra-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	modExtra.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modExtra.panel.Home, MODx.Panel);
Ext.reg('modextra-panel-home', modExtra.panel.Home);
