<section id="timetable">
    <h2>시간표</h2>
    <div class="container">
        <div class="row">
            <?php
            // UTH-8로 인코딩 된경우 trim() 을 실행해주어야만 한다.
            $json = trim(file_get_contents('files/timetable.json'), "\xEF\xBB\xBF");
            $grades = json_decode($json, TRUE);

            foreach ($grades as $i => $grade) {
                foreach ($grade as $j => $class) {
                    echo "<div class='row item'>";
                    echo "<h1 class='item-title'>$i 학년 " . ($j + 1) . " 반</h1>";
                    foreach ($class as $key => $yoil) {
                        if ($key != "teacher") {
                            echo "<div class='col'>";
                            echo "<p>{$key}요일</p>";
                            foreach ($yoil as $k => $e) {
                                echo $e['class'] == "" ? "<p class='class'>없음</p>" : "<p class='class'>" . ($k + 1) . ". $e[class]</p>";
                            }
                            echo "</div>";
                        }
                    }
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</section>
