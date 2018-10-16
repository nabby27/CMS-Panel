<?php

class PictureUtils {	
    
    public function uploadPicture($picture) {
		if (is_uploaded_file ($picture['name']['tmp_name'])){
            $nameDirectory = Settings::PATH['img'];
            $idUnique = time();
            $nameFile = $idUnique."-".$picture['name']['name'];
            move_uploaded_file($picture['name']['tmp_name'], $nameDirectory.$nameFile);
            $pictureName = $nameFile;
            return $pictureName;
        }
    }
    
    public function removePicture($pictureName) {
		unlink(Settings::PATH['img'].'/'.$pictureName);
	}

}
