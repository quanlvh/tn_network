<?php $this->assign('title','ユーザマスタ検索・一覧')?>
<?= $this->Html->css('UserMaster/find/styles.css') ?>
<?= $this->Html->css('data/styles.css') ?>

    <div id="base" class="">

      <!-- Unnamed (Table) -->
      <div id="u6033" class="ax_default">
<?= $this->Form->create() ?>
      <!-- User ID (Rectangle) -->
      <div id="u6139" class="ax_default label">
        <div id="u6139_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6140" class="text">
          <p><span>ユーザーID</span></p>
        </div>
      </div>

      <!-- User ID (Text Field) -->
      <div id="u6138" class="ax_default text_field">
      <?= $this->Form->input('user_id',['type'=>'text','label'=>false,'id'=>'u6138_input']) ?>
      </div>

      <!-- Mail Address (Rectangle) -->
      <div id="u6142" class="ax_default label">
        <div id="u6142_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6143" class="text">
          <p><span>メールアドレス1</span></p>
        </div>
      </div>

      <!-- Mail Address (Text Field) -->
      <div id="u6141" class="ax_default text_field">
      <?= $this->Form->input('mail_addr_1',['type'=>'text','label'=>false,'id'=>'u6141_input']) ?>
      </div>

      <!-- User Name (Rectangle) -->
      <div id="u6145" class="ax_default label">
        <div id="u6145_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6146" class="text">
          <p><span>ユーザー名</span></p>
        </div>
      </div>

      <!-- User Name (Text Field) -->
      <div id="u6144" class="ax_default text_field">
      <?= $this->Form->input('user_name',['type'=>'text','label'=>false,'id'=>'u6144_input']) ?>
      </div>

      <!-- Mail Address (Rectangle) -->
      <div id="u6142a" class="ax_default label">
        <div id="u6142a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6143a" class="text">
          <p><span>メールアドレス2</span></p>
        </div>
      </div>

      <!-- Mail Address (Text Field) -->
      <div id="u6141a" class="ax_default text_field">
      <?= $this->Form->input('mail_addr_2',['type'=>'text','label'=>false,'id'=>'u6141_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6147" class="ax_default label">
        <div id="u6147_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6148" class="text">
          <p><span>メイン担当</span></p>
        </div>
      </div>

      <!-- Unnamed (Checkbox) -->
      <div id="u6149" class="ax_default checkbox">
        <label for="u6149_input">
          <!-- Unnamed () -->
          <div id="u6150" class="text">
            <p><span>メイン担当のみ</span></p>
          </div>
        </label>
        <?php if ( !empty($post['handle'])) :?>
        <input id="u6149_input" type="checkbox" name="handle" value="1" checked />
        <?php else:?>
        <input id="u6149_input" type="checkbox" name="handle" value="1" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6155" class="ax_default label">
        <div id="u6155_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6156" class="text">
          <p><span>所属会社名</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u6157" class="ax_default text_field">
      <?= $this->Form->input('company_name',['type'=>'text','label'=>false,'id'=>'u6157_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6158" class="ax_default label">
        <div id="u6158_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6159" class="text">
          <p><span>所属事業所名</span></p>
        </div>
      </div>

      <!-- 所属事業者名 (Text Field) -->
      <div id="u6160" class="ax_default text_field">
      <?= $this->Form->input('branch_name',['type'=>'text','label'=>false,'id'=>'u6160_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6168" class="ax_default label">
        <div id="u6168_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6169" class="text">
          <p><span>アカウント新規作成</span></p>
        </div>
      </div>

      <div id="u6170" class="ax_default text_field">
      <?= $this->Form->checkbox('applying',['value'=>'1','text'=>false]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6161" class="ax_default label">
        <div id="u6161_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6162" class="text">
          <p><span>削除アカウント</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6161_ann" class="annotation"></div>

      <!-- Unnamed (Checkbox) -->
      <div id="u6163" class="ax_default checkbox">
        <label for="u6163_input">
          <!-- Unnamed () -->
          <div id="u6164" class="text">
            <p><span>削除済みアカウントを含める</span></p>
          </div>
        </label>
        <?php if( !empty($post['is_deleted'])):?>
        <input id="u6163_input" type="checkbox" name="is_deleted" value="1" checked />
        <?php else:?>
        <input id="u6163_input" type="checkbox" name="is_deleted" value="1" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6136" class="ax_default button">
        <button type="submit" id="u6136_div">検索</button>
      </div>

<?= $this->Form->end() ?>

      <div id="u6167" class="">
        <button type="button" onclick="window.location.href='/mstMenteMenu';">戻る</button>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6106" class="ax_default heading_2">
        <div id="u6106_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6107" class="text">
          <p><span>ユーザー情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6108" class="ax_default line">
        <img id="u6108_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6109" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>
      <!-- Unnamed (Horizontal Line) -->
      <div id="u6130" class="ax_default line">
        <img id="u6130_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6131" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6132" class="ax_default label">
        <div id="u6132_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6133" class="text">
          <p><span>検索項目</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6134" class="ax_default line">
        <img id="u6134_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6135" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6165" class="ax_default button" onClick="window.location.href='/Users/add';">
        <div id="u6165_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6166" class="text">
          <p><span>新規登録</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6110" class="ax_default line">
        <img id="u6110_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6111" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>
      <!-- Unnamed (Rectangle) -->
      <div id="u6128" class="ax_default label">
        <div id="u6128_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6129" class="text">
          <p><span>検索結果一覧</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6114" class="ax_default label">
        <div id="u6114_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6115" class="text">
          <p><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">検索結果が</span><span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:700;">&nbsp;<?= $count ?>&nbsp;</span><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">件あります。</span></p>
        </div>
      </div>

<?php if(!empty($users)):?>
       <div id="result_list_area" class="">
       <?php if (count($users)!=0):?>
       <table class="list">
       <col span="8" width="20%">
       <thead>
       		<tr>
       			<th>ユーザーID</th>
       			<th>ユーザー名</th>
       			<th>所属会社名</th>
       			<th>所属事業所名</th>
       			<th>メールアドレス1</th>
       			<th>メールアドレス2</th>
       			<th>メイン担当</th>
       			<th></th>
       		</tr>
       	</thead>
       		<tbody>
       		<?php foreach ($users as $user):?>
       		<tr>
       			<td><?= h($user['user_id']) ?></td>
       			<td><?= h($user['user_name']) ?></td>
       			<td><?= h($name[$user['company_code']]) ?></td>
       			<td><?= h($branchName[$user['branch_code']]) ?></td>
       			<td><?= h($user['mail_addr_1']) ?></td>
       			<td><?= h($user['mail_addr_2']) ?></td>
       			<?php if($user['handle']==='1'):?>
       			<td><?= h($handle[1]) ?></td>
       			<?php else:?>
       			<td>-</td>
       			<?php endif;?>
       			<td>
       				<form method="post" action="/Users/view/<?= h($user['id']) ?>">
       			  		<button class="detail_button" type="submit">詳細</button>
       			  	</form>
       			</td>
       		</tr>
       		<?php endforeach;?>
       		</tbody>
       </table>
       <?php endif;?>
       </div>
<?php endif;?>



      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6165_ann" class="annotation"></div>
    </div>