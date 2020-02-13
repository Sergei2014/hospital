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

//echo '<pre>';
//print_r($doctors);
//echo '</pre>';
?>
<!--<script>setTimeout(function(){window.location.href = 'http://policlinica.loc/sched/csz1'},30000)</script>-->
<div class="head">
    <div class="otd-l">Мамандандырылған көмек бөлімшесі Отделение специализированной помощи</div>
    <div class="otd-r">Мамандандырылған көмек бөлімшесі Отделение специализированной помощи</div>
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
                    <?php $i=1; ?>
                    <?php foreach ($doctors as $value) {?>
                        <?php if($i % 2 == 1) { ?>
                            <tr>
                                <td class="doc"><div class="docname"> <?= $value->person->surname .' '. $value->person->name .' '. $value->person->patronymic ?></div>
                                    <div class="docspec"><?= $value->profession->profession_name ?></div></td>
                                <td><div class="docspec"></div></td>
                                <?php
                                //Понедельник
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll(); ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapn])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapn])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Вторник
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datavt])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datavt])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Среда
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datasr])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datasr])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Четверг
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datact])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datact])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Пятница
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapt])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapt])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Суббота
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datacb])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datacb])->all();
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
                    <?php $i=1; ?>
                    <?php foreach ($doctors as $value) {?>
                        <?php if($i % 2 == 0) { ?>
                            <tr>
                                <td class="doc"><div class="docname"> <?= $value->person->surname .' '. $value->person->name .' '. $value->person->patronymic ?></div>
                                    <div class="docspec"><?= $value->profession->profession_name ?></div></td>
                                <td><div class="docspec"></div></td>
                                <?php
                                //Понедельник
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll(); ?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapn])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapn])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Вторник
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datavt])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datavt])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Среда
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datasr])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datasr])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Четверг
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datact])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datact])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Пятница
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapt])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datapt])->all();
                                $command = $schedule->createCommand();
                                $schedule = $command->queryAll();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>Каб.№ '. $val['num'] .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>
                                <?php
                                //Суббота
                                $schedid = new Query;
                                $schedid->select(['id'])->from('sched')->andWhere(['id_doc' => $value['id']])->one();
                                $command = $schedid->createCommand();
                                $schedid = $command->queryAll();?>
                                <?php $schedulecon =  \common\models\Schedtime::find()->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datacb])->count(); ?>
                                <?php $schedule = new Query;
                                $schedule->select(['*'])->from('schedtime')->join('LEFT JOIN', 'cabinet','schedtime.id_cab = cabinet.id')->andWhere(['id_sched' => $schedid[0]['id'], 'data' => $datacb])->all();
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