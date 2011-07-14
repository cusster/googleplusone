<?php

DataObject::add_extension( 'Page', 'PlusOneDecorator' );
DataObject::add_extension( 'Page_Controller', 'PlusOneControllerDecorator' );
LeftAndMain::require_css( 'googleplusone/css/plusone.css' );
LeftAndMain::require_javascript( 'googleplusone/javascript/plusone_admin.js' );