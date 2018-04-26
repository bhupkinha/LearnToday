<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * SubCategories Controller
 *
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 *
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
     public function initialize()
    {

        parent::initialize();
        $this->loadComponent('Flash'); 
    }
    
     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
       // $this->Users->userAuth = $this->UserAuth;
        $this->Auth->allow(['index','add','view','delete','edit','status']);
        
    }
    
   public function index()
    {
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $name = '';
        $bodie ='';
        $norec = 10;
        $status = '';
        $search = [];
        if (isset($this->request->query['name']) && trim($this->request->query['name']) != "") {
            $name = $this->request->query['name'];
            $search['SubCategories.name REGEXP'] = $name;
        }
        if (isset($this->request->query['status']) && trim($this->request->query['status']) != "") {
            $status = $this->request->query['status'];
            $search['SubCategories.status'] = $status;
        }
        if (isset($this->request->query['body_id']) && trim($this->request->query['body_id']) != "") {
            $bodie = $this->request->query['body_id'];
            $search['SubCategories.category_id'] = $bodie;
        }
        if (isset($this->request->query['norec']) && trim($this->request->query['norec']) != "") {
            $norec = $this->request->query['norec'];
        }
        if (isset($search)) {
            $count = $this->SubCategories->find('all')
                    ->where([$search]);
        } else {
            $count = $this->SubCategories->find('all');
        }
        $count = $count->where(['SubCategories.status !=' => '2']);

        
        $this->paginate = [
            'limit' => $norec, 
            'order' => ['SubCategories.id' => 'DESC'],
            'contain' => ['Categories']
        ];
         $subcategries = $this->paginate($count);
         $categories = $this->SubCategories->Categories->find('list', ['limit' => 200])->where(['Categories.status' => '1']);

        $this->set(compact('subcategries','name','status','norec','categories','bodie'));
        $this->set('_serialize', ['subcategries']);
    }

    /**
     * View method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   public function view($id = null)
    { 
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $subcategries = $this->SubCategories->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('subcategries', $subcategries);
        $this->set('_serialize', ['subcategries']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    { 
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $subcategries = $this->SubCategories->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['slug'] = $this->slugify($data['name']);
            $subcategrie = $this->SubCategories->patchEntity($subcategries, $data);
            if ($this->SubCategories->save($subcategrie)) {
                $this->Flash->success(__('The subcategries has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategries could not be saved. Please, try again.'));
        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 200])->where(['Categories.status' => '1']);

        $this->set(compact('subcategries', 'categories'));
        $this->set('_serialize', ['subcategries']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
      public function edit($id = null)
    { 
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $subcategries = $this->SubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data = $this->request->data;
            $data['slug'] = $this->slugify($data['name']);
            $subcategrie = $this->SubCategories->patchEntity($subcategries, $data);
            if ($this->SubCategories->save($subcategrie)) {
                $this->Flash->success(__('The subcategrie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategrie could not be saved. Please, try again.'));
        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('subcategries', 'categories'));
        $this->set('_serialize', ['subcategries']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
        public function delete($id = null)
    { 
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
         $category = $this->SubCategories->get($id);
        
           if ($category->id !='') {
            
            $query = $this->SubCategories->query();
                     $result = $query->update()
                    ->set(['status' =>'2'])
                    ->where(['id' =>$category->id])
                    ->execute();
            
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     public function status() {
                       if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $id = $this->request->params['pass'][0];
        $status = $this->request->params['pass'][1];
        $user = $this->SubCategories->get($id);
        if ($status == 1) {
            $user_data['status'] = 0;
            $user_data['id'] = $id;
            $user = $this->SubCategories->patchEntity($user, $user_data);
            if ($this->SubCategories->save($user)) {
                $st = $user_data['status'] ? '<span class="label label-success">' . __('Active') . '</span>' : '<span class="label label-danger">' . __('Inactive') . '</span>';
                // echo "<a href= '#' onclick = 'updateStatus(" . $id . "," . $user_data['status'] . ")'> " . $st . " </a>";
                echo '<button id=' . $id . ' class="btn btn-primary waves-effect status" value=' . $user_data['status'] . ' onclick="updateStatus(this.id,' . $user_data['status'] . ')" type="submit">Inactive</button>';
                exit;
            }
        } else {
            $user_data['status'] = 1;
            $user_data['id'] = $id;
            $user = $this->SubCategories->patchEntity($user, $user_data);
            if ($this->SubCategories->save($user)) {
                $st = $user_data['status'] ? '<span class="label label-success">' . __('Active') . '</span>' : '<span class="label label-danger">' . __('Inactive') . '</span>';
                echo '<button id=' . $id . ' class="btn btn-success waves-effect status" value=' . $user_data['status'] . ' onclick="updateStatus(this.id,' . $user_data['status'] . ')" type="submit">Active</button>';
                exit;
            }
        }
    }
    
     public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->theme('Admintheme');
    }
    
}
