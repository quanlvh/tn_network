<div class="top_title">
    <span class="title">依頼会社情報</span>
</div>     
<div class="detail_area">
    <table style="width: 100%">
        <colgroup>
            <col width='30%'>
            <col width='70%'>
        </colgroup>
        <tr>
            <td>会社名</td>
            <td><?=$requestCompany['company_name']?>&nbsp;<?=$requestCompany['branch_name']?></td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td><?=$requestCompany['branch_tel']?></td>
        </tr>
        <tr>
            <td>担当者</td>
            <td><?=$request['request_company_staff_name']?></td>
        </tr>
    </table>
</div>

<div class="top_title">
    <span class="title">受託会社情報</span>
</div>     
<div class="detail_area">
    <table style="width: 100%">
        <colgroup>
            <col width='30%'>
            <col width='70%'>
        </colgroup>
        <tr>
            <td>会社名</td>
            <td><?=$contractorCompany['company_name']?>&nbsp;<?=$contractorCompany['branch_name']?></td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td><?=$contractorCompany['branch_tel']?></td>
        </tr>
        <tr>
            <td>担当者</td>
            <td><?=$request['contractor_branch_staff_name']?></td>
        </tr>
    </table>
</div>
