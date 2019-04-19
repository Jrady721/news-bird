<section id="register">
    <h2>REGISTER</h2>
    <div class="container">
        <div class="form">
            <form method="post" action="/register">
                <div class="row">
                    <input type="text" id="username" name="username" placeholder="please enter username">
                    <label for="username">USERNAME</label>
                </div>
                <div class="row">
                    <input type="text" id="nickname" name="nickname" placeholder="please enter nickname">
                    <label for="nickname">NICKNAME</label>
                </div>
                <div class="row">
                    <input type="password" id="password" name="password" placeholder="please enter password">
                    <label for="password">PASSWORD</label>
                </div>
                <div class="row">
                    <input type="password" id="confirm-password" name="confirmPassword" placeholder="please enter confirm password">
                    <label for="confirm-password">CONFIRM PASSWORD</label>
                </div>

                <div class="row">
                    <button class="btn btn-primary" type="submit">회원가입</button>
                </div>
            </form>
        </div>
    </div>
</section>