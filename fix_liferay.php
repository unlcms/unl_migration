<?php
ini_set('display_errors', true);

require_once __DIR__ . '/unl_migration.php';

$baseUrl          = '';
$frontierPath     = null;
$frontierUser     = null;
$frontierPass     = null;
$ignoreDuplicates = null;
$useLiferayCode   = true;
$useLiferayTitles = false;

$migration_tool = new UNL_Migration_Tool($baseUrl, $frontierPath, $frontierUser, $frontierPass, $ignoreDuplicates, $useLiferayCode, $useLiferayTitles);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Liferay body fixer</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <h1>Fix Liferay Body HTML</h1>
  <p>This will strip out/replace old lefray DIVs and Content</p>
  <form action="fix_liferay.php" method="post">
    <label for="content_to_fix">The HTML body to fix</label>
    <br />
    <textarea id="content_to_fix" name="content" cols="100" rows="15"></textarea>
    <br />
    <input type="submit" />
  </form>
  
  <?php 
  if (isset($_POST['content'])):
    $fixed_content = $migration_tool->_perform_liferay_maincontent_replacements($_POST['content']);
    ?>
    <br />
    <label for="fixed_html">Fixed HTML</label>
    <br />
    <textarea id="fixed_html" name="fixed_html" cols="100" rows="15" readonly="readonly"><?php echo $fixed_content ?></textarea>
  <?php endif; ?>
<!-- page content -->
</body>
</html>
