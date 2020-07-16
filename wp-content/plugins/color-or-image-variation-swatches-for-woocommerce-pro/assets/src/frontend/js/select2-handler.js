alg_wc_civs_select2 = null;

jQuery(document).ready(function ($) {
	alg_wc_civs_select2 = {
		term_selector: null,
		original_select_selector: null,

		/**
		 * Initiate
		 */
		init: function () {
			term_str = this.term_selector;
			select_str = this.original_select_selector;
			$(select_str).select2({
				templateResult: formatState,
				templateSelection: formatState,
				width: '100%'
			});

			function formatState(state) {
				if (!state.id) {
					return state.text;
				}
				var term = $(term_str + '[data-value="' + state.id + '"]').prop('outerHTML');

				var $state = $(
					'<span class="alg-wc-civs-select2-img-wrapper">' + term + '</span>' + '<span class="alg-wc-civs-select2-label">' + state.text + '</span>'
				);
				return $state;
			};
		}
	}

	if (alg_wc_civs_opt.use_select2) {
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
		alg_wc_civs_select2.term_selector = alg_wc_civs.term_selector;
		alg_wc_civs_select2.original_select_selector = alg_wc_civs.original_select_selector;
		alg_wc_civs_select2.init();
	}
});