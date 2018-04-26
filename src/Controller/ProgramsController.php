<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Programs Controller
 *
 * @property \App\Model\Table\ProgramsTable $Programs
 *
 * @method \App\Model\Entity\Program[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramsController extends AppController
{
    
    
     public function initialize()
    {

        parent::initialize();
        $this->loadComponent('Flash'); 
    }
    
     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
       // $this->Users->userAuth = $this->UserAuth;
        $this->Auth->allow(['index','add','view','delete','edit','status','getSubcategory']);
        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
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
            $search['Programs.name REGEXP'] = $name;
        }
        if (isset($this->request->query['status']) && trim($this->request->query['status']) != "") {
            $status = $this->request->query['status'];
            $search['Programs.status'] = $status;
        }
        if (isset($this->request->query['body_id']) && trim($this->request->query['body_id']) != "") {
            $bodie = $this->request->query['body_id'];
            $search['Programs.category_id'] = $bodie;
        }
        if (isset($this->request->query['norec']) && trim($this->request->query['norec']) != "") {
            $norec = $this->request->query['norec'];
        }
        if (isset($search)) {
            $count = $this->Programs->find('all')
                    ->where([$search]);
        } else {
            $count = $this->Programs->find('all');
        }
        $count = $count->where(['Programs.status !=' => '2']);

        
        $this->paginate = [
            'limit' => $norec, 
            'order' => ['Programs.id' => 'DESC'],
            'contain' => ['Users', 'Categories', 'SubCategories']
        ];
         $programs = $this->paginate($count);
         //pr($programs); die;
         $categories = $this->Programs->Categories->find('list', ['limit' => 200])->where(['Categories.status' => '1']);

        $this->set(compact('programs','name','status','norec','categories','bodie'));
        $this->set('_serialize', ['programs']);
        
    }

    /**
     * View method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $program = $this->Programs->get($id, [
            'contain' => ['Users', 'Categories', 'SubCategories']
        ]);

        $this->set('program', $program);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        $program = $this->Programs->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['slug'] = $this->slugify($data['name']);
            $data['user_id'] = $this->usersdetail['users_id'];
            //pr($data); die;
            $program = $this->Programs->patchEntity($program, $data);
            if ($this->Programs->save($program)) {
                $this->Flash->success(__('The program has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program could not be saved. Please, try again.'));
        }
        $users = $this->Programs->Users->find('list', ['limit' => 200])->where(['status'=>1]);
        $categories = $this->Programs->Categories->find('list', ['limit' => 200])->where(['status'=>1]);
        $subCategories = $this->Programs->SubCategories->find('list', ['limit' => 200]);
        $this->set(compact('program', 'users', 'categories', 'subCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $program = $this->Programs->get($id, [
            'contain' => []
        ]);
       // pr($program->category_id); die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['slug'] = $this->slugify($data['name']);
            $data['user_id'] = $this->usersdetail['users_id'];
            //pr($data); die;
            $program = $this->Programs->patchEntity($program, $data);
            if ($this->Programs->save($program)) {
                $this->Flash->success(__('The program has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program could not be saved. Please, try again.'));
        }
        $users = $this->Programs->Users->find('list', ['limit' => 200])->where(['status'=>1]);
        $categories = $this->Programs->Categories->find('list', ['limit' => 200])->where(['status'=>1]);
        $subCategories = $this->Programs->SubCategories->find('list', ['limit' => 200])->where(['category_id'=>$program->category_id,'status'=>1]);
        $this->set(compact('program', 'users', 'categories', 'subCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function delete($id = null)
    { 
         if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
         $category = $this->Programs->get($id);
        
           if ($category->id !='') {
            
            $query = $this->Programs->query();
                     $result = $query->update()
                    ->set(['status' =>'2'])
                    ->where(['id' =>$category->id])
                    ->execute();
            
            $this->Flash->success(__('The Programs has been deleted.'));
        } else {
            $this->Flash->error(__('The Programs could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     public function status() {
                       if (empty($this->usersdetail['users_name']) || empty($this->usersdetail['users_email'])) {
            return $this->redirect('/');
        }
        $id = $this->request->params['pass'][0];
        $status = $this->request->params['pass'][1];
        $user = $this->Programs->get($id);
        if ($status == 1) {
            $user_data['status'] = 0;
            $user_data['id'] = $id;
            $user = $this->Programs->patchEntity($user, $user_data);
            if ($this->Programs->save($user)) {
                $st = $user_data['status'] ? '<span class="label label-success">' . __('Active') . '</span>' : '<span class="label label-danger">' . __('Inactive') . '</span>';
                // echo "<a href= '#' onclick = 'updateStatus(" . $id . "," . $user_data['status'] . ")'> " . $st . " </a>";
                echo '<button id=' . $id . ' class="btn btn-primary waves-effect status" value=' . $user_data['status'] . ' onclick="updateStatus(this.id,' . $user_data['status'] . ')" type="submit">Inactive</button>';
                exit;
            }
        } else {
            $user_data['status'] = 1;
            $user_data['id'] = $id;
            $user = $this->Programs->patchEntity($user, $user_data);
            if ($this->Programs->save($user)) {
                $st = $user_data['status'] ? '<span class="label label-success">' . __('Active') . '</span>' : '<span class="label label-danger">' . __('Inactive') . '</span>';
                echo '<button id=' . $id . ' class="btn btn-success waves-effect status" value=' . $user_data['status'] . ' onclick="updateStatus(this.id,' . $user_data['status'] . ')" type="submit">Active</button>';
                exit;
            }
        }
    }
    
    
     public function getSubcategory() {
         $this->viewBuilder()->layout("ajax");
        
        $subcategories=[];
         $subcategory   = TableRegistry::get('SubCategories');
         $data = $this->request->Data();
         $category_id = $data['category_id']; 
         
         //pr($country_id); die;
        $subcategories = $subcategory->find('list')->where(['category_id' => $category_id,'status'=>1]);
        
        //pr($cities); die;
        $this->set(compact('subcategories'));
       // $this->set('_serialize', ['cities']); 
       
    } 
    
    
   public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->theme('Admintheme');
        
    }  
    
}
