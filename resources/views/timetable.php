<section id="timetable">
    <h2>시간표</h2>
    <div class="container">
        <?php
        // UTH-8로 인코딩 된경우 trim() 을 실행해주어야만 한다.
        $json = trim(file_get_contents('files/timetable.json'), "\xEF\xBB\xBF");
        $grades = json_decode($json, TRUE);

        foreach ($grades as $i => $grade) {
            foreach ($grade as $j => $class) {
                echo "<div class='row'>";
                echo "<h1>$i 학년 " . ($j + 1) . " 반";
                foreach ($class as $key => $yoil) {

                    if ($key != "teacher") {
                        echo "<div>";
                        echo "<br><p>{$key}요일</p>";
                        foreach ($yoil as $k => $e) {
                            echo ($k + 1) . "교시: ";
                            if ($e['class'] == "") {
                                $e['class'] = "없음";
                            }
                            echo $e['class'] . "<br>";
                        }
                        echo "</div>";
                    } else {
                        echo " (담임: $yoil)</h1>";
                    }
                }
                echo "</div>";
            }
        }
        ?>
    </div>
</section>
