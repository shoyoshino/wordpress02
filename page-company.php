<?php echo 'page-company.php'; ?>
<?php
/*
Template Name: 会社案内
*/
?>

<?php get_header(); ?>

<div class="main__inner">
    <table>
        <tbody>
            <tr>
                <th>会社名</th>
                <td><?php echo cfs()->get('name') ?></td>
            </tr>
            <tr>
                <th>所在地</th>
                <td><?php echo cfs()->get('address') ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?php echo cfs()->get('tel') ?></td>
            </tr>
            <tr>
                <th>取引先</th>
                <td><?php echo cfs()->get('client') ?></td>
            </tr>
            <tr>
                <th>グループ会社</th>
                <td><?php echo cfs()->get('group') ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php get_footer(); ?>