<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SVA demo webpage - HTTP request metadata">
    <meta name="author" content="Erik Schindler, Stephan Kühne">

    <title><?=getenv('TITLE') ? htmlentities(getenv('TITLE'), ENT_COMPAT, 'UTF-8') : 'SVA Demo - HTTP Echo'?></title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <!-- As a heading -->
    <nav class="navbar navbar-dark <?=getenv()['BG_CLASS'] ?? 'bg-primary'?>" <?=getenv('BG_COLOR') ? 'style="background-color:'.getenv('BG_COLOR').' !important;"' : ''?>>
      <div class="container-md">
        <span class="navbar-brand mb-0 h1 fs-1">
          <img src="/logo.svg" alt="SVA Logo" height="48" class="d-inline-block align-text-top">
          <?=getenv('TITLE') ? htmlentities(getenv('TITLE'), ENT_COMPAT, 'UTF-8') : 'SVA Demo - HTTP Echo'?>
        </span>
      </div>
    </nav>

    <div class="container-md">
      <table class="table table-striped table-responsive">
        <tr>
          <th>Key</th>
          <th>Value</th>
        </tr>
        <?php ksort($_SERVER); foreach ($_SERVER as $key => $value): ?>
        <tr>
          <td><?=$key?></td>
      	  <td class="text-break"><?=is_array($value) ? var_dump($value) : $value?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <footer class="footer mt-2 py-3 bg-light">
      <div class="container text-center">
        <span class="text-muted">created by Erik Schindler</span>
      </div>
    </footer>
  
  </body>
</html>
