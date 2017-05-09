<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * MstUserPolicy Controller
 *
 * @property \App\Model\Table\MstUserPolicyTable $MstUserPolicy
 */
class MstUserPolicyController extends AppController
{
    public function index()
    {
        $policy = TableRegistry::get('mst_user_policy')->getList();
        $this->set('policy', $policy);
    }

    public function edit()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            //新規登録
            $policy = null;
            if(empty($data['id'])) {
                $policy = TableRegistry::get('mst_user_policy')->newEntity($data);
                $policy->rank = TableRegistry::get('mst_user_policy')->generateNextRank();
            }
            //編集
            else {
                $policy = TableRegistry::get('mst_user_policy')->get($data['id']);
                $policy = TableRegistry::get('mst_user_policy')->patchEntity($policy, $data);
            }
            TableRegistry::get('mst_user_policy')->save($policy);
        }

        return $this->redirect($this->referer());
    }

    public function delete($id = null)
    {
        $this->autoRender = false;

        if (!empty($id)) {
            $agr = TableRegistry::get('mst_user_policy')->get($id);
            $agr->is_deleted = 1;
            TableRegistry::get('mst_user_policy')->save($agr);
        }

        return $this->redirect($this->referer());
    }

    public function rankUp($id = null)
    {
        $this->autoRender = false;

        if (!empty($id)) {
            $current = TableRegistry::get('mst_user_policy')->get($id)->toArray();
            $before = TableRegistry::get('mst_user_policy')->getBeforeRank($id);
            $beforeRank = $before['rank'];
            $before['rank'] = $current['rank'];
            $current['rank'] = $beforeRank;

            TableRegistry::geT('mst_user_policy')->save(TableRegistry::geT('mst_user_policy')->newEntity($before));
            TableRegistry::geT('mst_user_policy')->save(TableRegistry::geT('mst_user_policy')->newEntity($current));
        }

        return $this->redirect($this->referer());
    }

    public function rankDown($id = null)
    {
        $this->autoRender = false;

        if (!empty($id)) {
            $current = TableRegistry::get('mst_user_policy')->get($id)->toArray();
            $next = TableRegistry::get('mst_user_policy')->getNextRank($id);
            $nextRank = $next['rank'];
            $next['rank'] = $current['rank'];
            $current['rank'] = $nextRank;

            TableRegistry::geT('mst_user_policy')->save(TableRegistry::geT('mst_user_policy')->newEntity($next));
            TableRegistry::geT('mst_user_policy')->save(TableRegistry::geT('mst_user_policy')->newEntity($current));
        }

        return $this->redirect($this->referer());
    }

    public function getPolicy()
    {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $agr = TableRegistry::get('mst_user_policy')->get($data['id'])->toArray();
            echo json_encode($agr);
        }
    }
}
