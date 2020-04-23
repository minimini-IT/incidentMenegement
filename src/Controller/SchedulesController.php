<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 *
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $schedules = $this->paginate($this->Schedules);

        $this->set(compact('schedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => []
        ]);

        $this->set('schedule', $schedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        $this->loadModels(["Repeats", "ScheduleRepeats"]);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->IncidentManagement = $this->loadComponent("IncidentAdd");
            //MessageBord save前にincident_managements更新
            if(is_int($incidentNumber = $this->IncidentManagement->incident_number(1)))
            {
                //インシデント番号生成成功したら
                $data = array_merge($data, ["incident_managements_id" => $incidentNumber]);
                $this->log("---data---", LOG_DEBUG);
                $this->log($data, LOG_DEBUG);
                $schedule = $this->Schedules->patchEntity($schedule, $data);
                if ($this->Schedules->save($schedule)) {

                    //ScheduleRepeatsあれば登録
                    if(!empty($data["scheduleRepeats"]))
                    {
                        $id = $schedule->schedules_id;
                        foreach($data["scheduleRepeats"] as $repeat)
                        {
                            $entity[] = [
                                "repeats_id" => $repeat,
                                "schedules_id" => $id
                            ];
                        }
                        $scheduleRepeats = $this->ScheduleRepeats->newEntities($entity);
                        if($this->ScheduleRepeats->saveMany($scheduleRepeats)){
                            $this->Flash->success(__('schedule repeats 登録'));
                            return $this->redirect(["controller" => "Dairy", 'action' => 'index']);
                        }
                        else
                        {
                            $this->Flash->error(__('schedule repeats save 失敗'));
                            return $this->redirect(["controller" => "Dairy", 'action' => 'index']);
                        }
                    }

                    $this->Flash->success(__('schedules save 成功'));
                    return $this->redirect(["controller" => "Dairy", 'action' => 'index']);
                }
                $this->Flash->error(__('schedules save 失敗'));
                return $this->redirect(["controller" => "Schedules", 'action' => 'add']);
            }
            $this->Flash->error(__('incident_number 生成　失敗'));
            return $this->redirect(["controller" => "Schedules", 'action' => 'add']);
        }
        $repeats = $this->Repeats->find("list", ["limit" => 200]);
        $this->set(compact('schedule', "repeats"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $this->set(compact('schedule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
