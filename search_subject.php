<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ค้นหารายวิชาที่เปิดสอน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        /* ส่วนหัวสีน้ำตาลตามรูป */
        .header-section {
            background-color: #4b2c00; 
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        .search-container {
            max-width: 900px;
            margin: -30px auto 20px auto; /* ให้กล่องทับส่วนหัวเล็กน้อย */
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .btn-search {
            background-color: #6d4c41;
            color: white;
            width: 100%;
            border: none;
            padding: 10px;
        }
        .btn-search:hover { background-color: #4b2c00; color: white; }
        .alert-custom { background-color: #fff3cd; border: none; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="header-section">
    <h2>ค้นหารายวิชาที่เปิดสอน</h2>
    <p>จากระบบทะเบียน</p>
</div>

<div class="container">
    <div class="search-container">
        <div class="alert alert-custom text-center">
            กำลังมองหาเมนู C02, C03 จากเว็บไซต์เวอร์ชันเก่าใช่หรือไม่? <b>คลิกที่นี่เพื่อไปยังเว็บไซต์เวอร์ชันเก่า</b>
        </div>

        <form action="search_result.php" method="GET">
            <div class="mb-3">
                <label class="form-label"><b>ค้นหารายวิชา</b></label>
                <input type="text" name="keyword" class="form-control" placeholder="รหัสวิชา หรือ ชื่อวิชา">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label"><b>เขตพื้นที่</b></label>
                    <select name="location" class="form-select">
                        <option value="chiangmai">เชียงใหม่</option>
                        </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><b>เทอม / ปี</b></label>
                    <select name="semester" class="form-select">
                        <option value="2/2568">2/2568</option>
                        <option value="1/2568">1/2568</option>
                    </select>
                </div>
            </div>

            <div class="text-center mb-3">
                <small class="text-muted" style="cursor:pointer;">↕ แสดง/ซ่อน ตัวเลือกการค้นหาเพิ่มเติม</small>
            </div>

            <button type="submit" class="btn btn-search">🔍 ค้นหารายวิชา</button>
        </form>
    </div>
</div>

</body>
</html>