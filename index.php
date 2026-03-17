<?php include 'includes/head.php'; ?>
<body>
<?php 
  $request = $_SERVER['REQUEST_URI'];

  // Clean path
  $path = trim(parse_url($request, PHP_URL_PATH), '/');

  // Remove folder name ONLY when present (for XAMPP)
  if (strpos($path, 'KIIT-KAFE') === 0) {
      $path = substr($path, strlen('KIIT-KAFE'));
      $path = trim($path, '/');
  }

  // Default route
  if (empty($path) || $path === 'index.php') {
      $path = 'landing';
  }

  echo "<script>window.initialPage = '$path';</script>";

  include 'includes/landing.php';
  include 'includes/auth.php';
  include 'includes/menu.php';
  include 'includes/cart.php';
  include 'includes/payment.php';
  include 'includes/success.php';
  include 'includes/admin.php';
  include 'includes/modals.php';
  include 'includes/scripts.php';
?>
</body>
</html>