<?php

function dd($value, $fontSize = '1.25rem;'): void
{
    echo "<div style='font-size: $fontSize'>";
    var_dump($value);
    echo '</div>';
    die;
}

function pp($value, $fontSize = '1.25rem;'): void
{
    echo "<pre style='font-size: $fontSize'>";
    print_r($value);
    echo '</pre>';
}

function listAllStylesPath(string $directory): array
{
    $styles = [];

    function findFiles(string $directory, array &$styles)
    {
        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $currentDirectory = $directory . '/' . $file;
                if (is_dir($currentDirectory)) {
                    findFiles($currentDirectory, $styles);
                } else {
                    $styles[] = str_replace(STYLE_ROOT, '', $currentDirectory);
                }
            }
        }

        return $styles;
    }

    findFiles($directory, $styles);

    return $styles;
}