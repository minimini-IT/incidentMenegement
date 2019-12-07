<?php
namespace App\Controller\Component;

use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\File;
use Cake\Controller\Component\FlashComponent;
use Cake\datasource\ConnectionManager;

/**
 * Fileupload component
 */
class FileuploadComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    //コンポーネントから他コンポーネント呼び出し
    public $components = ["Flash"];

    public function initialize(array $config){
      $this->Files = TableRegistry::getTableLocator()->get("Files");
    }

    //表示用ファイルサイズ整形メソッド
    public function file_size_check($size){
      $b = 1024;
      $mb = pow($b, 2);
      $gb = pow($b, 3);
      switch(true){
      case $size >= $gb:
        $target = $gb;
        $unit = "GB";
        break;
      
      case $size >= $mb:
        $target = $mb;
        $unit = "MB";
        break;
      
      default:
        $target = $b;
        $unit = "KB";
        break;
      }
      $new_size = round($size / $target, 2);
      $file_size = number_format($new_size, 2, ".", ",") . $unit;
      return $file_size;
    }

    //ファイルグループ確認メソッド
    public function next_file_group(){
        $query = $this->Files->find("all");
        $next_file_group = $query
          ->select(["max_group" => $query->func()->max("file_group")])
          ->first();
        return (int)$next_file_group->max_group + 1;
    }

    //ファイルアップロードメソッド
    public function file_upload($file = null, $dir = null, $limitFileSize = 1024 * 1024 * 200){
      try{
        //ファイルを保存するフォルダのチェック
        if($dir){
          if(!file_exists($dir)){
            throw new RuntimeException("指定のディレクトリがありません");
          }
        }else{
          throw new RuntimeException("ディレクトリの指定がありません");
        }

        //未定義、破損攻撃は無効処理
        if(!isset($file["error"])){
          throw new RuntimeException("Invalid parameters");
        }

        //エラーチェック
        switch($file["error"]){
          case 0:
            break;
          case UPLOAD_ERR_OK:
            break;
          case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException("Exceeded filesize limit");
          default:
            throw new RuntimeException("Unknown errors");
        }

        //ファイル情報取得
        $fileInfo = new File($file["name"]);

        //ファイルサイズチェック
        if($fileInfo->size() > $limitFileSize){
          throw new RuntimeException("Exceeded filesize limit");
        }

        //拡張子取得
        $file_ext = $fileInfo->ext();

        //ファイル名取得
        $uploadFile = $fileInfo->name() . "." . $file_ext;

        //ユニークファイル名取得
        $unique_file_name = substr($file["tmp_name"], 5) . "." . $file_ext;
        

        //ファイルの移動
        if(!@move_uploaded_file($file["tmp_name"], $dir . "/" . $unique_file_name)){
          throw new RuntimeException("Failed to move uploaded file");
        }

        //ファイルサイズ取得
        $fileSize = filesize($dir . "/" . $unique_file_name);
        $fileSize = $this->file_size_check($fileSize);

      }catch(RuntimeException $e){
        throw $e;
      }
      return array($uploadFile, $fileSize, $unique_file_name);
    }
    
    //ファイルアップロードのデフォルト機能
    public function default_upload($file_data){
      //file_group取得
      $file_group = $this->next_file_group();

      //格納するディレクトリ 
      $dir = realpath(WWW_ROOT . "/upload_file");

      //容量200M
      $limitFileSize = 1024 * 1024 * 200;

      try {
        //file_uploadメソッドのアウトプット用
        $file_detail = array();
        //$fileエンティティに一括でデータを埋め込む用
        $file_entity = array();

        foreach($file_data as $upload_file){
          $file_detail = $this->file_upload($upload_file, $dir, $limitFileSize);
          $file_entity[] = [
            "file_group" => $file_group, 
            "file_name" => $file_detail[0], 
            "file_size" => $file_detail[1], 
            "unique_file_name" => $file_detail[2]
          ];
        }
        $file = $this->Files->newEntities($file_entity);
        $file = $this->Files->patchEntities($file, $file_entity);

      }catch(RuntimeException $e){
        $this->Flash->error(__("ファイルのアップロードができませんでした"));
        $this->Flash->error(__($e->getMessage()));
      }

      if ($this->Files->saveMany($file)) {
          $this->Flash->success(__('The file has been saved.'));

          return true;
      }
      $this->Flash->error(__('The file could not be saved. Please, try again.'));
    }

    public function template_file_upload($entity){
      $sql = "select files_id, file_name, file_size from files where file_group = {$entity->file_group}";
      $connection = ConnectionManager::get("default");
      $files_info = $connection->execute($sql)->fetchAll("assoc");
      return $files_info;
    }

}
