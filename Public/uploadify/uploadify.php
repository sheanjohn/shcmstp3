<?php
/*
 * Uploadify
 * Copyright (c) 2012 Reactive Apps, Ronnie Garcia
 * Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */

// Define a destination
$targetFolder = 'uploads/'; // Relative to the root
$pp = '../../'.$targetFolder . $_POST ['subpath'];
$rp=$_POST['rootpath'];
$rp = str_replace('/','\\',$rp);

$dir = iconv ( "UTF-8", "GBK", $pp );
if (! file_exists ( $dir )) {
	mkdir ( $dir, 0777, true );
	// echo $pp;
}
$targetFolder = $targetFolder . $_POST ['subpath'];

$verifyToken = md5 ( 'unique_salt' . $_POST ['timestamp'] );

if (! empty ( $_FILES ) && $_POST ['token'] == $verifyToken) {
	$tempFile = $_FILES ['Filedata'] ['tmp_name'];
	//$targetPath = $targetFolder;
	//$targetPath = $_SERVER ['DOCUMENT_ROOT'] . $targetFolder;
	$targetPath=$_SERVER['DOCUMENT_ROOT'].$rp.$targetFolder;
	$targetFile = rtrim ( $targetPath, '/' ) . '/' . $_POST ['date'] . '_' . $_FILES ['Filedata'] ['name'];
	
	// Validate the file type
	$fileTypes = array (
			'jpg',
			'jpeg',
			'gif',
			'png' 
	); // File extensions
	$fileParts = pathinfo ( $_FILES ['Filedata'] ['name'] );
	
	if (in_array ( $fileParts ['extension'], $fileTypes )) {
		move_uploaded_file ( $tempFile, $targetFile );
		echo $targetFolder . '/' . $_POST ['date'] . '_' . $_FILES ['Filedata'] ['name'];
	} else {
		echo '0';
	}
}
?>