<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kode Booking</th>
        </thead>
        <?php $i = 1?>
        <?php foreach ($booking as $al) : ?>
            <tr>
                <input type="hidden" name="nama" value="<? $al['nama']?>">
                <input type="hidden" name="email" value="<? $al['email']?>">
                <input type="hidden" name="kode_booking" value="<? $al['kode_booking']?>">
                <td><?= $i ?></td>
                <td><?= $al['username'] ?></td>
                <td><?= $al['email'] ?></td>
                <td><?= $al['kode_booking'] ?></td>    
            </tr>
        <?php $i++; endforeach?>
    </table>

    
</body>
</html>