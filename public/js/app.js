$(function () {
    init();
});

function init() {
    activeMenuChk();
    eventOn();
}

function activeMenuChk() {
    $('.link').filter(function (i, e) {
        if ($(e).data('name') === $('main section').attr('id')) {
            document.title = 'NewsBird@' + $(e).data('name');
            $(e).addClass('active')
        }
    })
}

// 부드럽게 스크롤
$(document).on('click', '.btn-footer', function () {
    $('html, body').animate({scrollTop: 0}, 400);
    return false;
});

// $(document).on('click', 'a', function () {
//     if ($(this).attr('href') !== '#') {
//     }
// });

function eventOn() {
// 스크롤 이벤트
    $(document).scroll(function () {
        console.log();
        if (window.scrollY < 40) {
            $('.main').css({
                'position': 'initial'
            })
        } else {
            $('.main').css({
                'position': 'fixed',
                'top': '0',
                'width': '100vw'
            })
        }
    });
}