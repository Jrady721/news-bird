$(function () {
    init();
});

// 초기 설정
function init() {
    activeMenuChk();
    eventOn();
}

// 액티브된 메뉴 화인
function activeMenuChk() {
    $('.link').filter(function (i, e) {
        if ($(e).data('name') === $('main section').attr('id')) {
            document.title = 'NewsBird@' + $(e).data('name');
            $(e).addClass('active')
        }
    });

}

// 부드럽게 스크롤
$(document).on('click', '.btn-footer', function () {
    $('html, body').animate({scrollTop: 0}, 400);
    return false;
});

// 이벤트 붙이기
function eventOn() {
// 스크롤 이벤트
    $(document).scroll(function () {
        console.log();
        if (window.scrollY < 40) {
            $('.top').css({
                'margin-bottom': '0'
            });
            $('.main').css({
                'position': 'initial'
            })
        } else {
            $('.top').css({
                'margin-bottom': '110px'
            });
            $('.main').css({
                'position': 'fixed',
                'top': '0',
                'width': '100vw',
            })
        }
    });
}