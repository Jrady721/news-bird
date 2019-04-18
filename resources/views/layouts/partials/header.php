<header id="header">
    <div class="top">
        <div class="container">
            <div class="row">
                <ul class="row">
                    <li><b>주소</b>: 대구광역시 달성군 구지면 창리로 11길 93</li>
                    <li><b>교무실</b>: 053)231-9226</li>
                </ul>
                <ul class="row">
                    <?php if (isset($_SESSION['id'])): ?>
                        <li><a href="/logout">로그아웃</a></li>
                    <?php else: ?>
                        <li><a href="/login">로그인</a></li>
                        <li><a href="/register">회원가입</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <a href="/" class="logo col">
                    <img src="<?= asset('images/logo.png'); ?>" alt="logo">
                </a>
                <nav class="nav col">
                    <ul class="row main-menu">
                        <li class="col"><a href="#">일정</a></li>
                        <li class="col"><a href="#">시간표</a></li>
                        <li class="col"><a href="#">급식표</a></li>
                        <li class="col"><a href="#">동아리</a></li>
                        <li class="col"><a href="#">설문조사</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>