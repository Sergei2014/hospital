<?php
use yii\db\Query;
if(isset($_GET['dat'])){
    $data = $_GET['dat'];
}else{
    $data = date('d-m-Y');
}
$test = strtotime("$data");
$week_number = date("W", $test);
$year = date('Y');
for($day=1; $day<=6; $day++)
{
    if($day == 1){
        $datapn = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
    if($day == 2){
        $datavt = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
    if($day == 3){
        $datasr = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
    if($day == 4){
        $datact = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
    if($day == 5){
        $datapt = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
    if($day == 6){
        $datacb = date('Y-m-d',  strtotime($year."W".$week_number.$day));
    }
}


?>
<!--<script>setTimeout(function(){window.location.href = 'http://policlinica.loc/sched/csz2'},30000)</script>-->
<!--script>
    document.write('<div style="color:#000">'+window.innerWidth+'</div>');
    document.write('<div style="color:#000">'+window.innerHeight+'</div>');
</script-->

<div class="head">
    <div class="otd-l">№1 отбасылық денсаулық орталығы <br>Центр семейного здоровья №1</div>
    <div class="otd-r">№1 отбасылық денсаулық орталығы <br>Центр семейного здоровья №1</div>
    <div class="title">РАСПИСАНИЕ РАБОТЫ ВРАЧЕЙ</div>
</div><div class="tblwrap">
    <table class="parent">
        <tbody>
        <tr>
            <td>
                <table class="child">
                    <tbody>
                    <tr>
                        <th>ФИО специалиста</th>
                        <th>Участок</th>
                        <th><div class="date">Пн</div></th><th><div class="date">Вт</div></th><th><div class="date">Ср</div></th><th><div class="date">Чт</div></th><th><div class="date">Пт</div></th><th><div class="date">Сб</div></th></th>
                    </tr>
                    <?php $i=1; $type = 1;?>
                    <?php foreach ($doctors as $value) {?>
                        <?php if($i % 2 == 1) { ?>
                            <tr>
                                <td class="doc"><div class="docname"> <?= $value['surname'] .' '. $value['name'] .' '. $value['patronymic'] ?></div>
                                    <div class="docspec"><?= $value['profession_name'] ?></div></td>
                                <td><div class="docspec"><?=$value['number']?></div></td>
                                <?php //Понедельник ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapn, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapn, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Вторник ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datavt, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datavt, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Среда ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datasr, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datasr, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Четверг ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datact, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datact, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Пятница ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapt, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapt, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //суббота ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datacb, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datacb, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                            </tr>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php } ?>
                    </tbody></table>
            </td>
            <td class="sep"></td>
            <td>
                <table class="child">
                    <tbody>
                    <tr>

                        <th>ФИО специалиста</th>
                        <th>Участок</th>
                        <th><div class="date">Пн</div></th><th><div class="date">Вт</div></th><th><div class="date">Ср</div></th><th><div class="date">Чт</div></th><th><div class="date">Пт</div></th><th><div class="date">Сб</div></th></th>
                    </tr>
                    <?php $i=1; $type = 1;?>
                    <?php foreach ($doctors as $value) {?>
                        <?php if($i % 2 == 0) { ?>
                            <tr>
                                <td class="doc"><div class="docname"> <?= $value['surname'] .' '. $value['name'] .' '. $value['patronymic'] ?></div>
                                    <div class="docspec"><?= $value['profession_name'] ?></div></td>
                                <td><div class="docspec"><?=$value['number']?></div></td>
                                <?php //Понедельник ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapn, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapn, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Вторник ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datavt, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datavt, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Среда ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datasr, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datasr, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Четверг ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datact, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datact, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //Пятница ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapt, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datapt, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php //суббота ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datacb, 'type' => 0])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_doc' => $value['id_doc'], 'id_area' => $value['id_area'], 'data' => $datacb, 'type' => 0])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                            </tr>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php } ?>
                    </tbody></table>
            </td>
        </tr>

        </tbody>
    </table>

</div>