<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('offer_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_kana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_addr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lodging_place_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lodging_place_addr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lodging_place_tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lodging_place_staff_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subscriber_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_acceptable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_past_setting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('past_setting_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('past_setting_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stay_from_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stay_to_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setting_preferred_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setting_preferred_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_before_setting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pickup_preferred_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pickup_preferred_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_after_collectable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_company_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_company_staff_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_approval') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hospital_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temporary_saving_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cancel_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('machine_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractor_company_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= h($request->id) ?></td>
                <td><?= h($request->request_no) ?></td>
                <td><?= h($request->offer_date) ?></td>
                <td><?= $this->Number->format($request->status) ?></td>
                <td><?= h($request->user_kana) ?></td>
                <td><?= h($request->user_name) ?></td>
                <td><?= h($request->user_addr) ?></td>
                <td><?= h($request->user_tel) ?></td>
                <td><?= h($request->user_mobile) ?></td>
                <td><?= h($request->lodging_place_name) ?></td>
                <td><?= h($request->lodging_place_addr) ?></td>
                <td><?= h($request->lodging_place_tel) ?></td>
                <td><?= h($request->lodging_place_staff_name) ?></td>
                <td><?= h($request->subscriber_name) ?></td>
                <td><?= h($request->is_acceptable) ?></td>
                <td><?= h($request->is_past_setting) ?></td>
                <td><?= h($request->past_setting_year) ?></td>
                <td><?= h($request->past_setting_month) ?></td>
                <td><?= h($request->stay_from_date) ?></td>
                <td><?= h($request->stay_to_date) ?></td>
                <td><?= h($request->setting_preferred_date) ?></td>
                <td><?= h($request->setting_preferred_time) ?></td>
                <td><?= h($request->is_before_setting) ?></td>
                <td><?= h($request->pickup_preferred_date) ?></td>
                <td><?= h($request->pickup_preferred_time) ?></td>
                <td><?= h($request->is_after_collectable) ?></td>
                <td><?= h($request->request_company_code) ?></td>
                <td><?= h($request->request_company_staff_name) ?></td>
                <td><?= h($request->is_approval) ?></td>
                <td><?= h($request->hospital_name) ?></td>
                <td><?= h($request->doctor_name) ?></td>
                <td><?= h($request->temporary_saving_flg) ?></td>
                <td><?= h($request->cancel_flg) ?></td>
                <td><?= h($request->machine_code) ?></td>
                <td><?= h($request->contractor_company_code) ?></td>
                <td><?= h($request->updated_at) ?></td>
                <td><?= h($request->updated_by) ?></td>
                <td><?= h($request->created_at) ?></td>
                <td><?= h($request->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
