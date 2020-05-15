<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\datasource\ConnectionManager;

class DairyController extends AppController{

    public function index()
    {
        //ログインユーザ
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");

        //-----今日の予定------
        $this->loadModels(["OrderNews", "Workers", "Statuses", "RiskDetections", "Schedules", "IncidentManagements", "CrewSends", "PrivateMessages"]);
        //日付部分はクォーテーション必要
        //今日の日付を取得
        $today = date("Y-m-d");
        $between = ["conditions" => ["'" . $today . "'" . "between Schedules.schedule_start_date and Schedules.schedule_end_date"]];

        $this->paginate = [
            'contain' => [
              "ScheduleRepeats"
            ],
            "order" => ["schedule_start_time" => "asc"]
          ];

        //曜日取得
        $todayDayOfWeek = date("w") + 1;

        $today_schedules = $this->Schedules->find("all", $between);
        $today_schedules = $this->paginate($today_schedules);

        //-----勤務者------
        $workers = $this->Workers->find("all")
            ->where(["date" => $today])
            ->contain([
                'Users', 
                'Positions', 
                'Shifts', 
                'Duties', 
            ])
            ->order(["ranks_id" => "asc"]);

        $allDayCount = 0;
        $dayCrewCount = 0;
        $nightCrewCount = 0;

        foreach($workers as $w)
        {
            if($w->positions_id == 1)
            {
                $allDayCount++;
            }
            else if($w->positions_id == 2)
            {
                $dayCrewCount++;
            }
            else if($w->positions_id == 3)
            {
                $nightCrewCount++;
            }
        }

        //------サイバー攻撃対処状況------
        $statuses = $this->Statuses->find("all")
            ->select(["status"]);

        //各ステータスそれぞれの件数を取得
        //ステータスの数
        $statusNumber = $statuses->count();
        //ステータス数を保存
        $nowStatus = [];
        $i = 1;
        foreach($statuses as $status)
        {
            $count = $this->RiskDetections->find("all")
                ->where(["statuses_id" => $i]);
            $count = $count->count();
            //$nowStatus = array_merge($nowStatus, [$status => $count]);
            //収束は表示しなくてよし
            if($status->status != "収束")
            {
                $nowStatus[$status->status] = $count;
            }
            $i++;
        }

        //-----継続中のスレッド------
        //いらない？
            //クルー申し送り
        /*
        $crewSendContinueThread = $this->CrewSends->find("all", [
            "contain" => [
                "IncidentManagements.ManagementPrefixes"
            ],
            "limit" => 5
        ])
            ->where(["statuses_id !=" => 2])
            ->where(["statuses_id !=" => 3])
            ->where(["statuses_id !=" => 5])
            ->order(["crew_sends_id" => "desc"]);

            //メッセージボード
        $messageBordContinueThread = $this->PrivateMessages->find("all", [
            "contain" => [
                "MessageBords.IncidentManagements.ManagementPrefixes"
            ],
            "limit" => 5,
            "order" => ["MessageBords.message_bords_id" => "desc"]
        ])
            ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
            ->where(["message_statuses_id" => 1]);
         */
        /*
        $messageBordContinueThread = $this->MessageBords->find("all", [
            "contain" => [
                "IncidentManagements.ManagementPrefixes"
            ],
        ])
            ->order(["message_bords_id" => "desc"])
            ->where(["message_statuses_id !=" => 2]);
         */

        //-----更新されたスレッド------
            //クルー申し送り
        $crewSendUpdateThread = $this->CrewSends->find("all", [
            "contain" => [
                "IncidentManagements.ManagementPrefixes",
            ],
            "limit" => 5
        ])
            ->where(["CrewSends.statuses_id !=" => 2])
            ->where(["CrewSends.statuses_id !=" => 3])
            ->where(["CrewSends.statuses_id !=" => 5])
            ->order(["CrewSends.modified" => "desc"]);

            //メッセージボード
        $messageBordUpdateThread = $this->PrivateMessages->find("all", [
            "contain" => [
                "MessageBords.IncidentManagements.ManagementPrefixes"
            ],
            "limit" => 5,
            "order" => ["MessageBords.message_bords_id" => "desc"]
        ])
            ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
            ->where(["message_statuses_id" => 1])
            ->order(["MessageBords.modified" => "desc"]);


        //明日から６日分の日付取得
        $days = array();
        for($i = 1; $i < 7; $i++){
            $today = date("Y-m-d", strtotime("{$i} day"));
            $days[] = $today;
        } 

        //機能の日付を取得
        $yesterday = date("Y-m-d", strtotime("-1 day"));
        

        /*
        $sql = "select schedules_id, schedule_start_date, schedule_end_date, schedule_start_time, schedule from schedules where '" . $today . "' between schedule_start_date and schedule_end_date";
        $connection = ConnectionManager::get("default");
        $today_schedules = $connection->execute($sql)->fetchAll("assoc");
         */




        /*
        //$today加算して明日から取得するようにする
        $weekBetween = ["conditions" => ["'" . $today . "'" . "+ interval 7 day between Schedules.schedule_start_date and Schedules.schedule_end_date"]];
        $weekry_schedules = $this->Schedules->find("all", $between);
        $weekry_schedules = $this->paginate($weekry_schedules);
         */






        /*
        $connection = ConnectionManager::get("default");
        //scheduleを今日から1週間分取得
        $sql = "select schedules_id, schedule_start_date, schedule_end_date, schedule from schedules where 
            ('" . $days[0] . "' between schedule_start_date and schedule_end_date) or
            ('" . $days[1] . "' between schedule_start_date and schedule_end_date) or
            ('" . $days[2] . "' between schedule_start_date and schedule_end_date) or
            ('" . $days[3] . "' between schedule_start_date and schedule_end_date) or
            ('" . $days[4] . "' between schedule_start_date and schedule_end_date) or
            ('" . $days[5] . "' between schedule_start_date and schedule_end_date)";
        $weekry_schedules = $connection->execute($sql)->fetchAll("assoc");
         */
 
        //weekry_schedulesからtoday_schedulesを引く
        /*
        foreach($today_schedules as $today_schedule){
            $i = 0;
            foreach($weekry_schedules as $weekry_schedule){
                if($today_schedule["schedules_id"] == $weekry_schedule["schedules_id"]){
                    unset($weekry_schedules[$i]);
                    $weekry_schedules = array_values($weekry_schedules);
                    break;
                }
                $i++;
            }
        }
         */

        //order_newsを今日の分取得
        /*        
        $sql = "select * from schedules where '" . $today . "' between schedule_start_date and schedule_end_date";
        $connection = ConnectionManager::get("default");
        $schedules = $connection->execute($sql)->fetchAll("assoc");
        */
        //$orderNews = $this->OrderNews->find("all");
        
        //昨日のorder_newsを取得
        
        //$orderNews = $this->OrderNews->find()
        //    ->select(["title", "comment"])
        //    ->where(["order_news_date" => $yesterday]);

        //$between = ["conditions" => ["Workers.date between '" . $today . "' and '" . $today . "'"]];
        //本日の勤務者
        //$workers = $this->Workers->find("all", $between)
        /*
        $this->paginate = [
            'contain' => [
                'Users'
            ]
        ];
        $allDayWorkers = $this->Workers->find("all")
            ->where(["date" => $today])
            ->where(["positions_id" => 1]);
        $allDayWorkers = $this->paginate($allDayWorkers);
        $allDayCount = count($allDayWorkers);

        $dayCrews = $this->Workers->find("all")
            ->where(["date" => $today])
            ->where(["positions_id" => 2]);
        $allDayWorkers = $this->paginate($allDayWorkers);
        $allDayCount = count($allDayWorkers);
         */

        
            /*
        $this->paginate = [
            'contain' => [
                'Users' => ["sort" => ["ranks_id" => "asc"]], 
                'Positions', 
                'Shifts', 
                'Duties', 
            ],
        ];
             */
        //$workers = $this->paginate($workers);


        //$this->set(compact("loginUser", 'today_schedules', "today", "workers", "statuses", "nowStatus", "todayDayOfWeek", "allDayCount", "dayCrewCount", "nightCrewCount", "crewSendContinueThread", "messageBordContinueThread", "messageBordLatestThread", "crewSendUpdateThread"));
        //$this->set(compact("loginUser", 'today_schedules', "today", "workers", "statuses", "nowStatus", "todayDayOfWeek", "allDayCount", "dayCrewCount", "nightCrewCount", "crewSendContinueThread", "messageBordContinueThread", "messageBordUpdateThread", "crewSendUpdateThread"));
        $this->set(compact("loginUser", 'today_schedules', "today", "workers", "statuses", "nowStatus", "todayDayOfWeek", "allDayCount", "dayCrewCount", "nightCrewCount", "messageBordUpdateThread", "crewSendUpdateThread"));
    
    }
}
