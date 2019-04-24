<section id="calendar">
    <h2>학사일정</h2>
    <div class="container">
        <div class="row" style="align-items: flex-start;">
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
                                if($month != "") {
                                    echo "</div>";
                                }
                                echo "<div>";
                                $month = $data[$c];
                            }

                            // 날짜(DATE) 일경우
                            if ($c == 1 || $c == 4 || $c == 7 || $c == 10 || $c == 13) {
                                $date = $data[$c];
                                echo "$month {$date}일 <br>";
                            }

                            // 활동 내역일 경우
                            if ($c == 3 || $c == 6 || $c == 9 || $c == 12 || $c == 15) {
                                $activity = $data[$c] == "" ? "활동이 없습니다." : $data[$c];
                                echo "활동내역: $activity <br><br>";
                            }

                            if ($c == 17) {
                                if(preg_match('/○/',$data[$c])) {
                                    echo "<p style='color: red;'>기숙사 휴무</p><br>";
                                } else {
                                    echo "<p style='color: blue;'>기숙사 개방: $data[$c]</p><br>";
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
    </div>
</section>
