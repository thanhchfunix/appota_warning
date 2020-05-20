<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Warnings Controller
 *
 * @property \App\Model\Table\WarningsTable $Warnings
 * @method \App\Model\Entity\Warning[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WarningsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $warnings = $this->paginate($this->Warnings);

        // //search name
        $key = $this->request->getQuery('key');

        $conditions = [];
        if ($key){
            $query = $this->Warnings->find('all')->where(['name like'=>'%'.$key.'%']);
            $warnings = $this->paginate($query);
        } else {
            $query = $this->Warnings;
            $warnings = $this->paginate($query);
        }
        $this->paginate = [
            'conditions' => $conditions
        ];
        
        $this->set(compact('warnings'));
    }

    /**
     * View method
     *
     * @param string|null $id Warning id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $warning = $this->Warnings->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('warning'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $warning = $this->Warnings->newEmptyEntity();
        if ($this->request->is('post')) {
            $warning = $this->Warnings->patchEntity($warning, $this->request->getData());
            if ($this->Warnings->save($warning)) {
                $this->Flash->success(__('The warning has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warning could not be saved. Please, try again.'));
        }
        $this->set(compact('warning'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Warning id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $warning = $this->Warnings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $warning = $this->Warnings->patchEntity($warning, $this->request->getData());
            if ($this->Warnings->save($warning)) {
                $this->Flash->success(__('The warning has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warning could not be saved. Please, try again.'));
        }
        $this->set(compact('warning'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Warning id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $warning = $this->Warnings->get($id);
        if ($this->Warnings->delete($warning)) {
            $this->Flash->success(__('The warning has been deleted.'));
        } else {
            $this->Flash->error(__('The warning could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
