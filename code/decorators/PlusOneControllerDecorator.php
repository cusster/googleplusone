<?php
/**
 * Decorator class for the Page_Controller
 *
 * @author Custer Frianeza <cfrianeza@gmail.com>
 */
class PlusOneControllerDecorator extends Extension {

	/**
	 * If the page's HasGooglePlusOne property is checked, will return
	 * an XML tag where the Plus One button will be placed. Returns false,
	 * otherwise.
	 *
	 * @return string
	 * @return Boolean false
	 */
	public function ImplementsGooglePlusOne() {
		if( $this->owner->HasGooglePlusOne ) {
			if( $this->owner->PlusOneButtonSize == 'standard' ) {
				return '<g:plusone></g:plusone>';
			} else {
				return '<g:plusone size="' . $this->owner->PlusOneButtonSize . '"></g:plusone>';
			}
		}
		return false;
	}

}
