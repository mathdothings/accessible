<?php

function dd($value): void
{
    var_dump($value);
    die;
}

function listStyles(string $directory): array
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

    $styles = findFiles($directory, $styles);

    return $styles;
}