modExtra.panel.Home = function(config) {
	config = config || {};
	Ext.apply(config,{
		border: false
		,baseCls: 'modx-formpanel'
		,items: [{
			html: '<h2>'+_('modextra')+'</h2>'
			,border: false
			,cls: 'modx-page-header container'
		},{
			xtype: 'modx-tabs'
			,bodyStyle: 'padding: 10px'
			,defaults: { border: false ,autoHeight: true }
			,border: true
			,activeItem: 0
			,hideMode: 'offsets'
			,items: [{
				title: _('modextra_items')
				,items: [{
					html: _('modextra_intro_msg')
					,border: false
					,bodyCssClass: 'panel-desc'
					,bodyStyle: 'margin-bottom: 10px'
				},{
					xtype: 'modextra-grid-items'
					,preventRender: true
				}]
			}]
		}]
	});
	modExtra.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(modExtra.panel.Home,MODx.Panel);
Ext.reg('modextra-panel-home',modExtra.panel.Home);
