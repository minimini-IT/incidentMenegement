<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DownloadController extends AppController{
  public function downloadFile($id = null){

/*
 * DBからダウンロードするファイルの名前を取ってくる（現在はユニーク名でダウンロードとなる）
 * downloadのオプションでファイル名を指定
 */
    if ($this->request->is(["get"])) {

      //idからファイル名を取得
      $query = TableRegistry::get("Files");
      $query = $query->find()
        ->select(["file_name", "unique_file_name"])
        ->where(["files_id" => $id])
        ->first();
      $file_name = $query->file_name;
      $unique_file_name = $query->unique_file_name;

      //ダウンロード
      $this->autoRender = false;
      $this->response->file("upload_file/" . $unique_file_name);
      $this->response->download($file_name);
    }
  }
}
