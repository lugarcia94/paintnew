alg_wc_civs_soptc = null;

jQuery(function ($) {

	alg_wc_civs_soptc = {
		term_selector: null,
		original_select_selector: null,

		/**
		 * Initiate
		 */
		init: function () {
			term_str = this.term_selector;
			select_str = this.original_select_selector;

			$('body').on('change', select_str, function () {
				$(term_str).each(function () {
					var current_data_attribute = jQuery(this).parent().attr('data-attribute');
					var term_value = jQuery(this).attr('data-value');
					var correspondent_select = $(select_str).filter('[id="' + current_data_attribute + '"]');
					var correspondent_option = correspondent_select.find('option[value="' + term_value + '"]');
					if (!correspondent_option.length) {
						jQuery(this).addClass('disabled');
					} else {
						jQuery(this).removeClass('disabled');
					}
				})
			})
		}
	}

	if(alg_wc_civs_opt.only_valid_term_combinations){
		if (typeof alg_wc_civs === 'undefined' || jQuery.isEmptyObject(alg_wc_civs)) {
			jQuery('body').on('alg_wc_civs', function (e) {
				alg_wc_civs = e.obj;
				start(alg_wc_civs);
			});
		} else {
			start(alg_wc_civs);
		}
	}

	function start(alg_wc_civs) {
		alg_wc_civs_soptc.term_selector = alg_wc_civs.term_selector;
		alg_wc_civs_soptc.original_select_selector = alg_wc_civs.original_select_selector;
		alg_wc_civs_soptc.init();
	}

});
