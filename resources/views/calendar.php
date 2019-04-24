<section id="calendar">
    <h2>학사일정</h2>


    <div class="container" style="max-width: 1200px">
        <div class="row">
            <button class="btn btn-primary"><</button>
            <div>2019년 <span class="month">3월</span></div>
            <button class="btn btn-primary">></button>
        </div>
        <?php
        $row = 1;

        $month = "";
        $date = "";

        if (($handle = fopen("files/calendar.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $num = count($data);
                // 1학기 일정 && 2학기 일정
                if (($row > 4 && $row < 25) || ($row > 30 && $row < 52)) {

//                        echo "<p> $num fields in line $row: <br /></p>\n";
                    for ($c = 0; $c < $num; $c++) {
                        // 달(MONTH) 일 경우
                        if ($c == 0 && $data[$c] != "") {
                            if ($month != "") {
                                echo "</div>";
                            }
                            $month = $data[$c];
                            echo "<h3 class='item-title'>$month</h3>";
                            echo "<div class='item row'>";

                            $arr = array('월', '화', '수', '목', '금', '토', '일');
                            for ($ii = 0; $ii < 7; $ii++) {
                                echo "<div class='yoil'>$arr[$ii]</div>";
                            }
                        }

                        // 날짜(DATE) 일경우
                        if ($c == 1 || $c == 4 || $c == 7 || $c == 10 || $c == 13) {
                            $date = $data[$c];
                            echo "<div class='calendar-item'><p>{$date}일";
                        }

                        // 활동 내역일 경우
                        if ($c == 3 || $c == 6 || $c == 9 || $c == 12 || $c == 15) {
                            $activity = $data[$c] == "" ? "<span class='color-ddd'>일정이 없습니다.</span>" : $data[$c];
                            echo "<br><br>$activity</p></div>";
                        }

                        if ($c == 17 || $c == 18) {
                            if (preg_match('/○/', $data[$c])) {
                                echo "<div class='calendar-item'><p class='color-red'>기숙사 휴무</p></div>";
                            } else {
                                echo "<div class='calendar-item'><p class='color-blue'>$data[$c]</p></div>";
                            }
                        }
                    }
                }
                $row++;
            }
            fclose($handle);
        }
        ?>
    </div>
</section>
