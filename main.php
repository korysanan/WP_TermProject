<div id="main_content">
<div id="latest">
    <h4>최근 게시글</h4>
    <ul>
    <!-- 최근 게시 글 DB에서 불러오기 -->
    <?php
        $con = mysqli_connect("localhost", "user", "12345", "TermProject");
        
        // 최근 게시글 불러오기
        $sql = "select * from board order by num desc limit 5";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $regist_day = substr($row["regist_day"], 0, 10);
    ?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
    <?php
            }
        }
    ?>
    </ul>
    
    <!-- 간격을 주기 위해 CSS 스타일 적용 -->
    <div style="margin-top: 20px;">
        <h4>최근 장터글</h4>
        <ul>
        <?php
            // 최근 장터글 불러오기
            $sql = "select * from market order by num desc limit 5";
            $result = mysqli_query($con, $sql);

            if (!$result) {
                echo "장터 DB 테이블(market)이 생성 전이거나 아직 게시글이 없습니다!";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    $regist_day = substr($row["regist_day"], 0, 10);
        ?>
                    <li>
                        <span><?=$row["subject"]?></span>
                        <span><?=$row["name"]?></span>
                        <span><?=$regist_day?></span>
                    </li>
        <?php
                }
            }
        ?>
        </ul>
    </div>
</div>

    

    <div id="point_rank">
        <h4>포인트 랭킹</h4>
        <ul>
        <!-- 포인트 랭킹 표시하기 -->
        <?php
            $rank = 1;
            $sql = "select * from members order by point desc limit 10";
            $result = mysqli_query($con, $sql);

            if (!$result)
                echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
            else
            {
                while( $row = mysqli_fetch_array($result) )
                {
                    $name  = $row["name"];        
                    $id    = $row["id"];
                    $point = $row["point"];
                    $name = $row["name"];
        ?>
                    <li>
                        <span><?=$rank?></span>
                        <span><?=$name?></span>
                        <span><?=$id?></span>
                        <span><?=$point?></span>
                    </li>
        <?php
                    $rank++;
                }
            }

            mysqli_close($con);
        ?>
        </ul>
    </div>
</div>
