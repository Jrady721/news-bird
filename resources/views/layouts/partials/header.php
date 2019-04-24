<header id="header">
    <div class="top">
        <div class="container">
            <div class="row">
                <ul class="row">
                    <li><i class="fas fa-map-marker-alt"></i> <b>주소</b>: 대구광역시 달성군 구지면 창리로 11길 93</li>
                    <li><i class="fas fa-phone"></i> <b>교무실</b>: 053)231-9226</li>
                </ul>
                <ul class="row">
                    <?php if (loginChk()): ?>
                        <li><a href="/logout">로그아웃</a></li>
                    <?php else: ?>
                        <li><a href="/login" data-name="login" class="link">로그인</a></li>
                        <li><a href="/register" data-name="register" class="link">회원가입</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <a href="/" class="logo col">
                    <img src="<?= asset('images/logo2.png'); ?>" alt="logo">
                </a>
                <nav class="nav col">
                    <ul class="row main-menu">
                        <!--                        <li class="col" data-name="home"><a href="/">홈</a></li>-->
                        <li class="col"><a href="/calendar" data-name="calendar" class="link">일정</a></li>
                        <li class="col"><a href="/timetable" data-name="timetable" class="link">시간표</a></li>
                        <li class="col"><a href="/menu" data-name="menu" class="link">식단표</a></li>
                        <li class="col"><a href="/circles" data-name="circles" class="link">동아리</a></li>
                        <li class="col"><a href="/poll" data-name="poll" class="link">설문조사</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- breadcrumb -->
<?php if ($_SERVER['REQUEST_URI'] !== '/'): ?>
    <!--    <nav aria-label="breadcrumb">-->
    <!--        <ol class="breadcrumb">-->
    <!--            <li class="breadcrumb-item"><a href="#">Home</a></li>-->
    <!--            <li class="breadcrumb-item active" aria-current="page">Library</li>-->
    <!--        </ol>-->
    <!--    </nav>-->
<?php endif; ?>