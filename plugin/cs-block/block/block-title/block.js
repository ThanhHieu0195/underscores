( function( blocks, i18n, element) {
	var el = wp.element.createElement;
  blocks.registerBlockType('cs-block/block-title', {
	  title: i18n.__( 'Block Title' ), // The title of our block.
	  icon: 'info', // Dashicon icon for our block
	  category: 'common', // The category of the block.
	  attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'h2',
		},
	},
	edit: function( props ) {
		return el( wp.editor.RichText, {
			tagName: 'h2',
			className: props.className + ' ' + 'section_title',
			value: props.attributes.content,
			onChange: function( content ) {
				props.setAttributes( { content: content } );
			}
		} );
	},
	save: function(props) {
		return el( 'div', {
			className: 'section_title',
			children: el('h2', {}, props.attributes.content)
		});
	}
	});
} )(
   window.wp.blocks,
   window.wp.i18n,
   window.wp.element
);