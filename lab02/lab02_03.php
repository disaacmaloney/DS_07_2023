<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoio - 02.03</title>
</head>
<body>
    <center>
        <?php
            print("<ul>\n");
            $i = 1;
            while ($i <= 5)
            {
                print("<li>Elemento $i </li>\n");
                $i++;
            }
            print(" </ul>");
        ?>
    </center>
</body>
</html>