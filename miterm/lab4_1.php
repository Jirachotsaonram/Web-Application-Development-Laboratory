<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 4: Date Format</title>
    <style>
        
        
        .line-1 { background-color: #006597ff; color: #ffffffff; }
        .line-2 { background-color: #0890d4ff; color: #ffffffff; }
        .line-3 { background-color: #64c2f1ff; color: #ffffffff; }
        .line-4 { background-color: #167000ff; color: #ffffffff; }
        .line-5 { background-color: #4bcf0dff; color: #ffffffff; }
        .line-6 { background-color: #36e600ff; color: #ffffffff; }
        .line-7 { background-color: #daff52ff; color: #ffffffff; }
        .line-8 { background-color: #ffe552ff; color: #ffffffff; } 
        .line-9 { background-color: #ffa652ff; color: #ffffffff; }
        .line-10 { background-color: #f87e0cff; color: #ffffffff; } 
    </style>
</head>
<body>

    <div class="container">
        <h1>Format Time</h1>
        <?php
            
            date_default_timezone_set('Asia/Bangkok');
            $current_date_time = date("d-M-Y, เวลา: H:i:s"); 
        ?>
        <div class="current-time">วันนี้วันที่ <?php echo $current_date_time; ?></div>

        <div class="line-item line-1">
            <strong>บรรทัดที่ 1:</strong> <span><?php echo date("F j, Y, h:i a"); ?></span>
        </div>

        <div class="line-item line-2">
            <strong>บรรทัดที่ 2:</strong> <span>วันที่ <?php echo date("j"); ?> เดือน <?php echo date("F"); ?> ปี ค.ศ. <?php echo date("Y"); ?> เวลา <?php echo date("H.i"); ?> น.</span>
        </div>

        <div class="line-item line-3">
            <strong>บรรทัดที่ 3:</strong> <span><?php echo date("m.d.y"); ?></span>
        </div>

        <div class="line-item line-4">
            <strong>บรรทัดที่ 4:</strong> <span><?php echo date("j, n, Y"); ?></span>
        </div>

        <div class="line-item line-5">
            <strong>บรรทัดที่ 5:</strong> <span><?php echo date("Ymd"); ?></span>
        </div>

        <div class="line-item line-6">
            <strong>บรรทัดที่ 6:</strong> <span><?php echo date("U") . " " . date("W") . " " . date("N") . date("o") . " " . date("e") . " " . date("S") . " " . date("h") . date("a") . " " . date("i"); ?></span>
            </div>

        <div class="line-item line-7">
            <strong>บรรทัดที่ 7:</strong> <span>it is the <?php echo date("jS"); ?> day.</span>
        </div>

        <div class="line-item line-8">
            <strong>บรรทัด 8:</strong> <span><?php echo date("H:i:s"); ?></span>
        </div>

        <div class="line-item line-9">
            <strong>บรรทัดที่ 9:</strong> <span><?php echo date("Y-m-d\TH:i:s O"); ?></span>
            </div>

        <div class="line-item line-10">
            <strong>บรรทัดที่ 10:</strong> <span><?php echo date(DATE_RFC2822); ?></span>
            </div>
    </div>

</body>
</html>