<?php
$logo = json_decode($db->table('setting')->getWhere(["name"=>'logo',])->getRow()->data);
$meta_image = base_url('upload/favicon.png');
if(!empty(@$row->image))
{
   $meta_image = base_url('upload/'.$row->image);
}
$stateCity= '';
?>

<!-- Meta Tagging -->
<meta name="audience" content="All"/>
<meta name="distribution" content="Global">
<meta http-equiv="expires" content="never">
<meta name="language" content="English">
<meta name="organization" content="<?=env('APP_NAME') ?>">
<meta name="rating" content="general">
<meta name="format-detection" content="telephone=no">
<meta name="application-name" content="<?=env('APP_NAME') ?>">
<meta name="robots" content="max-image-preview:large">
<meta name="referrer" content="origin">
<link rel="canonical" href="<?=base_url() ?>" />
<link rel='shortlink' href='<?=base_url() ?>' />
<meta name="original-source" content="<?=base_url() ?>">
<!-- Twitter og -->
<meta name="twitter:site" content="<?=base_url() ?>">
<meta name="twitter:url" content="<?=base_url() ?>">
<meta name="twitter:creator" content="@smartfiling">
<meta name="twitter:card" content="summary_large_image" />
<!-- Open Graph (OG) meta tags -->
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=base_url() ?>" />
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/jpg">
<!-- Favicon -->
<link rel="shortcut icon" href="<?=image_check($logo->favicon_image) ?>" type="image/x-icon"/>
<link rel="shortcut icon" href="<?=image_check($logo->favicon_image) ?>" sizes="128x128" type="image/x-icon" />

<!-- CSS here -->
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/swiper-bundle.css">
<link rel="stylesheet" href="assets/css/font-awesome-pro.css">
<link rel="stylesheet" href="assets/css/spacing.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/responsive.css">

<!-- Add Site Touch Icon -->
<link rel="apple-touch-icon" sizes="57x57" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?=$meta_image ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?=$meta_image ?>">
<link rel="icon" type="image/png" sizes="192x192" href="<?=$meta_image ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?=$meta_image ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?=$meta_image ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$meta_image ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:image" content="<?=$meta_image ?>">
<meta name="twitter:image:src" content="<?=$meta_image ?>">



<title><?=@$meta_data->meta_title==env("APP_NAME")?@$meta_data->meta_title.$stateCity: env("APP_NAME").' || '.@$meta_data->meta_title.@$stateCity ?></title>
<?php if(!empty($meta_data)){ ?>
<meta name="twitter:title" content="<?=$meta_data->meta_author.$stateCity ?>">
<meta name="twitter:description" content="<?=$meta_data->meta_description ?>">
<!-- Open Graph (OG) meta tags -->
<meta property="og:image" content="<?=$meta_image ?>" />
<meta property="og:image:secure_url" content="<?=$meta_image ?>">
<meta property="og:title" content="<?=$meta_data->meta_author.$stateCity ?>" />
<meta property="og:description" content="<?=$meta_data->meta_description ?>" />
<!-- Meta Tagging -->

<meta name="author" content="<?=$meta_data->meta_author.$stateCity ?>">
<meta name="keywords" content="<?=$meta_data->meta_keywords ?>">
<meta name="description" content="<?=$meta_data->meta_description ?>"> 
<?php } ?>