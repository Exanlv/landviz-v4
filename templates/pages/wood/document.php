<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            font-size: <?= $fontSize ?>px;
        }

        span {
            margin-bottom: 20px;
        }

        div {
            font-size: 15px;
        }

        table th {
            text-align: right;
            padding-right: 10px;
            padding-left: 20px;
        }

        .wood {
            background: repeating-linear-gradient(45deg,
                    /* Angle of the stripes */
                    lightgray,
                    /* Color of the stripes */
                    lightgray 10px,
                    /* End of the stripe */
                    #ffffff 10px,
                    /* Start of the space between stripes */
                    #ffffff 20px
                    /* End of the space between stripes */
                );

            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <?php foreach ($parts as $part) : ?>
                <tr>
                    <td colspan="2"><b><?= $part['name'] ?></b></td>
                </tr>
                <tr>
                    <td>
                        <div class="wood" style="height: <?= $part['height'] ?>rem; width: <?= $part['width'] ?>rem;">
                        </div>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <th>
                                    Height
                                </th>
                                <td>
                                    <?= $part['height'] ?><?= ['metric' => 'cm', 'imperial' => ' inch'][$unit] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Width
                                </th>
                                <td>
                                    <?= $part['width'] ?><?= ['metric' => 'cm', 'imperial' => ' inch'][$unit] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Thickness
                                </th>
                                <td>
                                    <?= $part['thickness'] ?><?= ['metric' => 'mm', 'imperial' => ' inch'][$unit] ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <th>
                                    Amount
                                </th>
                                <td>
                                    <?= $part['amount'] ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
            <?php endforeach ?>
        </table>

        <a href="<?= $editUrl ?>">Edit</a>
    </div>
</body>

</html>
