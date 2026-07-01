<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<div class="container" style='text-align: center;'>
<?php echo $ads2; ?>
<hr></div>
<div class="container">
<div class="row" style="margin-top: 17px;" >
<?php 
include 'config/config.php';

if ($_POST) {
    // Dosya kontrolü
    if (!isset($_FILES["resim"]) || $_FILES["resim"]["error"] != 0) {
        echo '<div class="alert alert-danger" role="alert">Dosya seçilmedi veya hata oluştu!</div>';
        exit;
    }

    $dosya = $_FILES["resim"];
    $adi = $dosya["name"];
    $tmp = $dosya["tmp_name"];
    $boyut = $dosya["size"];
    $uzanti = strtolower(pathinfo($adi, PATHINFO_EXTENSION));

    // İzin verilen uzantılar
    $izinli = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

    // Boyut sınırı: 5 MB
    if ($boyut > 5 * 1024 * 1024) {
        echo '<div class="alert alert-danger" role="alert">Dosya boyutu 5 MB\'dan büyük olamaz!</div>';
        exit;
    }

    if (!in_array($uzanti, $izinli)) {
        echo '<div class="alert alert-danger" role="alert">Sadece PNG, JPG, JPEG, GIF ve WEBP dosyaları yüklenebilir!</div>';
        exit;
    }

    // Rastgele dosya adı oluştur
    $uret = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $yeni_ad = "files/" . substr(str_shuffle($uret), 0, 10) . "." . $uzanti;
    $resim_urli = $site_url . $yeni_ad;

    if (move_uploaded_file($tmp, $yeni_ad)) {
        echo '<div class="col-md-4" style="padding: 0;">';
        echo '<div class="highlight"><img src="'.$resim_urli.'" alt="'.$yeni_ad.'" class="img-thumbnail"></div></div>';
        echo '<div class="col-md-8"><div class="highlight"><h3>Image codes</h3>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">Direct:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">'.$resim_urli.'</textarea></div>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">Html:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">&lt;img src="'.$resim_urli.'" /&gt;</textarea></div>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">BBcode:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">[img]'.$resim_urli.'[/img]</textarea></div></div></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Dosya yüklenirken hata oluştu. Klasör izinlerini kontrol edin.</div>';
    }
} else {
    header('Location: '.$site_url);
    exit;
}
?>
</div>
<hr>
© Copyright 2026
</div>