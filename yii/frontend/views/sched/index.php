<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
                    <?php $i=1; ?>
                    <?php foreach ($doctors as $value) {?>
                        <?php if($i % 2 == 1) { ?>
                            <tr>
                                <td class="doc"><div class="docname"> <?= $value->person->surname .' '. $value->person->name .' '. $value->person->patronymic ?></div>
                                    <div class="docspec"><?= $value->profession->profession_name ?></div></td>
                                <?php $areas = Schedule::find()->joinWith('area')->where(['id_doc' => $value->id])->all(); ?>
                                <?php foreach ($areas as $area) :?>
                                    <td><div class="docspec"><?= $area->area->number ?></div></td>
                                    <?php break; ?>
                                <?php  endforeach; ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datapn])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datapn])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datavt])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datavt])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datasr])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datasr])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datact])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datact])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datapt])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datapt])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datacb])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datacb])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
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
                                <?php $areas = Schedule::find()->joinWith('area')->where(['id_doc' => $value->id])->all(); ?>
                                <?php foreach ($areas as $area) :?>
                                    <td><div class="docspec"><?= $area->area->number ?></div></td>
                                    <?php break; ?>
                                <?php  endforeach; ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datapn])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datapn])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datavt])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datavt])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datasr])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datasr])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datact])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datact])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datapt])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datapt])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
                                    <?php  endforeach; ?>
                                <?php }else{echo '<div class="notwork">Нет приема</div></td>';} ?>

                                <?php $schedulecon = Schedule::find()->where(['id_doc' => $value->id, 'data' => $datacb])->count(); ?>
                                <?php $schedule = Schedule::find()->joinWith('cabinet')->where(['id_doc' => $value->id, 'data' => $datacb])->all();?>
                                <?php echo '<td>' ?>
                                <?php if($schedulecon>0){?>
                                    <?php foreach ($schedule as $val) :?>
                                        <?php echo '<div class="notwork">' . date('G:i',strtotime($val['time_start'])) .'-'. date('G:i',strtotime($val['time_end'])) .'<br>'. $val->cabinet->num .'</div>'; ?>
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