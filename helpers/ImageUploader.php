<?php
/**
 * Created by PhpStorm.
 * User: Babacar Mbengue
 * Date: 19/03/2019
 * Time: 22:36
 */

class ImageUploader
{

    /**
     * @var array $extensions list des extensions autoriser
     */
    private $extensions;
    /**
     * @var array $types type de fichier a uploader
     */
    private $types;
    /**
     * @var string $path destination du fichier
     */
    private $path;
    /**
     * @var string $name nom du fichier
     */
    private $name;
    /**
     * @var string $type type du fichier
     */
    private $type;

    /**
     * @var string $source source du fichier
     */
    private $source;
    /**
     * @var string $size taille du fichier
     */
    private $size;
    /**
     * @var string $oldFile ensien du fichier
     */
    private $oldFile = null;

    private $count = 0;


    /**
     * @param array $extensions
     */
    public function extensions(array $extensions = ['png','jpg']){
        $this->extensions = $extensions;
        return $this;
    }
    public function types(array $types = ['image/jpeg','image/png']){
        $this->types = $types;
        return $this;
    }

    /**
     * @param $image
     * @return $this
     */
    public function useImage($image){
        if($this->isUploaded($image)){
            $this->name = $image['name'];
            $this->type = $image['type'];
            $this->source = $image['tmp_name'];
            $this->size = $image['size'];
        }



        return $this;

    }
    private function isUploaded($image){
        $errors = is_array($image['error']) ? $image['error'] : [$image['error']];
        if(!in_array(UPLOAD_ERR_OK,$errors))
        {
            return false;
        }
        return true;
    }

    public function saveInto($path){
      $this->path = $path;

      return $this;
    }

    private function validateType($type)
    {
         if(!empty($this->types) && !in_array($type,$this->types)){
             return false;
         }

         return true;
    }

    private function validateExtension($name)
    {
        $ex = pathinfo($name,PATHINFO_EXTENSION);
        if(!empty($this->extensions) && !in_array($ex,$this->extensions)){
            return false;
        }
        return true;
    }
    public function deleteOldFile($oldFile){
        $this->oldFile = $oldFile;

        return $this;
    }

    public function save()
    {
        if(is_null($this->name) || $this->source === null){
            return null;
        }
        $this->delete();
        if(is_array($this->name)){
            $images = [];
            for($i = 0;$i < count($this->name);$i++){
                $this->count = $i+1;
                if($this->validateType($this->type[$i]) && $this->validateExtension($this->name[$i])){
                    $images[]= $this->moveImage($i);
                }
            }
            return $images;
        }
        else{
            if($this->validateType($this->type) && $this->validateExtension($this->name)){
                return $this->moveImage();
            }
        }
        return null;


    }

    private function moveImage($i = -1)
    {
        $path = $this->getPath();

        if(!file_exists($path)){
            mkdir($path,777,true);
        }

        $name = $i !== -1 ? $this->name[$i] : $this->name;
        $source = $i !== -1 ? $this->source[$i] : $this->source;
        $destination = $path.DIRECTORY_SEPARATOR.$name;
        if(file_exists($destination)){
            $destination = $this->rename($destination);
        }

        if(move_uploaded_file($source,$destination)){
            return pathinfo($destination,PATHINFO_BASENAME);
        }
        return null;
    }

    private function rename($destination)
    {
        $info = pathinfo($destination);
        $targetPath = $info['dirname'].DIRECTORY_SEPARATOR.$info['filename'].'_copy.'.$info['extension'];
        if(file_exists($targetPath)){
            return $this->rename($targetPath);
        }

        return $targetPath;

    }

    private function delete()
    {
        if(is_array($this->oldFile) && !empty($this->oldFile)){
            foreach ($this->oldFile as $item){
                $item = $this->getPath().DIRECTORY_SEPARATOR.$item;
                if(file_exists($item)){
                    unlink($item);
                }
            }
        }else if(!is_null($this->oldFile) && !empty($this->oldFile)){
            $item = $this->getPath().DIRECTORY_SEPARATOR.$this->oldFile;
            if(file_exists($item)){
                unlink($item);
            }
        }


    }
    public function deleteSingleImage($name,$path)
    {
        if(!is_null($name)){
            $item = $path.DIRECTORY_SEPARATOR.$name;
            if(file_exists($item)){
                unlink($item);
            }
        }


    }

    private function getPath()
    {
        $path = implode(DIRECTORY_SEPARATOR,explode('/',$this->path));
        return implode(DIRECTORY_SEPARATOR,array_filter(explode('\\',$path)));
    }
}