<?php
if (isset($_POST['send'])) {
    if (isset($_POST['month'])) {
        $month = $_POST['month'];
    } else $month = date('m', time());

    $months = array(
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
    );

    $key = $month;
    if (gettype($key) != 'boolean') {
        $key = $month;
    } else {
        $key = new DateTime('now', new DateTimeZone('Europe/Moscow'));
        $key = $key->format('n');
    }
    $dayofmonth = cal_days_in_month(CAL_GREGORIAN, $key, 2021);
    $num = 0;
    $day_count = 1;

    for ($i = 0; $i < 7; $i++) {
        $dayofweek = date('w', mktime(0, 0, 0, date($key), $day_count, date('Y')));
        $dayofweek = $dayofweek - 1;
        if ($dayofweek == -1) $dayofweek = 6;
        if ($dayofweek == $i) {
            $week[$num][$i] = $day_count;
            $day_count++;
        } else {
            $week[$num][$i] = "";
        }
    }
    while (true) {
        $num++;
        for ($i = 0; $i < 7; $i++) {
            $week[$num][$i] = $day_count;
            $day_count++;
            if ($day_count > $dayofmonth) break;
        }
        if ($day_count > $dayofmonth) break;
    }

    $now = date('d', time());

    echo "<div class='calendar-item'><table border=1 style='text-align: center;>";
    echo "<div'>" . $months[$key] . "</div>";
    echo "<tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td><tr>";
    for ($i = 0; $i < count($week); $i++) {
        for ($j = 0; $j < 7; $j++) {
            if (!empty($week[$i][$j])) {
                if (($week[$i][$j] == $now))
                    echo "<td style='color: blue'>" . $now . "</td>";
                else echo "<td>" . $week[$i][$j] . "</td>";
            } else echo "<td>&nbsp;</td>";
        }
        echo "</tr>";
    }
    echo "</table></div>";
    echo "<link rel='stylesheet' href='style.css'>";
} else {
    include "index.html";
}