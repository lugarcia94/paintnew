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
