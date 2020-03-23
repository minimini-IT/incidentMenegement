<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RiskDetections Controller
 *
 * @property \App\Model\Table\RiskDetectionsTable $RiskDetections
 *
 * @method \App\Model\Entity\RiskDetection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RiskDetectionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
    }

    public function risk()
    {
        //検索結果用
        if($this->request->is("post"))
        {
            $data = $this->request->getData();
            $between = null;

            //日付指定がある場合はfindよりさきにbetweenの定義が必要
            if($data["response_start_time"] != "")
            {
                $searchStartDay = $data["response_start_time"];
                $searchEndDay = $data["response_start_time_end"];
                $between = ["conditions" => ["RiskDetections.response_start_time between '" . $searchStartDay . "' and '" . $searchEndDay . "'"]];
            }

            /*
            $referer = $this->referer(null, true);
            $incidentCase = $referer == "/risk-detections/risk" ? 2 : 1;
             */

            /*
            $riskOnly = $between === null ? $this->Riskdetections->find("all")->where(["incident_cases_id" => 2]) : $this->Riskdetections->find("all", $between)->where(["incident_cases_id" => 2]);
             */
            if($between === null)
            {
                $riskOnly = $this->RiskDetections->find("all")
                //->where(["incident_cases_id" => $incidentCase]);
                ->where(["incident_cases_id" => 2]);
            }
            else
            {
                $riskOnly = $this->RiskDetections->find("all", $between)
                //->where(["incident_cases_id" => $incidentCase]);
                ->where(["incident_cases_id" => 2]);
            }
            foreach($data as $key => $value)
            {
                //全検索
                if($value != "")
                {
                    if($key == "comment")
                    {
                        $riskOnly = $riskOnly->where(["RiskDetections." . $key => "%" . $value . "%"]);
                    }
                    else if($key == "response_start_time" || $key == "response_start_time_end")
                    {
                        //何もしない
                    }
                    else
                    {
                        $riskOnly = $riskOnly->where(["RiskDetections." . $key => (int)$value]);
                    }
                }
            }
        }
        else
        {
            $riskOnly = $this->RiskDetections->find("all")
                ->where(["RiskDetections.statuses_id !=" => 3])
                ->where(["incident_cases_id" => 2]);
        }
        $this->paginate = [
            'contain' => [
                'Systems', 
                'Bases', 
                'Units', 
                'Statuses', 
                'Reports', 
                'Positives', 
                'SecLevels', 
                "IncidentManagements.ManagementPrefixes",
                "IncidentChronologies.Users",
                'InfectionRoutes'
            ],
            "limit" => 5,
            "order" => ["risk_detections_id" => "desc"]
        ];
        //$riskDetections = $this->paginate($this->RiskDetections);
        //incident_caseがウイルス検知のもののみ
        $riskDetections = $this->paginate($riskOnly);
        $systems = $this->RiskDetections->Systems->find('list', ['limit' => 200]);
        $bases = $this->RiskDetections->Bases->find('list', ['limit' => 200]);
        $units = $this->RiskDetections->Units->find('list', ['limit' => 200]);
        $statuses = $this->RiskDetections->Statuses->find('list', ['limit' => 200]);
        $reports = $this->RiskDetections->Reports->find('list', ['limit' => 200]);
        $positives = $this->RiskDetections->Positives->find('list', ['limit' => 200]);
        $secLevels = $this->RiskDetections->SecLevels->find('list', ['limit' => 200]);
        $infectionRoutes = $this->RiskDetections->InfectionRoutes->find('list', ['limit' => 200]);

        $this->set(compact('riskDetections', "systems", 'bases', 'units', 'statuses', 'reports', 'positives', 'secLevels', 'infectionRoutes'));
    }

    public function malmail()
    {
        if($this->request->is("post"))
        {
            $data = $this->request->getData();
            $between = null;
            if($data["response_start_time"] != "")
            {
                $searchStartDay = $data["response_start_time"];
                $searchEndDay = $data["response_start_time_end"];
                //betweenはfindより先に定義する必要がある
                $between = ["conditions" => ["RiskDetections.response_start_time between '" . $searchStartDay . "' and '" . $searchEndDay . "'"]];
            }
            if($between === null)
            {
                $riskOnly = $this->RiskDetections->find("all")
                ->where(["incident_cases_id" => 1]);
            }
            else
            {
                $riskOnly = $this->RiskDetections->find("all", $between)
                ->where(["incident_cases_id" => 1]);
            }
            foreach($data as $key => $value)
            {
                if($value != "")
                {
                    if($key == "comment")
                    {
                        $riskOnly = $riskOnly->where(["RiskDetections." . $key => "%" . $value . "%"]);
                    }
                    else if($key == "response_start_time" || $key == "response_start_time_end")
                    {
                        //何もしない
                    }
                    else
                    {
                        $riskOnly = $riskOnly->where(["RiskDetections." . $key => (int)$value]);
                    }
                }
            }
        }
        else
        {
            $riskOnly = $this->RiskDetections->find("all")
                ->where(["RiskDetections.statuses_id !=" => 3])
                ->where(["incident_cases_id" => 1]);
        }
        $this->paginate = [
            'contain' => [
                'Systems', 
                'Bases', 
                'Units', 
                'Statuses', 
                'Reports', 
                'Positives', 
                'SecLevels', 
                "IncidentManagements.ManagementPrefixes",
                "IncidentChronologies.Users",
                'InfectionRoutes'
            ],
            "limit" => 5,
            "order" => ["risk_detections_id" => "desc"]
        ];
        //incident_caseがウイルス検知のもののみ
        $riskDetections = $this->paginate($riskOnly);
        $systems = $this->RiskDetections->Systems->find('list', ['limit' => 200]);
        $bases = $this->RiskDetections->Bases->find('list', ['limit' => 200]);
        $units = $this->RiskDetections->Units->find('list', ['limit' => 200]);
        $statuses = $this->RiskDetections->Statuses->find('list', ['limit' => 200]);
        $reports = $this->RiskDetections->Reports->find('list', ['limit' => 200]);
        $positives = $this->RiskDetections->Positives->find('list', ['limit' => 200]);
        $secLevels = $this->RiskDetections->SecLevels->find('list', ['limit' => 200]);

        $this->set(compact('riskDetections', "systems", 'bases', 'units', 'statuses', 'reports', 'positives', 'secLevels'));
    }

    public function incidentSpreadsheet($y = null)
    {
        debug($y);
        $year = date("Y");
        $startDay = date("Y-m-01, time()");
        //$startDay = date("Y-m-d", strtotime(""));
        $endDay = date("Y-m-t, time()");
        $between = ["conditions" => ["RiskDetections.response_start_time between '" . $startDay . "' and '" . $endDay . "'"]];
        $query = $this->RiskDetections->find("all")
            ->where(["incident_cases_id" => 1]);
        $april = $query->count();
        $this->set(compact("year", "april"));

    }

    /*
    public function search()
    {
        $data = $this->request->getData();
        $between = null;
        if($data["response_start_time"] != "")
        {
            $searchStartDay = $data["response_start_time"];
            $searchEndDay = $data["response_start_time_end"];
            //betweenはfindより先に定義する必要がある
            $between = ["conditions" => ["RiskDetections.response_start_time between '" . $searchStartDay . "' and '" . $searchEndDay . "'"]];
        }
        $referer = $this->referer(null, true);
        $incidentCase = $referer == "/risk-detections/risk" ? 2 : 1;

        if($between === null)
        {
            $riskOnly = $this->RiskDetections->find("all")
            ->where(["incident_cases_id" => $incidentCase]);
        }
        else
        {
            $riskOnly = $this->RiskDetections->find("all", $between)
            ->where(["incident_cases_id" => $incidentCase]);
        }
        foreach($data as $key => $value)
        {
            if($value != "")
            {
                if($key == "comment")
                {
                    $riskOnly = $riskOnly->where(["RiskDetections." . $key => "%" . $value . "%"]);
                }
                else if($key == "response_start_time" || $key == "response_start_time_end")
                {
                    //何もしない
                }
                else
                {
                    $riskOnly = $riskOnly->where(["RiskDetections." . $key => (int)$value]);
                }
            }
        }
        $this->paginate = [
            'contain' => [
                'Systems', 
                'Bases', 
                'Units', 
                'Statuses', 
                'Reports', 
                'Positives', 
                'SecLevels', 
                "IncidentManagements.ManagementPrefixes",
                "IncidentChronologies.Users",
                'InfectionRoutes'
            ],
            "limit" => 5,
            "order" => ["risk_detections_id" => "desc"]
        ];
        //$riskDetections = $this->paginate($this->RiskDetections);
        //incident_caseがウイルス検知のもののみ
        $riskDetections = $this->paginate($riskOnly);
        $this->set(compact('riskDetections'));
    }
     */

    /**
     * View method
     *
     * @param string|null $id Risk Detection id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $riskDetection = $this->RiskDetections->get($id, [
            'contain' => ['Systems', 'Bases', 'Units', 'Statuses', 'Reports', 'Positives', 'SecLevels', 'InfectionRoutes']
        ]);

        $this->set('riskDetection', $riskDetection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function riskAdd()
    {
        $riskDetection = $this->RiskDetections->newEntity();
        if ($this->request->is('post')) 
        {
            $this->IncidentManagement = $this->loadComponent("IncidentAdd");
            $data = $this->request->getData();
            /*
            $this->log("---発生時刻---", LOG_DEBUG);
            $this->log($data["occurrence_datetime"], LOG_DEBUG);
             */

            //save前にincident_managements更新
            if(is_int($incidentNumber = $this->IncidentManagement->incident_number(5)))
            {
                //インシデント番号生成成功したら
                $data = array_merge($data, ["incident_managements_id" => $incidentNumber]);
                $riskDetection = $this->RiskDetections->patchEntity($riskDetection, $data);

                /*
                $this->log("---riskDetection---", LOG_DEBUG);
                $this->log($riskDetection, LOG_DEBUG);
                 */
                if ($this->RiskDetections->save($riskDetection)) 
                {
                    $this->Flash->success(__('The risk detection has been saved.'));
                    $id = $riskDetection->risk_detections_id;

                    return $this->redirect(['action' => 'risk']);
                }
                $this->Flash->error(__('インシデントID生成成功、risk_detections save 失敗'));
                return $this->redirect(['action' => 'risk']);
            }

            $this->Flash->error(__('インシデントID生成失敗'));
        }
        $systems = $this->RiskDetections->Systems->find('list', ['limit' => 200]);
        $bases = $this->RiskDetections->Bases->find('list', ['limit' => 200]);
        $units = $this->RiskDetections->Units->find('list', ['limit' => 200]);
        $statuses = $this->RiskDetections->Statuses->find('list', ['limit' => 200]);
        $reports = $this->RiskDetections->Reports->find('list', ['limit' => 200]);
        $positives = $this->RiskDetections->Positives->find('list', ['limit' => 200]);
        $secLevels = $this->RiskDetections->SecLevels->find('list', ['limit' => 200]);
        $infectionRoutes = $this->RiskDetections->InfectionRoutes->find('list', ['limit' => 200]);
        $this->set(compact('riskDetection', 'systems', 'bases', 'units', 'statuses', 'reports', 'positives', 'secLevels', 'infectionRoutes'));
    }

    public function malmailAdd()
    {
        $riskDetection = $this->RiskDetections->newEntity();
        if ($this->request->is('post')) {
            $riskDetection = $this->RiskDetections->patchEntity($riskDetection, $this->request->getData());
            if ($this->RiskDetections->save($riskDetection)) {
                $this->Flash->success(__('The risk detection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risk detection could not be saved. Please, try again.'));
        }
        $systems = $this->RiskDetections->Systems->find('list', ['limit' => 200]);
        $bases = $this->RiskDetections->Bases->find('list', ['limit' => 200]);
        $units = $this->RiskDetections->Units->find('list', ['limit' => 200]);
        $statuses = $this->RiskDetections->Statuses->find('list', ['limit' => 200]);
        $reports = $this->RiskDetections->Reports->find('list', ['limit' => 200]);
        $positives = $this->RiskDetections->Positives->find('list', ['limit' => 200]);
        $secLevels = $this->RiskDetections->SecLevels->find('list', ['limit' => 200]);
        $infectionRoutes = $this->RiskDetections->InfectionRoutes->find('list', ['limit' => 200]);
        $this->set(compact('riskDetection', 'systems', 'bases', 'units', 'statuses', 'reports', 'positives', 'secLevels', 'infectionRoutes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Risk Detection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $riskDetection = $this->RiskDetections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $riskDetection = $this->RiskDetections->patchEntity($riskDetection, $this->request->getData());
            if ($this->RiskDetections->save($riskDetection)) {
                $this->Flash->success(__('The risk detection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risk detection could not be saved. Please, try again.'));
        }
        $systems = $this->RiskDetections->Systems->find('list', ['limit' => 200]);
        $bases = $this->RiskDetections->Bases->find('list', ['limit' => 200]);
        $units = $this->RiskDetections->Units->find('list', ['limit' => 200]);
        $statuses = $this->RiskDetections->Statuses->find('list', ['limit' => 200]);
        $reports = $this->RiskDetections->Reports->find('list', ['limit' => 200]);
        $positives = $this->RiskDetections->Positives->find('list', ['limit' => 200]);
        $secLevels = $this->RiskDetections->SecLevels->find('list', ['limit' => 200]);
        $infectionRoutes = $this->RiskDetections->InfectionRoutes->find('list', ['limit' => 200]);
        $this->set(compact('riskDetection', 'systems', 'bases', 'units', 'statuses', 'reports', 'positives', 'secLevels', 'infectionRoutes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Risk Detection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $riskDetection = $this->RiskDetections->get($id);
        if ($this->RiskDetections->delete($riskDetection)) {
            $this->Flash->success(__('The risk detection has been deleted.'));
        } else {
            $this->Flash->error(__('The risk detection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
