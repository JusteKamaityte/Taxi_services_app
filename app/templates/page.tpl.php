<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $data['head']['title']; ?></title>
    <?php foreach ($data['head']['css'] ?? [] as $css_path) : ?>
        <link rel="stylesheet" href="<?php print $css_path; ?>">
    <?php endforeach; ?>
    <?php foreach ($data['head']['js'] ?? [] as $js_path) : ?>
        <script src="<?php print $js_path; ?>>" defer></script>
    <?php endforeach; ?>
</head>
<body>
<header>
    <?php print $data['header']; ?>
</header>

<main>
    <div class="header-photo"><?php print $data['section'];?></div>
    <?php print $data['content']; ?>
</main>
<footer>
    <?php print $data['footer']; ?>
</footer>
</body>
</html>