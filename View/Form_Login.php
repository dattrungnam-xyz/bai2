<div style="display:flex; ">
    <?php include_once('Sidebar.php'); ?>
    <div class="container">

        <form style="padding:20px; width: 400px;" onsubmit="return handleSubmit()" name="f1" action="C_Admin.php" method="POST">
            <div style="margin: 8px 0px;">
                <label style="display:block; padding-bottom: 4px" for="username">Tên đăng nhập:</label>
                <input style="display:block; padding: 4px;" onchange="handleChange()" id="username" name="username">
            </div>
            <div style="margin: 8px 0px;">
                <label style="display:block; padding-bottom: 4px" for="password"> Mật khẩu:</label>
                <input style="display:block; padding: 4px;" onchange="handleChange()" id="password" name="password" type="password">
            </div>
            <div style="margin: 8px 0px;">
                <p class="p_text"></p>
            </div>
            <div style="margin: 8px 0px;">
                <button style="padding: 4px 8px;" type="submit">OK</button>
                <button style="padding: 4px 8px;" type="Reset">Reset</button>
            </div>
        </form>
    </div>
    <script>
        let a = document.querySelector(".p_text");

        function handleSubmit() {
            let username = document.f1.username.value;
            let password = document.f1.password.value;
            if (password === "" || username === "") {
                a.innerHTML = "không được để trống thông tin";
                return false
            } else {
                return true
                //document.f1.submit();
            }
        }

        function handleChange() {
            a.innerHTML = "";
        }
    </script>
</div>