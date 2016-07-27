<?php

function removeFolder($folder) {

	if(is_dir($folder) == true) {

	$folderContents = scandir($folder);
	unset($folderContents[0],$folderContents[1]);	

	foreach ($folderContents as $content => $contentName){
		echo $contentName.'<br/>';
		$currentPath = $folder.'/'.$contentName;
		$filetype = filetype($currentPath);
		// if($filetype == 'dir'){
		// 	removeFolder($currentPath);
		// }else{
		// 	unlink($currentPath);
		// }
		// unset($folderContents{$content});
}
// rmdir($folder);

	print_r($folderContents);
}
}

removeFolder('files');

?>
