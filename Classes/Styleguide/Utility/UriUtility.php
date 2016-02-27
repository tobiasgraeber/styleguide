<?php 

namespace Thopra\Styleguide\Utility;

use Endroid\QrCode\QrCode;

Class UriUtility {

	public function section( $ref, $sourceKey )
	{
		return $_SERVER['SCRIPT_NAME'].'?ref='.$ref.'&src='.$sourceKey;
	}
	
	public function preview( $ref, $sourceKey )
	{
		return $_SERVER['SCRIPT_NAME'].'?preview&ref='.$ref.'&src='.$sourceKey;
	}

	public function previewQr( $ref, $sourceKey )
	{
		return self::getQr( ($_SERVER['HTTPS'] ? "https://" : "http://") . $_SERVER['HTTP_HOST'].self::preview($ref, $sourceKey) );
	}

	public function getQr( $url )
	{
		$qrCode = new QrCode();
		return $qrCode
		    ->setText( $url )
		    ->setSize(100)
		    ->setPadding(10)
		    ->setErrorCorrection('high')
		    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
		    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
		    ->getDataUri()
		;

	}

}