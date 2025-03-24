<?php
function loadEnv($file) {
    if (!file_exists($file)) {
        return false;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) { // Ignorar comentários
            continue;
        }

        $lineParts = explode('=', $line, 2);
        if (count($lineParts) === 2) {
            // Definindo as variáveis de ambiente
            putenv(trim($lineParts[0]) . '=' . trim($lineParts[1]));
        }
    }
    return true;
}

// Carregar o arquivo .env
loadEnv(__DIR__ . '/.env');
