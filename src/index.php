<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SVA demo webpage - HTTP request metadata">
    <meta name="author" content="Erik Schindler, Stephan Kühne">

    <title><?=getenv('TITLE') ? htmlentities(getenv('TITLE'), ENT_COMPAT, 'UTF-8') : 'SVA Demo - HTTP Echo'?></title>

    <!-- Bootstrap core CSS -->
    <style type="text/css">
    <?=file_get_contents(__DIR__ . '/bootstrap.min.css')?>
    </style>
</head>

<body>
    <?php

    $cHostname = file_get_contents('/etc/hostname');

    $bgClass = false !== getenv('BG_CLASS') ? getenv('BG_CLASS') : 'bg-primary';
    $bgColor = '';

    if (false !== getenv('BG_COLOR')) {
        $bgColor = getenv('BG_COLOR');

        if (getenv('BG_COLOR') === 'random') {
            $base = $cHostname;
            if (!preg_match('/^[0-9a-fA-F]{6,}$/', $base)) {
                $base = dechex(random_int(0, 255)) . dechex(random_int(0, 255)) . dechex(random_int(0, 255));
            }

            $r = hexdec(substr($base, 0, 2));
            $g = hexdec(substr($base, 2, 2));
            $b = hexdec(substr($base, 4, 2));

            $bgColor = "rgba($r, $g, $b, .5)";
        }

        $bgColor = "style=\"background-color:{$bgColor} !important;\"";
    }

    ?>
    <!-- As a heading -->
    <nav class="navbar navbar-dark <?=$bgClass?>" <?=$bgColor?>>
        <div class="container-md">
            <span class="navbar-brand mb-0 h1 fs-1">
                <?=file_get_contents(__DIR__ . '/logo.svg')?>
                <?=getenv('TITLE') ? htmlentities(getenv('TITLE'), ENT_COMPAT, 'UTF-8') : 'SVA Demo - HTTP Echo'?>
            </span>
        </div>
    </nav>

    <?php

    $top_vars = [
      'HTTP_HOST',
      'REQUEST_URI',
      'HTTP_USER_AGENT',
    ];

    ?>

    <div class="container-md">
        <table class="table table-striped table-responsive">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>

            <?php if (strtolower(getenv('SHOW_CONTAINER_HOSTNAME')) === 'true'): ?>
            <tr>
                <td>/etc/hostname</td>
                <td class="text-break"><?=file_get_contents('/etc/hostname')?></td>
            </tr>
            <?php endif ?>

            <?php ksort($_SERVER); ?>

            <?php
            foreach ($top_vars as $key):
                // print($key);
                if (array_key_exists($key, $_SERVER)):
                    $value = $_SERVER[$key];
                    // print($value);
                    unset($_SERVER[$key]);

                    echo '
            <tr>
                <td>' . $key . '</td>
                <td class="text-break">' . (is_array($value) ? print_r($value, true) : $value) . '</td>
            </tr>';

                endif;
            endforeach;
            ?>

            <tr>
                <td colspan="2" class="text-center">
                    <div class="row">
                        <div class="col-5"><hr class="border-top border-secondary border-5"></div>
                        <div class="col-2">
                            <button class="btn btn-outline-secondary" onclick="toggle_rows();">more</button>
                        </div>
                        <div class="col-5"><hr class="border-top border-secondary border-5"></div>
                    </div>
                </td>
            </tr>

            <?php foreach ($_SERVER as $key => $value): ?>
            <tr class="more d-none">
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

    <script type="text/javascript">
    function toggle_rows() {
        // alert('clicked!');
        elems = document.querySelectorAll('tr.more');
        for(i=0; i<elems.length; i++) {
            e = elems[i];
            e.classList.toggle('d-none');
        }
    }
    </script>

  </body>

</html>
