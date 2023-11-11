<?php
echo '
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    .logo {
        display: flex;
        align-items: center;
        margin: 0 24px;
    }

    .logo .menu-icon {
        color: #333;
        font-size: 24px;
        margin-right: 14px;
        cursor: pointer;
    }

    .logo .logo-name {
        color: #333;
        font-size: 22px;
        font-weight: 500;
    }

    .sidebar {
        height: 100vh;
        width: 20%;
        padding: 20px 0;
        background-color: #fff;
        box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;

    }



    .sidebar .sidebar-content {
        display: flex;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
        padding: 30px 16px;
    }

    .sidebar-content .list {
        list-style: none;
    }

    .list .nav-link {
        display: flex;
        align-items: center;
        margin: 8px 0;
        padding: 14px 12px;
        border-radius: 8px;
        text-decoration: none;
    }

    .lists .nav-link:hover {
        background-color: #4070f4;
    }

    .nav-link .icon {
        margin-right: 14px;
        font-size: 20px;
        color: #707070;
    }

    .nav-link .link {
        font-size: 16px;
        color: #707070;
        font-weight: 400;
    }

    .lists .nav-link:hover .icon,
    .lists .nav-link:hover .link {
        color: #fff;
    }
</style>
<div class="sidebar" style="width: 20%; height: 100vh; border: 2px solid #ccc;">';


session_start();

if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {
    if (isset($_SESSION['Username'])) {
        echo '<div class="logo">
                        <i class="bx bx-menu menu-icon"></i>
                        <span class="logo-name">user: ' . $_SESSION['Username'] . '</span>
                    </div>';
    }

} else {
    echo '<div class="logo">
                        <i class="bx bx-menu menu-icon"></i>
                        <span class="logo-name">Guest </span>
                    </div>';
}
echo '<div class="sidebar-content">';
echo '<ul class="lists">';
echo '
            <li class="list">
                <a href="../Controller/C_NhanVien.php" class="nav-link">
                    <span  class="link">Xem thông tin nhân viên</span>
                </a>
            </li>
            <li class="list">
                <a href="../Controller/C_PhongBan.php" class="nav-link">
                    <span class="link">Xem thông tin Phòng ban</span>
                </a>
            </li>
            <li class="list">
                <a  href="../Controller/C_NhanVien.php?mod1=1"  class="nav-link">
                    <span class="link">Tìm kiếm</span>
                </a>
            </li>
            ';


if (isset($_SESSION['Login']) && $_SESSION['Login'] == true) {
   
    echo '<li class="list">
                <a href="../Controller/C_NhanVien.php?mod2=1"  class="nav-link">
                    <span class="link">Cập nhật nhân viên</span>
                </a>
            </li>';
    echo '<li class="list">
                <a href="../Controller/C_PhongBan.php?mod1=1" class="nav-link">
                    <span class="link">Cập nhật phòng ban</span>
                </a>
            </li>';
    echo '<li class="list">
                <a href="../Controller/C_NhanVien.php?mod3=1" class="nav-link">
                    <span class="link">Thêm nhân viên</span>
                </a>
            </li>';
    echo '<li class="list">
                <a href="../Controller/C_PhongBan.php?mod2=1"  class="nav-link">
                    <span class="link">Thêm phòng ban</span>
                </a>
            </li>';
    echo '<li class="list">
                <a href="../Controller/C_NhanVien.php?mod4=1" class="nav-link">
                    <span class="link">Xóa nhân viên</span>
                </a>
            </li>';
    echo '</ul>';
    echo '
            <div class="bottom-cotent">
                <li class="list">
                    <a href="../Controller/C_Admin.php?mod1=1" class="nav-link">
                        <span class="link">Đăng xuất</span>
                    </a>
                </li>
            </div>';
} else {
    // echo '<div class="sidebar" ><a class="sidebar__link " href="login.php">Đăng nhập </a> <br></div>';
    echo '</ul>';
    echo '
                
        <div class="bottom-cotent">
            <li class="list">
                <a href="../Controller/C_Admin.php"  class="nav-link">
                    <span class="link">Đăng nhập</span>
                </a>
            </li>
        </div>';
}
echo '</div>';
echo '</div>';
