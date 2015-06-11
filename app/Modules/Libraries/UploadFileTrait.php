<?php

namespace App\Modules\Libraries;

use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

/**
 * Class UploadFileTrait
 * @package App\CaliforniaElectricalTraining\Libraries
 *
 * UPLOAD FILE TRAIT
 *
 * Use to save files in the server
 * those files can be relation by the KEY given in the getFilePaths() method to a field in the database,
 * if you don't specify a entity ($this->entity), the trait can be used in any class
 */
trait UploadFileTrait
{

    /**
     * Base directory for upload files
     *
     * @var string
     */
    protected $baseDirectory = 'uploads';

    /**
     * Require to be initialize on constructor by the method getFilePaths();
     * @var
     */
    protected $filePaths;

    /**
     * Upload file procedure
     *
     * @throws Exception
     */
    protected function uploadFiles()
    {

        foreach ($this->data as $key => $file)
        {
            if($this->isUploadedFile($file))
            {
                $path = $this->defineDirectory($key);

                $this->createDirectory($path);

                $name = $this->makeFileName($file, $path);

                $file->move($path, $name);

                $this->saveEntity($key, $path.'/'.$name);
            }
        }
    }

    /**
     * If the upload file has a entity to store in the data base
     * we save the path in the database
     *
     * @param $field
     * @param $file_path
     */
    public function saveEntity($field, $file_path)
    {
        if(isset($this->entity))
        {
            $this->entity->{$field} = $file_path;
            $this->entity->save();
        }
    }

    /**
     * Is a instance of UploadedFile and is a valid file the file upload
     *
     * @param $file
     * @return bool
     */
    public function isUploadedFile($file)
    {
        if(($file instanceof UploadedFile) && ($file != null) && $file->isValid())
        {
            return true;
        }
        return false;
    }

    /**
     * Create the directory of the file if not exists
     *
     * @param $path
     */
    protected  function createDirectory($path)
    {
        if (!\File::isDirectory(public_path().'/'.$path)) {
            \File::makeDirectory(public_path().'/'.$path, 0777, true);
        }
    }

    /**
     * Return a path for the key given
     * Must the parent class has to implement the method filePaths
     *
     * @param $key
     * @return string
     * @throws Exception
     */
    protected function defineDirectory($key)
    {
        if(isset($this->filePaths[$key]))
        {
            return $this->baseDirectory.'/' . $this->filePaths[$key];
        }
        throw new Exception("Missing path for file!");
    }

    /**
     * Make a unique file name
     *
     * @param $file
     * @param $directory
     * @return string
     */
    protected function makeFileName($file, $directory)
    {
        $info = pathinfo($file->getClientOriginalName());
        return Str::slug($info['filename']).'-'.time().'.'.$info['extension'];
    }

    /**
     * Set the folder for the files
     *
     * @return array
     */
    protected function getFilePaths()
    {
        return [];
    }

    /**
     * Delete the file given path
     * @param $path
     */
    protected function deleteFileStored($path)
    {
        if(!empty($path) && file_exists($path))
        {
            unlink($path);
            $this->deleteThumb($path);
        }
    }

    /**
     * Delete thumb if exists.
     *
     * @param $path
     */
    protected function deleteThumb($path)
    {
        $thumb_name = basename($path);
        $thumb_path = str_replace($thumb_name, '', $path);
        if(file_exists($thumb_path.'thumb_'.$thumb_name))
        {
            unlink($thumb_path.'thumb_'.$thumb_name);
        }
    }

    /**
     * Validate if the current request has a file to upload
     * if is true we can delete the old file if is required by the implementation.
     *
     * @param $attribute
     * @return bool
     */
    protected function currentRequestHasUploadedFile($attribute)
    {
        foreach($this->data as $key => $file)
        {
            if($this->isUploadedFile($file) && $key == $attribute)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Delete old files if exist a request to new files
     */
    protected  function cleanUploadedFiles($key){
        if($this->currentRequestHasUploadedFile($key))
            $this->deleteFileStored($this->entity->{$key});
    }

    /**
     * Resize a image
     *
     * @param $path
     * @param $width
     * @param $height
     * @return mixed
     */
    protected function resizeImage($path, $width, $height)
    {
        if($path)
        {
            $img = Image::make($path);
            $img->resize($width, $height);
            $img->save();
            return $img;
        }

    }

    /**
     * Create a thumb of the image, this will be stored in the same directory
     * with the prefix _thumb, the fourth parameter made the thumb crop or just resize
     * by default
     *
     * @param $path
     * @param $width
     * @param $height
     * @param bool $type
     */
    protected function createThumb($path, $width, $height, $type = false)
    {
        $thumb_name = basename($path);
        $thumb_path = str_replace($thumb_name, '', $path);

        $img = Image::make($path);

        if($type){
            $size = $this->cropSize($img);
            $img->crop($size, $size);
            $img->save($thumb_path.'thumb_'.$thumb_name);
        }
        $img->resize($width, $height);
        $img->save($thumb_path.'thumb_'.$thumb_name);
    }

    /**
     * Return the size to crop based on the large size
     *
     * @param $img
     * @return mixed
     */
    protected function cropSize($img)
    {
        if ($img->width() >= $img->height()) {
            return $img->height();
        } else {
            return $img->width();
        }
    }

    /**
     * Delete old file if exist and if there is a new one to upload
     */
    protected function deleteOldFile($file)
    {
        if(isset($this->data[$file]))
        {
            if(!empty($this->entity->{$file}) && file_exists($this->entity->{$file}))
            {
                unlink($this->entity->{$file});
            }
        }
    }




} 