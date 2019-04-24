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
        let name = $(e).data('name');
        if (name === $('main section').attr('id')) {
            document.title = 'NewsBird@' + name;

            if (name === 'calendar') {
                let date = new Date();

                console.log(date.getMonth() - 1);

                let month = date.getMonth() + 1;

                // 1월달이면 13으로 이동
                if (month === 1) {
                    month = 13;
                }

                console.log(month);

                $('.month').text(month + '월');

                $(`.item-title:not(:nth-of-type(${month - 2}))`).hide();
                $(`.item:not(:nth-of-type(${month - 1}))`).hide();
            }

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

    // 이전 달 버튼 클릭
    $(document).on('click', '#calendar .row button:first-child', function () {
        // console.log('이전 달 클릭');
        $('.container > *:not(:first-child)').hide();

        let h3 = null;
        let div = null;

        let month = $(this).next().find('span').text();
        month = parseInt(month) - 3;

        console.log(month);

        if (month === 0) {
            console.log('3월일때 다음달..');
            h3 = $('.item-title:nth-of-type(11)');
            div = $('.item:nth-of-type(12)');
        } else if (month === -2) {
            h3 = $('.item-title:nth-of-type(10)');
            div = $('.item:nth-of-type(11)');
        } else {
            let selector = `.item-title:nth-of-type(${month})`;
            console.log(selector);
            h3 = $(selector);

            selector = `.item:nth-of-type(${month + 1})`;
            console.log(selector);

            div = $(selector)
        }

        $('.container > .row:first-child span').text(h3.text());

        console.log(h3);

        div.show();
        h3.show();
    });

    // 다음 달 버튼 클릭
    $(document).on('click', '#calendar .row button:last-child', function () {
        $('.container > *:not(:first-child)').hide();

        let h3 = null;
        let div = null;

        let month = $(this).prev().find('span').text();
        // console.log(month);

        month = parseInt(month);
        console.log(month);

        // 1월달 일 때
        if (month === 1) {
            h3 = $('.item-title:nth-of-type(1)');
            div = $('.item:nth-of-type(2)');
        } else {
            let selector = `.item-title:nth-of-type(${month - 1})`;
            console.log(selector);

            h3 = $(selector);


            selector = `.item:nth-of-type(${month})`;
            console.log(selector);

            div = $(selector)
        }

        $('.container > .row:first-child span').text(h3.text());

        div.show();
        h3.show();
    });
}