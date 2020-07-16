/**
 * @summary Main JS of Color or Image Variation Swatches for WooCommerce
 *
 * @version   1.0.9
 * @since     1.0.0
 * @requires  jQuery.js
 */

var alg_wc_civs = {};
jQuery(function ($) {
	alg_wc_civs = {

		term_selector: null,
		original_select_selector: null,

		/**
		 * Initiate
		 */
		init: function () {
			this.term_selector = '.alg-wc-civs-term';
			this.original_select_selector = '.alg-wc-civs-original-select select';
			this.sync_terms_and_selects();
			$('.variations_form').bind('woocommerce_update_variation_values', function () {
				alg_wc_civs.remove_invalid_attributes();
			});
		},

		remove_invalid_attributes: function () {
			var select = $(this.original_select_selector);
			var all_terms = $(this.term_selector);
			all_terms.addClass('disabled');

			select.each(function () {
				var options = $(this).find('option:not([disabled])');
				options.each(function () {
					var value = $(this).attr('value');
					var term = $(this).closest('td').find(alg_wc_civs.term_selector + '[data-value="' + value + '"]');
					term.removeClass('disabled');
				});
			});
		},

		sync_terms_and_selects: function () {
			var term_str = this.term_selector;
			var select_str = this.original_select_selector;

			// Triggers the corresponding select and show an alert in case the combination does not exist
			jQuery('body').on('click', term_str, function () {
                var data_attribute = $(this).attr('data-attribute');
                var select = $("select#"+data_attribute);
				var value = $(this).attr('data-value');
				var opt = select.find('option[value="' + value + '"]');

				if (!$(this).hasClass('active')) {
					if (opt.length || !$(this).hasClass('disabled')) {
						opt.prop('selected', true);
						select.trigger('change');                        
					} else {
						window.alert(wc_add_to_cart_variation_params.i18n_no_matching_variations_text);
						select.val('').trigger('change');
					}
				} else {
					select.val('').trigger('change');
				}

				alg_wc_civs.remove_invalid_attributes();
			});

			// Highlights the corresponding term according to select
            jQuery('body').on('change', select_str, function () {
				var terms = $(this).closest('td').find(term_str);
				var value = $(this).find('option:selected').attr('value');
				terms.removeClass('active');
				var term = $(this).closest('td').find(term_str + '[data-value="' + value + '"]');
				var event = {
					type: 'alg_wc_civs_term_click',
					term: null,
					select: $(this),
					active: false
				};
				if (term.length) {
					term.addClass('active');
					event.active = true;
					event.term = term;
				}
				$('body').trigger(event);
				alg_wc_civs.remove_invalid_attributes();
			});

			$(select_str).trigger('change');
		}
	};

	alg_wc_civs.init();
	$('body').trigger({
		type: 'alg_wc_civs',
		obj: alg_wc_civs
	});
});
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

alg_wc_civs_term_pointer = null;

jQuery(function ($) {

	alg_wc_civs_term_pointer = {
		term_selector: null,
		original_select_selector: null,
		pointer_selector:'.alg-wc-civs-term-pointer',
		pointer_offset: 6,

		/**
		 * Initiate
		 */
		init: function () {
			term_str = this.term_selector;
			select_str = this.original_select_selector;
			pointer_str = this.pointer_selector;

			this.add_pointer();

			var observer = new MutationObserver(function(mutations) {
				alg_wc_civs_term_pointer.add_pointer();
			});

			var config = {
				attributes: true,
				childList: true,
				characterData: true
			};

			observer.observe(document.body, config);

			$('body').on('alg_wc_civs_term_click', function (e) {
				if(e.term){
					var term = e.term;
					var pointer = term.parent().find(pointer_str);
					pointer.removeClass('disabled');
					var pointer_width = 12;
					pointer.css('left',term.position().left);
					pointer.css('top',term.position().top + term.height() + alg_wc_civs_term_pointer.pointer_offset + parseInt(term.css('marginTop')) );
					pointer.css('width',term.innerWidth()+parseInt(term.css('border-left-width')) + parseInt(term.css('border-right-width')));
				}else{
					var select = e.select;
					var pointer = select.parent().parent().find(pointer_str);
					pointer.addClass('disabled');
				}
			})
		},

		add_pointer:function(){
			if(!jQuery('.alg-wc-civs-attribute '+this.pointer_selector).length){
				jQuery('.alg-wc-civs-attribute').append('<span class="'+this.pointer_selector.substring(1)+' disabled"></span>');
			}
		}
	}

	if (typeof alg_wc_civs === 'undefined' || jQuery.isEmptyObject(alg_wc_civs)) {
		jQuery('body').on('alg_wc_civs', function (e) {
			alg_wc_civs = e.obj;
			start(alg_wc_civs);
		});
	} else {
		start(alg_wc_civs);
	}

	function start(alg_wc_civs) {
		alg_wc_civs_term_pointer.term_selector = alg_wc_civs.term_selector;
		alg_wc_civs_term_pointer.original_select_selector = alg_wc_civs.original_select_selector;
		alg_wc_civs_term_pointer.init();
	}

});
