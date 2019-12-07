<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * FileDelete component
 */
class FileDeleteComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function delete_file($unique_file_name = null){
      $dir = realpath(WWW_ROOT . "/upload_file");
      $file_path = $dir . "/" . $unique_file_name;
      if(unlink($file_path)){
        return true;
      }else{
        return false;
      }
    }
}
