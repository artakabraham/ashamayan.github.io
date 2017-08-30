<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author abrah
 */
class Image {
    
	/*
//    public static function cropImage($imageSrc,$newImage,$newWidth) {
        
        /* Read the image */
        //$im = new imagick($imageSrc);

        /* Get image width and height */ 	
        //$width = $im->getImageWidth();
        //$height = $im->getImageHeight();

        //$p = $width / $height;

        //$newHeight = $newWidth / $p;

        /* create the thumbnail */
        //$im->cropThumbnailImage($newWidth, $newHeight);
        
        /* Write to a file */ 
        //$im->writeImage($newImage);

  //  }
  
  public static function cropImage ($src, $dest, $desired_width){
		
		/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
		
	} 
        
        
          public static function cropSliderImage ($src, $dest, $newWidth, $newHeight){
		
		/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	//$desired_height = floor($height * ($newWidth / $width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($newWidth, $newHeight);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
		
	} 
	
}
