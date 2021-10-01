define([
	'jquery',
	'ko',
	'uiComponent',
	'underscore',
	'Magento_Checkout/js/model/step-navigator'
], function (
	$,
	ko,
	Component,
	_,
	stepNavigator
) {
	return Component.extend({
		defaults: {
			template: 'Eloom_Checkout/checkout/step-success',
			isVisible: ko.observable(false),
			stepCode: 'success',
			stepTitle: $.mage.__("Success"),
		},

		initialize: function () {
			this._super();

			stepNavigator.registerStep(
				this.stepCode, null, this.stepTitle, this.isVisible, _.bind(this.navigate, this), 25
			);

			return this;
		},

		navigate: function () {
			this.isVisible(true);
		}
	});
});