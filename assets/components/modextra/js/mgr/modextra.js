var modExtra = function (config) {
	config = config || {};
	modExtra.superclass.constructor.call(this, config);
};
Ext.extend(modExtra, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modextra', modExtra);

modExtra = new modExtra();