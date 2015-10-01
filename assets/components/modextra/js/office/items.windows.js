modExtra.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'modextra-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('modextra_item_create'),
		width: 550,
		autoHeight: true,
		url: modExtra.config.connector_url,
		baseParams: {
			action: 'modextra/processor',
			method: 'item/create',
		},
		fields: this.getFields(config),
		keys: this.getKeys(config),
	});
	modExtra.window.CreateItem.superclass.constructor.call(this, config);
	this.on('hide', function() {
		var w = this;
		window.setTimeout(function() {
			w.close();
		}, 200);
	});
};
Ext.extend(modExtra.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('modextra_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('modextra_item_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('modextra_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	getKeys: function(config) {
		return [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}];
	},

});
Ext.reg('modextra-item-window-create', modExtra.window.CreateItem);


modExtra.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'modextra-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('modextra_item_update'),
		width: 550,
		autoHeight: true,
		url: modExtra.config.connector_url,
		baseParams: {
			action: 'modextra/processor',
			method: 'item/update',
		},
		fields: this.getFields(config),
		keys: this.getKeys(config),
	});
	modExtra.window.UpdateItem.superclass.constructor.call(this, config);
	this.on('hide', function() {
		var w = this;
		window.setTimeout(function() {
			w.close();
		}, 200);
	});
};
Ext.extend(modExtra.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('modextra_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('modextra_item_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('modextra_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	getKeys: function() {
		return [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}];
	},

});
Ext.reg('modextra-item-window-update', modExtra.window.UpdateItem);