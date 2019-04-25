<section id="circles">
    <h2>동아리정보</h2>
    <div class="container">
        <div class="row" style="align-items: flex-start; margin-bottom: 100px;">
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
                            echo "<div class='item'>";
                            echo "<p class='item-title'>$data[$c]</p>";
                        }

                        // 동아리 회원 읽기 ~~~
                        if ($chk && $c) {
                            if ($c != $num - 1) {
                                echo "<p class='members'>$data[$c]. ";
                            } else {
                                echo "$data[$c]</p>";
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
