/*	
 * jQuery mmenu navbar addon close content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */

(function( $ ) {

	var _PLUGIN_ 	= 'mmenu',
		_ADDON_  	= 'navbars',
		_CONTENT_	= 'close';

	$[ _PLUGIN_ ].addons[ _ADDON_ ][ _CONTENT_ ] = function( $navbar, opts )
	{
		//	Get vars
		var _c = $[ _PLUGIN_ ]._c,
			glbl = $[ _PLUGIN_ ].glbl;


		//	Add content
		$navbar.append( '<a class="' + _c.close + ' ' + _c.btn + '" href="#"></a>' );


		//	Update
		var setPage = function( $page )
		{
			$navbar
				.find( '.' + _c.close )
				.attr( 'href', '#' + $page.attr( 'id' ) );
		};
		setPage.call( this, glbl.$page );
		this.bind( 'setPage', setPage );
	};

})( jQuery );