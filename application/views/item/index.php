<form action="<?php echo APP_URL ?>/item/add" method="post">
    <input type="text" value="������" onclick="this.value=''" name="value">
    <input type="submit" value="���">
</form>
<br/><br/>

<?php $number = 0?>

<?php foreach ($items as $item): ?>
    <a class="big" href="<?php echo APP_URL ?>/item/view/<?php echo $item['id'] ?>" title="����޸�">
        <span class="item">
            <?php echo ++$number ?>
            <?php echo $item['item_name'] ?>
        </span>
    </a>
    ----
    <a class="big" href="<?php echo APP_URL ?>/item/delete/<?php echo $item['id']?>">ɾ��</a>
    <br/>
<?php endforeach ?>