<?php

class PictureUtils {	
    
    public function uploadPicture($picture) {
        echo "Hola";
        if (
            ($picture['type'] == 'image/gif' ||
            $picture['type'] == 'image/jpeg' ||
            $picture['type'] == 'image/jpg' ||
            $picture['type'] == 'image/JPG' ||
            $picture['type'] == 'image/pjpeg') &&
            $picture["size"] < 1000000
        ) {
            if (is_uploaded_file ($picture['tmp_name'])){
                $nameDirectory = Settings::ROOT_PATH.Settings::PATH['img'];
                $idUnique = time();
                $nameFile = $idUnique."-".$picture['name'];
                move_uploaded_file ($picture['tmp_name'], $nameDirectory.'/'.$nameFile);
                $pictureName = $nameFile;
                return $pictureName;
            } else {
                return Settings::ERRORS['FILE_NOT_UPLOAD'];    
            }
        } else {
            return Settings::ERRORS['FILE_NOT_UPLOAD'];
        }
    }
    
    public function removePicture($pictureName) {
		unlink(Settings::PATH['img'].'/'.$pictureName);
	}

}
