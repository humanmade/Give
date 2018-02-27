/**
 * Block dependencies
 */
import './style.scss';
import giveLogo from './data/icon';
import blockAttributes from './data/attributes';
import GiveForm from './edit/block';

/**
 * Internal dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

export default registerBlockType( 'give/donation-form', {

	title: __( 'Give Form' ),
	description: __( 'The Give Donation Form block insert an existing donation form into the page. Each form\'s presentation can be customized below.' ),
	category: 'common',
	icon: giveLogo,
	keywords: [
		__( 'donation' ),
	],
	supports: {
		html: false,
	},
	attributes: blockAttributes,
	edit: GiveForm,

	save: () => {
		// Frontend generated via shortcode (Server side rendering)
		return null;
	},
} );