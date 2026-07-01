<?php include 'header.php'; ?>
<div class="container" style='text-align: center;'>
<?php include 'config/config.php';?>
<?php echo $ads2; ?>
<hr></div>
<div class="container">
<div class="row" style="margin-top: 17px;" >
<?php 
include 'config/config.php';

if ($_POST) {
    $url = trim($_POST['url']);

    // URL geçerlilik kontrolü
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo '<div class="alert alert-danger" role="alert">Geçersiz URL!</div>';
        exit;
    }

    // Sadece http/https izin ver
    if (!preg_match('/^https?:\/\//', $url)) {
        echo '<div class="alert alert-danger" role="alert">Sadece http/https protokolü desteklenir!</div>';
        exit;
    }

    // Dosya adını ve uzantısını al
    $name = basename($url);
    $uzanti = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    $izinli = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    if (!in_array($uzanti, $izinli)) {
        echo '<div class="alert alert-danger" role="alert">Sadece resim dosyaları desteklenir (PNG, JPG, GIF, WEBP)!</div>';
        exit;
    }

    // Rastgele dosya adı oluştur
    $uret = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $yeni_ad = "files/" . substr(str_shuffle($uret), 0, 10) . "." . $uzanti;
    $resim_urli = $site_url . $yeni_ad;

    // Dosyayı indir
    $icerk = @file_get_contents($url);
    if ($icerk === false) {
        echo '<div class="alert alert-danger" role="alert">Dosya indirilemedi!</div>';
        exit;
    }

    if (file_put_contents($yeni_ad, $icerk)) {
        echo '<div class="col-md-4" style="padding: 0;">';
        echo '<div class="highlight"><img src="'.$resim_urli.'" alt="'.$yeni_ad.'" class="img-thumbnail"></div></div>';
        echo '<div class="col-md-8"><div class="highlight"><h3>Image codes</h3>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">Direct:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">'.$resim_urli.'</textarea></div>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">Html:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">&lt;img src="'.$resim_urli.'" /&gt;</textarea></div>';
        echo '<div class="form-group"><label style="width:15%;" class="col-sm-3 control-label">BBcode:</label><textarea class="form-control" rows="1" style="font-size: smaller;width: 80%;" onclick="this.select();">[img]'.$resim_urli.'[/img]</textarea></div></div></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Dosya kaydedilemedi. Klasör izinlerini kontrol edin.</div>';
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