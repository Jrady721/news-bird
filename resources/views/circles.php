<section id="circles">
    <h2>동아리정보</h2>
    <div class="container">
        <div class="row" style="align-items: flex-start;">
            <?php
            $row = 1;

            $chk = false;
            $flag = false;


            if (($handle = fopen("files/circles.csv", "r")) !== FALSE) {

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                    $num = count($data);

                    // 만약 동아리명이 나온다면 학년 반 번호는 스킵한다.
                    if ($flag) {
                        $flag = false;
                        continue;
                    }

                    for ($c = 0; $c < $num; $c++) {
                        $char = substr(trim($data[$c]), 0, 1);

                        if ($char == ";") {
                            $chk = !$chk;

                            if ($chk == true) {
                                $flag = true;
                            } else {
                                echo "</div>";
                            }

                            // 끝내기
                            break;
                        }

                        // 동아리 명 불러오기
                        if ($char == "[") {
                            echo "<div>";
                            echo "<br><br><p>$data[$c]</p><br>";
                        }

                        // 동아리 회원 읽기 ~~~
                        if ($chk) {
                            if ($c) {

                                echo $data[$c] . " ";
                                if ($c == $num - 1) {
                                    echo "<br>";
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
