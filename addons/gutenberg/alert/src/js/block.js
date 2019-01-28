/**
 * Internationalization function, can be used like we do that in WordPress, e.g.:
 * __( 'My text', 'textdomain')
 */
const { __, _x, _n, _nx } = wp.i18n;

console.log( 'Alert Gutenberg: block.js' );

/**
 * Import Gutenberg Components to use
 */
const {
	RichText,
	InspectorControls,
	BlockControls,
	BlockAlignmentToolbar,
	ColorPalette
} = wp.editor;

const {
	PanelBody,
	SelectControl,
	TextControl,
	Toolbar
} = wp.components;


const {
	registerBlockType
} = wp.blocks;

registerBlockType('pbh-blocks/alert', {
	title: __('PBH Alert', 'pbh-blocks-alert'),
	description: __('Customizable Alert', 'pbh-blocks-alert'),
	icon: <svg viewBox="0 0 32 32" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<rect x="0.5" stroke="#4A4A4A" y="8.5" width="31" height="15" rx="3"></rect>
			<circle cx="8" stroke="#4A4A4A" cy="16" r="1.5"></circle>
			<circle cx="16" stroke="#4A4A4A" cy="16" r="1.5"></circle>
			<circle cx="24" stroke="#4A4A4A" cy="16" r="1.5"></circle>
		</g>
	</svg>,
	category: 'pbh-blocks',

	supports: {
		// add a possibility to change block ID
		anchor: false,
		// Add the support for block's alignment (left, center, right, wide, full).
		align: false,
		// add a possibility to change block class name
		customClassName: true,
		// By default, Gutenberg will allow a block’s markup to be edited individually.
		html: false,
		// set to false to use this block just one per post / page
		multiple: true,
	},

	/**
	 * Declare changeable block attributes
	 */
	attributes: {
		content: {
			type: 'string',
			default: 'Alert',
		},
		id: {
			type: 'string',
			// generate an unique element ID
			default: ''
		},
		type: {
			type: 'string',
			default: 'success'
		},
		align: {
			type: 'string',
			default: 'left'
		},
	},

	/**
	 * Following function called when you edit your block
	 * through Gutenberg Editor
	 */
	edit: (props) => {

		/**
		 * Properties & attributes
		 */
		const {
			attributes: {
				content,
				align,
				id,
				type
			},
			setAttributes,
			className,
			clientId
		} = props;

		const updateContent = (content) => {
			props.setAttributes({content: content});
		};

		setAttributes( {id: 'block-' + clientId});

		return ([

			/**
			 * Block controls appears on element focus in editor
			 */
			<BlockControls>
				<BlockAlignmentToolbar value={align} onChange={(align) => setAttributes({align: align})}/>
			</BlockControls>,

			/**
			 * Inspector controls items will be rendered in sidebar when you click on component
			 */
			<InspectorControls>
				<PanelBody title={__('Attributes', 'pbh-blocks-alert')} initialOpen={true}>
					<SelectControl
						label={__('Type', 'pbh-blocks-alert')}
						value={type}
						options={[
							{label: __('Success', 'pbh-blocks-alert'), value: 'success'},
							{label: __('Info', 'pbh-blocks-alert'), value: 'info'},
							{label: __('Warning', 'pbh-blocks-alert'), value: 'warning'},
							{label: __('Danger', 'pbh-blocks-alert'), value: 'danger'},
						]}
						onChange={(value) => setAttributes({type: value})}
					/>
				</PanelBody>
			</InspectorControls>,

			/**
			 * This element will be rendered directly in content editor
			 */
			<div style={{textAlign: align}}
				 className={className + ' pbh_root pbh_alert_block pbh-alert-' + type + ' pbh-id-' + id}>
				<i className="pbh-icon"/>
				<RichText
					value={content}
					onChange={updateContent}
				/>
				<a href="#" className="pbh-alert-dismiss"></a>
			</div>
		]);
	},

	/**
	 * Following function saves block data into post content
	 */
	save: (props) => {

		const {
			content,
			align,
			id,
			type
		} = props.attributes;

		return (
			<div style={{textAlign: align}}
				 className={ 'pbh_root pbh_alert_block pbh-alert-' + type + ' pbh-id-' + id}>
				<i className="pbh-icon"/>
				<RichText.Content 
					tagName='div'
					value={content}
				/>
				<a href="#" className="pbh-alert-dismiss"></a>
			</div>
		);
	},
});
