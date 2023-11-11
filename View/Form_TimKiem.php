<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim kiem</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            overflow-y: scroll;
            max-height: 100vh;
            flex: 1;
            padding: 20px;
        }
    </style>
    <div style="display:flex; ">
        <?php include_once('Sidebar.php'); ?>
        <div class="container">

            <form action="C_NhanVien.php?mod1=1" method="POST">
                <div style="display:flex; margin-bottom: 10px;">

                    <div style="margin:0 20px 0 0;">
                        <input type="radio" value="IDNV" checked name="field" id=""> Id Nhan
                        Vien</input>
                    </div>
                    <div style="margin:0 20px 0 0;">
                        <input type="radio" value="HoTen" name="field" id=""> Ho Ten</input>

                    </div>
                    <div style="margin:0 20px 0 0;">
                        <input type="radio" value="DiaChi" name="field" id=""> Dia Chi </input>
                    </div>
                </div>


                <input style="padding: 4px" name="text_search" value="" type="text">
                <button style="padding: 4px 8px" type='submit'>OK</button>
            </form>
        </div>
    </div>
</body>

</html>