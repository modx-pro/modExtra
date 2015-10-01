modExtra.grid.Items = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'modextra-grid-items';
	}
	Ext.applyIf(config, {
		url: modExtra.config.connector_url,
		baseParams: {
			action: 'modextra/processor',
			method: 'item/getlist',
		},
		multi_select: true,
		viewConfig: {
			forceFit: true,
			enableRowBody: true,
			autoFill: true,
			showPreview: true,
			scrollOffset: 0,
			getRowClass: function (rec, ri, p) {
				return !rec.data.active
					? 'office-grid-row-disabled'
					: '';
			}
		},
	});
	modExtra.grid.Items.superclass.constructor.call(this, config);

	// Clear selection on grid refresh
	this.store.on('load', function () {
		if (this._getSelectedIds().length) {
			this.getSelectionModel().clearSelections();
		}
	}, this);
};
Ext.extend(modExtra.grid.Items, OfficeExt.grid.Default, {
	windows: {},

	createItem: function (btn, e) {
		var w = MODx.load({
			xtype: 'modextra-item-window-create',
			id: Ext.id(),
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		});
		w.reset();
		w.setValues({active: true});
		w.show(e.target);
	},

	updateItem: function (btn, e, row) {
		if (typeof(row) != 'undefined') {
			this.menu.record = row.data;
		}
		else if (!this.menu.record) {
			return false;
		}
		var id = this.menu.record.id;

		MODx.Ajax.request({
			url: this.config.url,
			params: {
				action: 'modextra/processor',
				method: 'item/get',
				id: id,
			},
			listeners: {
				success: {
					fn: function (r) {
						var w = MODx.load({
							xtype: 'modextra-item-window-update',
							id: Ext.id(),
							record: r,
							listeners: {
								success: {
									fn: function () {
										this.refresh();
									}, scope: this
								}
							}
						});
						w.reset();
						w.setValues(r.object);
						w.show(e.target);
					}, scope: this
				}
			}
		});
	},

	removeItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.msg.confirm({
			title: ids.length > 1
				? _('modextra_items_remove')
				: _('modextra_item_remove'),
			text: ids.length > 1
				? _('modextra_items_remove_confirm')
				: _('modextra_item_remove_confirm'),
			url: this.config.url,
			params: {
				action: 'modextra/processor',
				method: 'item/remove',
				ids: Ext.util.JSON.encode(ids),
			},
			listeners: {
				success: {
					fn: function (r) {
						this.refresh();
					}, scope: this
				}
			}
		});
		return true;
	},

	disableItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.Ajax.request({
			url: this.config.url,
			params: {
				action: 'modextra/processor',
				method: 'item/disable',
				ids: Ext.util.JSON.encode(ids),
			},
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		})
	},

	enableItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.Ajax.request({
			url: this.config.url,
			params: {
				action: 'modextra/processor',
				method: 'item/enable',
				ids: Ext.util.JSON.encode(ids),
			},
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		})
	},

	getFields: function (config) {
		return ['id', 'name', 'description', 'active', 'actions'];
	},

	getColumns: function (config) {
		return [{
			header: _('modextra_item_id'),
			dataIndex: 'id',
			sortable: true,
			width: 70
		}, {
			header: _('modextra_item_name'),
			dataIndex: 'name',
			sortable: true,
			width: 200,
		}, {
			header: _('modextra_item_description'),
			dataIndex: 'description',
			sortable: false,
			width: 250,
		}, {
			header: _('modextra_item_active'),
			dataIndex: 'active',
			renderer: OfficeExt.utils.renderBoolean,
			sortable: true,
			width: 100,
		}, {
			header: _('modextra_grid_actions'),
			dataIndex: 'actions',
			renderer: OfficeExt.utils.renderActions,
			sortable: false,
			width: 100,
			id: 'actions'
		}];
	},

	getTopBar: function (config) {
		return [{
			text: '<i class="fa fa-plus"></i>&nbsp;' + _('modextra_item_create'),
			handler: this.createItem,
			scope: this
		}, '->', this.getSearchField()];
	},

	getListeners: function() {
		return {
			rowDblClick: function (grid, rowIndex, e) {
				var row = grid.store.getAt(rowIndex);
				this.updateItem(grid, e, row);
			}
		};
	},

});
Ext.reg('modextra-grid-items', modExtra.grid.Items);
