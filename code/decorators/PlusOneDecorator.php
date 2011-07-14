<?php
/**
 * Decorator class for the Page
 *
 * @author Custer Frianeza <cfrianeza@gmail.com>
 */
class PlusOneDecorator extends DataObjectDecorator {

	static $button_sizes = array(
		'standard' => 'standard',
		'small' => 'small',
		'medium' => 'medium',
		'tall' => 'tall'
	);

	/**
	 * Returns the additional values for the static variables
	 * used in this decorator class.
	 *
	 * @return array
	 */
	function extraStatics() {
		return array(
			'db' => array(
				'HasGooglePlusOne' => 'Boolean',
				'PlusOneButtonSize' => "Enum('standard, small, medium, tall')"
			),
			'defaults' => array(
				'PlusOneButtonSize' => 'standard'
			)
		);
	}

	/**
	 * Updates the CMS fields for the Page class
	 *
	 * @param FieldSet $fields
	 * @return void
	 */
	function updateCMSFields( FieldSet &$fields ) {
		$fields->addFieldToTab( 'Root.Content.GooglePlusOne', new CheckboxField( 'HasGooglePlusOne', 'Use Google Plus One on this page?' ) );
		$options = new OptionsetField( 'PlusOneButtonSize', 'Google Plus One Button Sizes:', self::$button_sizes );
		if( $this->owner->HasGooglePlusOne == 0 ) {
			foreach( self::$button_sizes as $button_size ) {
				$options->setDisabled( $button_size );
			}
		}
		$fields->addFieldToTab( 'Root.Content.GooglePlusOne', $options );
	}

	/**
	 * Extends the init function of the Page_Controller class.
	 * If HasGooglePlusOne is checked in the Page, it calls Google's API for
	 * PlusOne.
	 *
	 * @return void
	 */
	function contentcontrollerInit() {
		if( $this->owner->HasGooglePlusOne ) {
			Requirements::javascript( 'http://apis.google.com/js/plusone.js' );
		}
	}

}
