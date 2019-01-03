( function( blocks, components, i18n, element ) {
	var el = element.createElement;
	blocks.registerBlockType(

		// The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
		'cs-block/block-banner', {

		// The title of our block.
		title: i18n.__( 'Block Banner' ),

		// Dashicon icon for our block.
		icon: 'megaphone',

		// The category of the block.
		category: 'common',

		// Necessary for saving block content.
		attributes: {
			mediaID: {
				type: 'number',
			},
			mediaURL: {
				type: 'string'
			},
			subtitle: {
				type: 'string',
			},
			title: {
				type: 'string',
			},
			buttonText: {
				type: 'string'
			},
			buttonLink: {
				type: 'string'
			}
		},

		edit: function( props ) {
			var attributes = props.attributes;
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: media.url,
					mediaID: media.id,
				} );
			};
			return [
				el('div', {className: props.className}, 
					el( 'div', 
					{ className: 'main_slider', style: {'background-image': 'url('+props.attributes.mediaURL+')'} },
					el('div', {className: 'container fill_height'}, 
						el('div', {className: 'row align-items-center fill_height'}, 
							el('div', {className: 'col'}, 
								el('div', {className: 'main_slider_content'},
									el('h6', {}, 
										el(wp.editor.RichText, {
											value: props.attributes.subtitle,
											placeholder: 'input subtitle',
											onChange: function(subtitle) {
												props.setAttributes({ subtitle: subtitle});
											}
										}),
									),
									el('h1', {},
										el(wp.editor.RichText, {
											value: props.attributes.title,
											placeholder: 'input title',
											onChange: function(title) {
												props.setAttributes({ title: title});
											}
										}),
									),
									el('div', {className: 'red_button shop_now_button'}, 
										el(wp.editor.RichText, {
											value: props.attributes.buttonText,
											placeholder: 'input button text',
											onChange: function(buttonText) {
												props.setAttributes({buttonText: buttonText})
											}
										})
									),
									el(wp.editor.RichText, {
											value: props.attributes.buttonLink,
											placeholder: 'input button link',
											onChange: function(buttonLink) {
												props.setAttributes({buttonLink: buttonLink})
											}
										})
								)
							)
						)
					)
				),
					el( wp.editor.MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: attributes.mediaID,
							render: function( obj ) {
								return el( wp.components.IconButton, {
									className: attributes.mediaID ? 'image-button' : 'button button-large',
									onClick: obj.open
									},
									! attributes.mediaID ? i18n.__( 'Upload Image' ) : i18n.__('Replace image')
								);
							}
					})
				)
			];
		},

		save: function( props ) {
			var attributes = props.attributes;
			var alignment = props.attributes.alignment;
			return (
				el( 'div', 
					{ className: props.className + ' main_slider', style: {'background-image': 'url('+props.attributes.mediaURL+')'} },
					el('div', {className: 'container fill_height'}, 
						el('div', {className: 'row align-items-center fill_height'}, 
							el('div', {className: 'col'}, 
								el('div', {className: 'main_slider_content'},
									el('h6', {}, props.attributes.subtitle),
									el('h1', {}, props.attributes.title),
									el('div', {className: 'red_button shop_now_button'}, 
										el('a', {href: props.attributes.buttonLink}, props.attributes.buttonText)
									)
								)
							)
						)
					)
				)
			);
		},
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);